<?php

/**
 * This is the model class for table "student".
 *
 * The followings are the available columns in table 'student':
 * @property string $id
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
class Student extends ActiveRecord
{
        // Stores the profile picture and passport photo
        public $photo;
        public $passport;
        
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
                        array('birthday, issuingDate, expiryDate','date','format'=>'d/M/yyyy'),
			array('gender, isPR, tshirtSize, bloodGroup, swimmingAbility, housingType', 'numerical', 'integerOnly'=>true),
			array('firstName, familyName, school, course, race, religion, nationality, passportNumber, personalEmail', 'length', 'max'=>50),
                        array('personalEmail','email'),
                        //Custom validators:
                        array('mobilePhone, homePhone','match','pattern'=>'/^\d+$/'),
                        array('nricNumber','match','pattern'=>'/^[SFTGsftg][0-9]{7}.$/'),
//                        array('expiryDate','validateExpiryDate'),
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
            if (strtotime(ModelHelper::convertDateForSave($this->$attribute)) <= strtotime(ModelHelper::convertDateForSave($this->issuingDate)))
                $this->addError ($attribute, 'Invalid Expiry Date');
        }
        
        /**
         * Validate related model(s)
         * $relatedModel == null | empty array -> return true
         * @param string|Object|array $relation
         * @return boolean
         */
        public function validateRelated($relation) {
//            $this->clearErrors();
            if (is_string($relation)) {
                $relation = $this->$relation;
            }
            if (is_array($relation)) {
                $isValid = true;
                foreach ($relation as $model) {
                    if (!$this->validateRelated($model)) {
                        $isValid = false;
                    }
                }
                return $isValid;
            } 
            if (!is_null($relation)) { // If $relation is object
                if (!$relation->validate()) {
                    return false;
                } 
            }
            return true;
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
                        'user' => array(self::HAS_ONE,'User','studentId'),
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
            $this->birthday = ModelHelper::convertDateForSave($this->birthday);
            $this->issuingDate = ModelHelper::convertDateForSave($this->issuingDate);
            $this->expiryDate = ModelHelper::convertDateForSave($this->expiryDate);
            return parent::beforeSave();;
        }
        
        public function afterFind() {
            $this->birthday = ModelHelper::convertDateForDisplay($this->birthday);
            $this->issuingDate = ModelHelper::convertDateForDisplay($this->issuingDate);
            $this->expiryDate = ModelHelper::convertDateForDisplay($this->expiryDate);
        }
        
        public function afterSave() {
            parent::afterSave();
            $this->afterFind();
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
        
        public function validate($attributes=null, $clearErrors=true) {
            $valid = parent::validate($attributes, $clearErrors);
            if (!$this->validateImage('photo')) {
                $valid = false;
            }
            if (!$this->validateImage('passport')) {
                $valid = false;
            }
            return $valid;
        }
        
        /**
         * 
         * @param string $property 'photo'|'passport'
         */
        public function validateImage($property){
            if (!$this->$property instanceof CUploadedFile) {
                // If user didn't upload a picture but we already have the picture in server
                if ($this->hasPicture($property)) {
                    return true;
                }
                switch($property) {
                    case 'photo': $message = 'You need to upload your photo'; break;
                    case 'passport': $message = 'You need to upload a photo of your passport for validation of expiry date'; break;
                }
                $this->addError($property, $message);
                return false;
            } 
            if ($this->$property->hasError) {
                $this->addError($property, 'File upload failed');
                return false;
                
            }
            if (!preg_match('/image.*/', $this->$property->type)) 
                return false;
            
            if ($this->$property->size > 10485760) 
                return false;
            
            // If uploaded file is OK, save the image file
            switch($property) {
                case 'photo': $this->processImage('photo',960,960); break;
                case 'passport': $this->processImage('passport',1600,1200); break;
            }
//            $filePath = Yii::getPathOfAlias('webroot').'/files/user/'.Yii::app()->user->username.'/';
//            if ((!file_exists($filePath) and !is_dir($filePath)))
//                mkdir($filePath,0777,true);
//            $this->$property->saveAs($filePath.$property);
            return true;
        }
        
        /**
         * Resize and save the image
         * @param string $property 'photo'|'passport'
         * @param integer $maxWidth Image max width
         * @param integer $maxHeight Image max height
         * return boolean Whether the process succeeded or not
         */
        public function processImage($property,$maxWidth,$maxHeight){
            $filePath = Yii::getPathOfAlias('webroot').'/files/user/'.Yii::app()->user->username.'/';
            if ((!file_exists($filePath) and !is_dir($filePath)))
                mkdir($filePath,0777,true);
            $fileName = $filePath.$property;
            $file = $this->$property;
            
            $imageType = $file->type;
            $tempSrc = $file->tempName;
            switch(strtolower($imageType)) {
                case 'image/png':
                    //Create a new image from file
                    $createdImage = imagecreatefrompng($tempSrc);
                    break;
                case 'image/gif':
                    $createdImage = imagecreatefromgif($tempSrc);
                    break;         
                case 'image/jpeg':
                case 'image/pjpeg':
                    $createdImage = imagecreatefromjpeg($tempSrc);
                    break;
                default:
                    return false;
            }
            //PHP getimagesize() function returns height/width from image file stored in PHP tmp folder.
            //Get first two values from image, width and height.
            //list assign svalues to $CurWidth,$CurHeight
            list($curWidth, $curHeight) = getimagesize($tempSrc);
            
            // Begin resizing image
            if($curWidth <= 0 || $curHeight <= 0) {
                return false;
            }
            // Construct a proportional size of new image
            $imageScale = min($maxWidth/$curWidth, $maxHeight/$curHeight);
            // We only need to reduce image size
            if ($imageScale < 1) {
                $newWidth   = ceil($imageScale*$curWidth);
                $newHeight  = ceil($imageScale*$curHeight);
                $newCanvas  = imagecreatetruecolor($newWidth, $newHeight);
                imagecopyresampled($newCanvas, $createdImage,0, 0, 0, 0, $newWidth, $newHeight, $curWidth, $curHeight);
                switch(strtolower($imageType)) {
                    case 'image/png':
                        imagepng($newCanvas,$fileName);
                        break;
                    case 'image/gif':
                        imagegif($newCanvas,$fileName);
                        break;         
                    case 'image/jpeg':
                    case 'image/pjpeg':
                        imagejpeg($newCanvas,$fileName,80);
                        break;
                    default:
                        return false;
                }
                //Destroy image, frees memory  
                if(is_resource($newCanvas)) 
                    imagedestroy($newCanvas);
            } else {
                $this->$property->saveAs($fileName);
            }
            $this->$property = null;
            return true;
        }
        
        public function getFullName() {
            return trim($this->firstName . ' ' . $this->familyName);
        }
        
        /**
         * Return true if student profile is complete
         */
        public function getProfileErrors() {
            $errors = array();
            if (!$this->validate() || !$this->hasPicture('photo') || !$this->hasPicture('passport')){
                array_push ($errors, 'student');
            }
            
            if (!$this->hasPicture('photo')) {
                array_push ($errors, 'photo');
            }
            
            if (!$this->hasPicture('passport')) {
                array_push ($errors, 'passport');
            }
            
            foreach (['familyMembers','nextOfKin','pastTrips','studentCcas'] as $relation) {
                if (!$this->validateRelated($relation)) {
                    array_push ($errors, $relation);
                }
            }
            
            if (count($this->familyMembers) == 0)
                array_push ($errors, 'familyMembers');
            
            if (in_array('nextOfKin', $errors) || in_array('familyMembers', $errors)) {
                array_push ($errors, 'family');
            }
            
            if (in_array('studentCcas', $errors) || in_array('pastTrips', $errors)) {
                array_push ($errors, 'cca');
            }
            
            return $errors;
        }
        
        /**
         * check if student has applied for specified project
         * @param integer $projectId
         */
        public function appliedFor($projectId) {
            if (StudentApplication::model()->findByAttributes(array('projectId'=>$projectId,'studentId'=>$this->id))) {
                return true;
            }
            return false;
        }
        
        /**
         * Check if student have uploaded pictures
         * @param type $type 'photo'|'passport'
         * @return boolean
         */
        public function hasPicture($type) {
            return (file_exists(Yii::getPathOfAlias('webroot').'/files/user/'.$this->user->username.'/'.$type));
        }
        
}
