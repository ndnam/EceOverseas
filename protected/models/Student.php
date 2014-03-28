<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property string $id
 * @property string $profileComplete
 * @property string $firstName
 * @property string $familyName
 * @property integer $gender
 * @property string $studentNumber
 * @property string $school
 * @property string $course
 * @property string $level
 * @property string $birthday
 * @property string $race
 * @property string $religion
 * @property string $nationality
 * @property integer $isPR
 * @property string $nricNumber
 * @property string $passportNumber
 * @property int $issuingCountry
 * @property string $issuingDate
 * @property string $expiryDate
 * @property integer $tshirtSize
 * @property integer $bloodGroup
 * @property integer $swimmingAbility
 * @property string $homeAddress
 * @property string $postalCode
 * @property integer $housingType
 * @property string $personalEmail
 * @property string $mobilePhone
 * @property string $homePhone
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property FamilyMember[] $familyMembers
 * @property MedicalInfo $medicalInfo
 * @property NextOfKin $nextOfKin
 * @property PastTrip[] $pastTrips
 * @property DictCountry $issuingCountry
 * @property StudentCca[] $studentCcas
 * @property Project[] $projects
 */
class Student extends CActiveRecord
{
        public function __construct() {
            parent::__construct();
            $this->issuingCountry = 492;
            $this->swimmingAbility = 2;
        }
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('firstName, familyName, school, course, level, race, religion, nationality, passportNumber, homeAddress, postalCode, personalEmail, mobilePhone, homePhone','filter','filter'=>'trim'),
			array('firstName, familyName, studentNumber, school, course, level, birthday, race, religion, nationality, passportNumber, issuingCountry, issuingDate, expiryDate, homeAddress, postalCode, personalEmail, mobilePhone', 'required'),
			array('gender, isPR, tshirtSize, bloodGroup, swimmingAbility, housingType', 'numerical', 'integerOnly'=>true),
			array('firstName, familyName, school, course, race, religion, nationality, passportNumber, personalEmail', 'length', 'max'=>50),
			array('studentNumber, level, nricNumber, postalCode', 'length', 'max'=>10),
			array('mobilePhone, homePhone', 'length', 'max'=>20),
			array('homeAddress', 'length', 'max'=>200),
                        array('personalEmail','email'),
                        //Custom validators:
                        array('mobilePhone, homePhone','match','pattern'=>'/^\d+$/'),
                        array('nricNumber','match','pattern'=>'/^[SFTGsftg][0-9]{7}.$/'),
                        array('expiryDate','validateExpiryDate'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, firstName, familyName, gender, studentNumber, school, course, level, birthday, race, religion, nationality, isPR, nricNumber, passportNumber, issuingCountry, issuingDate, expiryDate, tshirtSize, bloodGroup, swimmingAbility, homeAddress, postalCode, housingType, personalEmail, mobilePhone, homePhone, created, modified', 'safe', 'on'=>'search'),
		);
	}
        
        /**
         * Validate that the full name contains family name
         * @param string $attribute
         * @param array $params
         */
        public function validateFamilyName($attribute,$params) {
            if (stripos($this->firstName,$this->$attribute) === FALSE)
                $this->addError($attribute, 'Your family name does not appear in your full name');
        }
        
        /**
         * 
         * @param string $attribute
         * @param array $params
         */
        public function validateExpiryDate($attribute,$params) {
            if (strtotime($this->$attribute) <= strtotime($this->issuingDate))
                $this->addError ($attribute, 'Invalid Expiry Date');
        }
        
        /**
         * Overide validate
         * @param array $attributes
         * @param Boolean $clearErrors
         */
//        public function validate($attributes = null, $clearErrors = true) {
//            return  parent::validate($attributes, $clearErrors)
//                    && $this->validateRelated($this->medicalInfo)
//                    && $this->validateRelated($this->studentCcas)
//                    && $this->validateRelated($this->pastTrips)
//                    && $this->validateRelated($this->nextOfKin)
//                    && $this->validateRelated($this->familyMembers);
//        }
        
        /**
         * Validate related model(s)
         * $relatedModel == null | empty array -> return true
         * @param string|Object $relatedModel
         * @return boolean
         */
        public function validateRelated($relatedModel) {
            $this->clearErrors();
            if (is_string($relatedModel)) {
                $relatedModel = $this->$relatedModel;
            }
            if (is_array($relatedModel)) {
                $isValid = true;
                foreach ($relatedModel as $model) {
                    if (!$this->validateRelated($model)) {
                        $isValid = false;
//                        $this->addErrors($model->getErrors());
                    }
                }
                return $isValid;
            } else if (!is_null($relatedModel)) {
                if (!$relatedModel->validate()) {
//                    $this->addErrors($relatedModel->getErrors());
                    return false;
                }
            }
            return true;
        }
        
        /**
         * Overide save
         * @param Boolean $runValidation
         * @param array $attributes
         */
        public function save($runValidation = true, $attributes = null) {
            if ($runValidation) {
                if ($this->validate($attributes) == false)
                    return false;
            }
            return parent::save(false, $attributes);
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
			'familyMembers' => array(self::HAS_MANY, 'FamilyMember', 'studentId'),
			'medicalInfo' => array(self::HAS_ONE, 'MedicalInfo', 'studentId'),
			'nextOfKin' => array(self::HAS_ONE, 'NextOfKin', 'studentId'),
			'pastTrips' => array(self::HAS_MANY, 'PastTrip', 'studentId'),
			'issuingCountry' => array(self::BELONGS_TO, 'DictCountry', 'issuingCountry'),
			'projects' => array(self::MANY_MANY, 'Project', 'studentapplication(studentId,projectId)'),
			'studentCcas' => array(self::HAS_MANY, 'StudentCca', 'studentId'),
                        'user' => array(self::HAS_ONE,'User','staffId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'firstName' => 'First Name',
			'familyName' => 'Family Name',
			'gender' => 'Gender',
			'studentNumber' => 'Student Number',
			'school' => 'School',
			'course' => 'Course',
			'level' => 'Level',
			'birthday' => 'Birthday',
			'race' => 'Race',
			'religion' => 'Religion',
			'nationality' => 'Nationality',
			'isPR' => 'Is PR',
			'nricNumber' => 'NRIC Number',
			'passportNumber' => 'Passport Number',
			'issuingCountry' => 'Issuing Country',
			'issuingDate' => 'Issuing Date',
			'expiryDate' => 'Expiry Date',
			'tshirtSize' => 'Tshirt Size',
			'bloodGroup' => 'Blood Group',
			'swimmingAbility' => 'Swimming Ability',
			'homeAddress' => 'Home Address',
			'postalCode' => 'Postal Code',
			'housingType' => 'Housing Type',
			'personalEmail' => 'Personal Email',
			'mobilePhone' => 'Mobile Phone',
			'homePhone' => 'Home Phone',
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
		$criteria->compare('firstName',$this->firstName,true);
		$criteria->compare('familyName',$this->familyName,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('studentNumber',$this->studentNumber,true);
		$criteria->compare('school',$this->school,true);
		$criteria->compare('course',$this->course,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('race',$this->race,true);
		$criteria->compare('religion',$this->religion,true);
		$criteria->compare('nationality',$this->nationality,true);
		$criteria->compare('isPR',$this->isPR);
		$criteria->compare('nricNumber',$this->nricNumber,true);
		$criteria->compare('passportNumber',$this->passportNumber,true);
		$criteria->compare('issuingCountry',$this->issuingCountry,true);
		$criteria->compare('issuingDate',$this->issuingDate,true);
		$criteria->compare('expiryDate',$this->expiryDate,true);
		$criteria->compare('tshirtSize',$this->tshirtSize);
		$criteria->compare('bloodGroup',$this->bloodGroup);
		$criteria->compare('swimmingAbility',$this->swimmingAbility);
		$criteria->compare('homeAddress',$this->homeAddress,true);
		$criteria->compare('postalCode',$this->postalCode,true);
		$criteria->compare('housingType',$this->housingType);
		$criteria->compare('personalEmail',$this->personalEmail,true);
		$criteria->compare('mobilePhone',$this->mobilePhone,true);
		$criteria->compare('homePhone',$this->homePhone,true);
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
	 * @return Student the static model class
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
        
        public function afterSave() {
            if (empty($this->medicalInfo)) {
                $medicalInfo = new MedicalInfo;
                $medicalInfo->studentId = $this->id;
                $medicalInfo->save();
            }
            if (empty($this->nextOfKin)) {
                $nextOfKin = new NextOfKin;
                $nextOfKin->studentId = $this->id;
                $nextOfKin->save();
            }
        }
        
        public function getFullName() {
            return $this->firstName . ' ' . $this->familyName;
        }
        
        /**
         * Return true if student profile is complete
         */
        public function getProfileErrors() {
            $errors = array();
            if (!$this->validate())
                array_push ($errors, 'student');
            
            foreach (['familyMembers','nextOfKin','pastTrips','studentCcas'] as $name) {
                if (!$this->validateRelated($name)) {
                    array_push ($errors, $name);
                }
            }
            
            if (empty($this->familyMembers))
                array_push ($errors, 'familyMembers');
            
//            if (!$this->medicalInfo->validate())
//                array_push ($errors, 'medicalInfo');
//            if (is_array($this->studentCcas)) {
//                foreach($this->studentCcas as $studentCca) {
//                    if (!$studentCca->validate()) {
//                        array_push ($errors, 'studentCca');
//                        break;
//                    }
//                }
//            }
//            if (is_array($this->pastTrips)) {
//                foreach ($this->pastTrips as $pastTrip) {
//                    if (!$pastTrip->validate()) {
//                        array_push ($errors, 'pastTrip');
//                        break;
//                    }
//                }
//            }
//            if (!$this->nextOfKin->validate())
//                array_push ($errors, 'nextOfKin');
//            if (is_array($this->familyMembers)) {
//                foreach ($this->familyMembers as $familyMembers) {
//                    if (!$familyMembers->validate()) {
//                        array_push ($errors, 'familyMembers');
//                        break;
//                    }
//                }
//            }
            
            
            return $errors;
        }
}
