<?php

/**
 * This is the model class for table "dictionary".
 *
 * The followings are the available columns in table 'dictionary':
 * @property string $id
 * @property integer $type
 * @property string $label
 * @property integer $value
 * @property integer $position
 */
class Dictionary extends CActiveRecord
{
        const TYPE_BOOLEAN = 1;
        const TYPE_APPLICATION_STATUS = 2;
        const TYPE_STAFF_ROLE = 3;
        const TYPE_SWIMMING_ABILITY = 4;
        const TYPE_TSHIRT_SIZE = 5;
        const TYPE_BLOOD_GROUP = 6;
        const TYPE_HOUSING = 7;
        const TYPE_PROJECT_STATUS = 8;
        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dictionary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, label, value', 'required'),
			array('type, value, position', 'numerical', 'integerOnly'=>true),
			array('label', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, label, value, position', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'label' => 'Label',
			'value' => 'Value',
			'position' => 'Position',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('value',$this->value);
		$criteria->compare('position',$this->position);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Dictionary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        private static $_items = array();
        
        /**
         * 
         * @param integer $type
         */
        public static function loadItems($type) {
            self::$_items[$type] = array();
            $models = self::model()->findAll(array(
                'condition'=>'type=:type',
                'params'=>array(':type'=>$type),
                'order'=>'position',)
            );
            foreach ($models as $model) 
                self::$_items[$type][$model->value] = $model->label;
        }
        
        public static function items($type) {
            if (!isset(self::$_items[$type]))
                self::loadItems($type);
            return self::$_items[$type];
        }
        
        public static function item($type,$value) {
		if(!isset(self::$_items[$type]))
                    self::loadItems($type);
		return isset(self::$_items[$type][$value]) ? self::$_items[$type][$value] : false;
        }
}
