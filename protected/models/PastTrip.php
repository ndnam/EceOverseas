<?php

/**
 * This is the model class for table "pasttrip".
 *
 * The followings are the available columns in table 'pasttrip':
 * @property string $id
 * @property string $studentId
 * @property string $programName
 * @property int $country
 * @property string $duration
 * @property string $capacity
 * @property int $isSubsidized
 * @property double $amount
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property DictCountry $country0
 * @property Student $student
 */
class PastTrip extends CActiveRecord
{
        public function __construct($scenario = 'insert') {
            parent::__construct($scenario);
            $this->country = 340;
        }
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pasttrip';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('programName, duration, capacity', 'filter', 'filter'=>'trim'),
			array('programName, duration, capacity', 'required'),
			array('isSubsidized, amount, country', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, studentId, programName, country, duration, capacity, isSubsidized, amount, created, modified', 'safe', 'on'=>'search'),
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
			'country0' => array(self::BELONGS_TO, 'DictCountry', 'country'),
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
			'programName' => 'Program Name',
			'country' => 'Country',
			'duration' => 'Duration',
			'capacity' => 'Capacity',
			'isSubsidized' => 'Is Subsidized',
			'amount' => 'Amount',
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
		$criteria->compare('programName',$this->programName,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('capacity',$this->capacity,true);
		$criteria->compare('isSubsidized',$this->isSubsidized);
		$criteria->compare('amount',$this->amount);
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
	 * @return PastTrip the static model class
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
        
        public function __toString() {
            return (string)$this->id;
        }
}
