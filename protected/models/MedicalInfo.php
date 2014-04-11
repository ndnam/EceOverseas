<?php

/**
 * This is the model class for table "medicalinfo".
 *
 * The followings are the available columns in table 'medicalinfo':
 * @property string $id
 * @property string $studentId
 * @property integer $heartProblem
 * @property integer $fits
 * @property integer $faintingSpell
 * @property integer $diabetes
 * @property integer $asthma
 * @property integer $migraine
 * @property integer $visionProblem
 * @property integer $colorBlind
 * @property integer $earProblem
 * @property integer $fractures
 * @property integer $dislocations
 * @property integer $carrierStatus
 * @property string $otherMedicalHistory
 * @property string $currentMedications
 * @property string $otherMedicalConditions
 * @property string $physicalDisabilities
 * @property string $allergies
 * @property integer $vegetarian
 * @property integer $halal
 * @property integer $noSeafood
 * @property integer $noBeef
 * @property string $otherFoodRestrictions
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property Student $student
 */
class MedicalInfo extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'medicalinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('heartProblem, fits, faintingSpell, diabetes, asthma, migraine, visionProblem, colorBlind, earProblem, fractures, dislocations, carrierStatus, vegetarian, halal, noSeafood, noBeef', 'numerical', 'integerOnly'=>true),
			array('otherMedicalHistory, currentMedications, otherMedicalConditions, physicalDisabilities, allergies, otherFoodRestrictions', 'filter', 'filter'=>'trim'),
			array('otherMedicalHistory, currentMedications, otherMedicalConditions, physicalDisabilities, allergies, otherFoodRestrictions', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, studentId, heartProblem, fits, faintingSpell, diabetes, asthma, migraine, visionProblem, colorBlind, earProblem, fractures, dislocations, carrierStatus, otherMedicalHistory, currentMedications, otherMedicalConditions, physicalDisabilities, allergies, vegetarian, halal, noSeafood, noBeef, otherFoodRestrictions, created, modified', 'safe', 'on'=>'search'),
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
			'heartProblem' => 'Heart Problem',
			'fits' => 'Fits',
			'faintingSpell' => 'Fainting Spell',
			'diabetes' => 'Diabetes',
			'asthma' => 'Asthma',
			'migraine' => 'Migraine',
			'visionProblem' => 'Vision Problem',
			'colorBlind' => 'Color Blind',
			'earProblem' => 'Ear Problem',
			'fractures' => 'Fractures',
			'dislocations' => 'Dislocations',
			'carrierStatus' => 'Carrier Status',
			'otherMedicalHistory' => 'Other Medical History',
			'currentMedications' => 'Current Medications',
			'otherMedicalConditions' => 'Other Medical Conditions',
			'physicalDisabilities' => 'Physical Disabilities',
			'allergies' => 'Allergies',
			'vegetarian' => 'Vegetarian',
			'halal' => 'Halal',
			'noSeafood' => 'No Seafood',
			'noBeef' => 'No Beef',
			'otherFoodRestrictions' => 'Other Food Restrictions',
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
		$criteria->compare('heartProblem',$this->heartProblem);
		$criteria->compare('fits',$this->fits);
		$criteria->compare('faintingSpell',$this->faintingSpell);
		$criteria->compare('diabetes',$this->diabetes);
		$criteria->compare('asthma',$this->asthma);
		$criteria->compare('migraine',$this->migraine);
		$criteria->compare('visionProblem',$this->visionProblem);
		$criteria->compare('colorBlind',$this->colorBlind);
		$criteria->compare('earProblem',$this->earProblem);
		$criteria->compare('fractures',$this->fractures);
		$criteria->compare('dislocations',$this->dislocations);
		$criteria->compare('carrierStatus',$this->carrierStatus);
		$criteria->compare('otherMedicalHistory',$this->otherMedicalHistory,true);
		$criteria->compare('currentMedications',$this->currentMedications,true);
		$criteria->compare('otherMedicalConditions',$this->otherMedicalConditions,true);
		$criteria->compare('physicalDisabilities',$this->physicalDisabilities,true);
		$criteria->compare('allergies',$this->allergies,true);
		$criteria->compare('vegetarian',$this->vegetarian);
		$criteria->compare('halal',$this->halal);
		$criteria->compare('noSeafood',$this->noSeafood);
		$criteria->compare('noBeef',$this->noBeef);
		$criteria->compare('otherFoodRestrictions',$this->otherFoodRestrictions,true);
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
	 * @return MedicalInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
}
