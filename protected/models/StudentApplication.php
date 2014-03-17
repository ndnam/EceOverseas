<?php

/**
 * This is the model class for table "studentapplication".
 *
 * The followings are the available columns in table 'studentapplication':
 * @property string $id
 * @property string $studentId
 * @property string $projectId
 * @property integer $usingPsea
 * @property string $support
 * @property string $created
 * @property string $modified
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Project $project
 * @property Student $student
 */
class StudentApplication extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'studentapplication';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('studentId, projectId, created, modified', 'required'),
			array('usingPsea, status', 'numerical', 'integerOnly'=>true),
			array('studentId, projectId', 'length', 'max'=>10),
			array('support', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, studentId, projectId, usingPsea, support, created, modified, status', 'safe', 'on'=>'search'),
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
			'student' => array(self::BELONGS_TO, 'Student', 'studentId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'studentId' => 'Student',
			'projectId' => 'Project',
			'usingPsea' => 'Using Psea',
			'support' => 'Support',
			'created' => 'Created',
			'modified' => 'Modified',
			'status' => 'Status',
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
		$criteria->compare('studentId',$this->studentId,true);
		$criteria->compare('projectId',$this->projectId,true);
		$criteria->compare('usingPsea',$this->usingPsea);
		$criteria->compare('support',$this->support,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return StudentApplication the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeSave() {
            $this->modified = NULL;
            if ($this->isNewRecord) 
                $this->created = NULL;
            return true;
        }
}
