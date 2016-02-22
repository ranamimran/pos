<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $order_id
 * @property integer $user_id
 * @property string $mobile_order
 * @property string $order_type
 * @property string $date_received
 * @property string $time_received
 * @property string $status
 * @property string $processed_on
 * @property integer $admin_id
 * @property string $updated_on
 * @property string $created_on
 *
 * The followings are the available model relations:
 * @property OrderImages[] $orderImages
 * @property User $user
 */
class Orders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $fullName;
	public function tableName()
	{
		return 'orders';
	}

	public $first_name;
	public $last_name;
	public $userName;
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, mobile_order, order_type, date_received, time_received, status, processed_on, updated_on, created_on', 'required'),
			array('user_id, admin_id', 'numerical', 'integerOnly'=>true),
			array('mobile_order, date_received, time_received', 'length', 'max'=>100),
			array('order_type, status, processed_on, created_on', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('order_id, first_name,last_name, fullName, mobile_order, order_type, date_received, time_received, status', 'safe', 'on'=>'search'),
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
			'orderImages' => array(self::HAS_MANY, 'OrderImages', 'order_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'admin' => array(self::BELONGS_TO, 'Admin', 'admin_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'order_id' => 'Order Number',
			'user_id' => 'User ID',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'userName' => 'User Name',
			'fullName' => 'Patient Name',
			'mobile_order' => 'Mobile Order',
			'order_type' => 'Order Type',
			'date_received' => 'Recieved Date ',
			'time_received' => 'Recieved Time ',
			'status' => 'Status',
			'processed_on' => 'Processed On',
			'admin_id' => 'Processed By',
			'updated_on' => 'Updated On',
			'created_on' => 'Created On',
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
		$criteria->with = 'user';
		$criteria->order = 'order_id DESC';
                
		$criteria->compare('order_id',$this->order_id);
//		$criteria->compare('user.first_name',$this->first_name);
//		$criteria->compare('user.last_name',$this->last_name);
                $criteria->addSearchCondition('concat(user.first_name, " ", user.last_name)', $this->fullName); 
                $criteria->addSearchCondition('concat(user.first_name, " ", user.last_name)', $this->userName); 
		$criteria->compare('mobile_order',$this->mobile_order,true);
		$criteria->compare('order_type',$this->order_type,true);
		$criteria->compare('date_received',$this->date_received,true);
		$criteria->compare('time_received',$this->time_received,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('processed_on',$this->processed_on,true);
		$criteria->compare('admin_id',$this->admin_id);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                        'pageSize'=>50,
                ),
		));
	}
        function getCreatedDate()
        {
          if ($this->processed_on===null)
            return;

          return Yii::app()->dateFormatter->format("d MMM y H:m:s", $this->processed_on);
        }
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
