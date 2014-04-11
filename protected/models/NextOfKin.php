<?php

/**
 * This is the model class for table "nextofkin".
 *
 * The followings are the available columns in table 'nextofkin':
 * @property string $id
 * @property string $studentId
 * @property string $fullName
 * @property string $relationship
 * @property string $mobilePhone
 * @property string $officePhone
 * @property string $homePhone
 * @property string $email
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Student $student
 */
class NextOfKin extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nextofkin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fullName, relationship, email, mobilePhone, officePhone, homePhone', 'filter', 'filter'=>'trim'),
			array('fullName, relationship', 'required'),
			array('mobilePhone, officePhone, homePhone', 'match', 'pattern'=>'/^\d+$/'),
                        array('email','email'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, studentId, fullName, relationship, mobilePhone, officePhone, homePhone, email, created, modified', 'safe', 'on'=>'search'),
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
			'fullName' => 'Full Name',
			'relationship' => 'Relationship',
			'mobilePhone' => 'Mobile Phone',
			'officePhone' => 'Office Phone',
			'homePhone' => 'Home Phone',
			'email' => 'Email',
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
		$criteria->compare('fullName',$this->fullName,true);
		$criteria->compare('relationship',$this->relationship,true);
		$criteria->compare('mobilePhone',$this->mobilePhone,true);
		$criteria->compare('officePhone',$this->officePhone,true);
		$criteria->compare('homePhone',$this->homePhone,true);
		$criteria->compare('email',$this->email,true);
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
	 * @return NextOfKin the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function beforeValidate() {
            $this->clearErrors();
            if (empty($this->email) && empty($this->mobilePhone) && empty($this->officePhone) && empty($this->homePhone)) {
                $this->addError('contactMethod', 'You need to provide at least one contact method');
            }
            return parent::beforeValidate();
        }
        
        public function beforeSave() {
            $this->modified = NULL;
            if ($this->isNewRecord) 
                $this->created = NULL;
            return parent::beforeSave();
        }
        
        public function save($attributes=null) {
            $attrs = array();
            // Always run validation
            $this->validate();
            if ($attributes) {
                // Filter the validated attributes
                foreach ($attributes as $attribute) {
                    if (!$this->hasErrors($attribute)) {
                        array_push($attrs, $attribute);
                    }
                }
            } else {
                // Get the array of validated attributes
                foreach ($this->attributes as $name=>$value) {
                    if (!$this->hasErrors($name)) {
                        array_push($attrs, $name);
                    }
                }
            }
            if ($this->hasErrors('contactMethod')) {
                $attrs = array_diff($attrs, ['mobilePhone','officePhone','homePhone','email']);
            }
            parent::save(false, $attrs); //Save to database whether validation passed or not
        }
}
