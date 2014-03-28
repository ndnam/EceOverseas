<?php

/**
 * This is the model class for table "project".
 *
 * The followings are the available columns in table 'project':
 * @property string $id
 * @property string $title
 * @property string $status
 * @property string $description
 * @property string $locationId
 * @property string $startDate
 * @property string $endDate
 * @property string $teamSize
 * @property string $deadline
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Location $location
 * @property ProjectStaff[] $projectstaffs
 * @property StudentApplication[] $studentapplications
 * @property Staff $creator
 */
class Project extends CActiveRecord
{
        const STATUS_NEW = 1;
        const STATUS_PUBLIC = 2;
        const STATUS_CLOSED = 3;
        const ROLE_LEADER = 1;
        const ROLE_SUPPORT = 2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'project';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description','filter','filter'=>'trim'),
			array('title, description, startDate, endDate, teamSize, deadline', 'required'),
                        array('teamSize', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('description', 'length', 'max'=>500),
			array('locationId, teamSize', 'length', 'max'=>10),
                        array('deadline','checkBeforeDate','largerDate'=>'startDate'),
                        array('startDate','checkBeforeDate','largerDate'=>'endDate'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, status, description, locationId, startDate, endDate, teamSize, deadline, created, modified', 'safe', 'on'=>'search'),
		);
	}
        
        public function behaviors() {
              return array( 'EAdvancedArBehavior' => array(
                    'class' => 'application.extensions.EAdvancedArBehavior'));
        }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'location' => array(self::BELONGS_TO, 'Location', 'locationId'),
			'projectstaffs' => array(self::HAS_MANY, 'ProjectStaff', 'projectId'),
			'studentapplications' => array(self::HAS_MANY, 'StudentApplication', 'projectId'),
			'students' => array(self::MANY_MANY, 'Student', 'studentapplication(studentId,projectId)'),
                        'creator' => array(self::BELONGS_TO, 'Staff', 'createdBy'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
                        'status' => 'Status',
			'description' => 'Description',
			'locationId' => 'Location',
			'startDate' => 'Start Date',
			'endDate' => 'End Date',
			'teamSize' => 'Team Size',
			'deadline' => 'Deadline',
			'created' => 'Created',
			'modified' => 'Modified',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('locationId',$this->locationId,true);
		$criteria->compare('startDate',$this->startDate,true);
		$criteria->compare('endDate',$this->endDate,true);
		$criteria->compare('teamSize',$this->teamSize,true);
		$criteria->compare('deadline',$this->deadline,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Project the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            $this->modified = NULL;
            if ($this->isNewRecord) 
                $this->created = NULL;
            $isOK = true;
            if (empty($this->locationId)) {
                $isOK = false;
            }
            return $isOK;
        }
        
        /**
         * 
         * @param string $attribute
         * @param array $params
         */
        public function checkBeforeDate($attribute,$params) {
            if (!empty($this->$params['largerDate'])) {
                if (strtotime($this->$attribute) >= strtotime($this->$params['largerDate'])) {
                    $this->addError($attribute, $attribute . ' must be before ' . $params['largerDate']);
                }
            }
        }
        
        public function getStaffRole($staffId) {
            if ($staffId == $this->creator->id) 
                return self::ROLE_LEADER;
            if ($projectstaff = ProjectStaff::model()->find('projectId = :projectId AND staffId = :staffId', array(':projectId'=>$this->id,':staffId'=>$staffId)))
                return $projectstaff->role;
            return 0;
        }
        
        public function __toString() {
            return $this->id;
        }
        
        public function addStaff($staffId,$role) {
            if (!$this->isNewRecord) {
                if (!in_array($role, [1,2,3,4,5])) {
                    throw new CException('Invalid role');
                }
                $projectStaff = new ProjectStaff;
                $projectStaff->role = $role;
                $projectStaff->staffId = $staffId;
                $projectStaff->projectId = $this->id;
                if ($projectStaff->save()) {
                    return $projectStaff->id;
                }
            }
            return false;
        }
        
        public function beforeDelete() {
            $isOk = true;
            foreach ($this->studentapplications as $studentApps) {
                $isOk = $studentApps->delete() && $isOk;
            }
            foreach ($this->projectstaffs as $projectStaff) {
                $isOk = $projectStaff->delete() && $isOk;
            }
            return $isOk && parent::beforeDelete();
        }
}
