<?php

/**
 * This is the model class for table "familymember".
 *
 * The followings are the available columns in table 'familymember':
 * @property string $id
 * @property string $studentId
 * @property string $relationship
 * @property string $fullname
 * @property integer $age
 * @property string $occupation
 * @property integer $monthlyIncome
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Student $student
 */
class FamilyMember extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'familymember';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('relationship, fullname, age, occupation, monthlyIncome', 'filter', 'filter'=>'trim'),
			array('relationship, fullname, age, occupation, monthlyIncome', 'required'),
			array('age, monthlyIncome', 'numerical', 'integerOnly'=>true),
			array('relationship', 'length', 'max'=>50),
			array('fullname, occupation', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, studentId, relationship, fullname, age, occupation, monthlyIncome, created, modified', 'safe', 'on'=>'search'),
		);
	}

        public function behaviors() {
            return array('EAdvancedArBehavior' => array(
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
			'relationship' => 'Relationship',
			'fullname' => 'Fullname',
			'age' => 'Age',
			'occupation' => 'Occupation',
			'monthlyIncome' => 'Monthly Income',
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
		$criteria->compare('studentId',$this->studentId,true);
		$criteria->compare('relationship',$this->relationship,true);
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('occupation',$this->occupation,true);
		$criteria->compare('monthlyIncome',$this->monthlyIncome);
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
	 * @return FamilyMember the static model class
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
