<?php

/**
 * This is the model class for table "projectstaff".
 *
 * The followings are the available columns in table 'projectstaff':
 * @property string $id
 * @property string $projectId
 * @property string $staffId
 * @property string $role
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Project $project
 * @property Staff $staff
 */
class ProjectStaff extends CActiveRecord
{
        const ROLE_LEADER = 1;
        const ROLE_SUPPORT = 2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projectstaff';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('projectId, staffId', 'required'),
			array('projectId, staffId', 'length', 'max'=>10),
			array('role', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, projectId, staffId, role, created, modified', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'project' => array(self::BELONGS_TO, 'Project', 'projectId'),
			'staff' => array(self::BELONGS_TO, 'Staff', 'staffId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'projectId' => 'Project',
			'staffId' => 'Staff',
			'role' => 'Role',
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
		$criteria->compare('projectId',$this->projectId,true);
		$criteria->compare('staffId',$this->staffId,true);
		$criteria->compare('role',$this->role,true);
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
	 * @return ProjectStaff the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            $this->modified = NULL;
            if ($this->isNewRecord) {
                $this->created = NULL;
                if (count(ProjectStaff::model()->findAllByAttributes(array('projectId'=>$this->projectId,'staffId'=>$this->staffId))) > 0) 
                    throw new CDbException('Staff has already been assigned to this project');
            }
            return true;
        }
}
