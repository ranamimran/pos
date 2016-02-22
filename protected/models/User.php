<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $date_of_birth
 * @property string $relation
 * @property string $phi_number
 * @property string $shi_provider
 * @property string $shi_number
 * @property string $delivery_address
 * @property string $address_2
 * @property string $city
 * @property string $province
 * @property string $postal_code
 * @property string $billing_address_1
 * @property string $billing_address_2
 * @property string $billing_city
 * @property string $billing_province
 * @property string $billing_postal_code
 * @property string $preferred_time
 * @property string $packagining
 * @property string $special_instruction
 * @property integer $parent_id
 * @property string $updated_on
 * @property string $created_on
 *
 * The followings are the available model relations:
 * @property Orders[] $orders
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, email, password, date_of_birth, relation, phi_number, shi_provider, shi_number, delivery_address, address_2, city, province, postal_code, billing_address_1, billing_address_2, billing_city, billing_province, billing_postal_code, preferred_time, packagining, special_instruction, parent_id, updated_on, created_on', 'required'),
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>120),
			array('email, packagining', 'length', 'max'=>100),
			array('password, relation, preferred_time', 'length', 'max'=>150),
			array('date_of_birth, phi_number, shi_provider, shi_number, city, province, postal_code, billing_city, billing_province, billing_postal_code', 'length', 'max'=>50),
			array('delivery_address, address_2, billing_address_1, billing_address_2', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('user_id, first_name, last_name, email, password, date_of_birth, relation, phi_number, shi_provider, shi_number, delivery_address, address_2, city, province, postal_code, billing_address_1, billing_address_2, billing_city, billing_province, billing_postal_code, preferred_time, packagining, special_instruction, parent_id, updated_on, created_on', 'safe', 'on'=>'search'),
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
			'orders' => array(self::HAS_MANY, 'Orders', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'email' => 'Email',
			'password' => 'Password',
			'date_of_birth' => 'Date Of Birth',
			'relation' => 'Relation',
			'phi_number' => 'PHIN',
			'shi_provider' => 'SHIP',
			'shi_number' => 'SHIN',
			'delivery_address' => 'Delivery Address',
			'address_2' => 'Address 2',
			'city' => 'City',
			'province' => 'Province',
			'postal_code' => 'Postal Code',
			'billing_address_1' => 'Billing Address 1',
			'billing_address_2' => 'Billing Address 2',
			'billing_city' => 'Billing City',
			'billing_province' => 'Billing Province',
			'billing_postal_code' => 'Billing Postal Code',
			'preferred_time' => 'Preferred Time',
			'packagining' => 'Packagining',
			'special_instruction' => 'Special Instruction',
			'parent_id' => 'Parent',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('relation',$this->relation,true);
		$criteria->compare('phi_number',$this->phi_number,true);
		$criteria->compare('shi_provider',$this->shi_provider,true);
		$criteria->compare('shi_number',$this->shi_number,true);
		$criteria->compare('delivery_address',$this->delivery_address,true);
		$criteria->compare('address_2',$this->address_2,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('postal_code',$this->postal_code,true);
		$criteria->compare('billing_address_1',$this->billing_address_1,true);
		$criteria->compare('billing_address_2',$this->billing_address_2,true);
		$criteria->compare('billing_city',$this->billing_city,true);
		$criteria->compare('billing_province',$this->billing_province,true);
		$criteria->compare('billing_postal_code',$this->billing_postal_code,true);
		$criteria->compare('preferred_time',$this->preferred_time,true);
		$criteria->compare('packagining',$this->packagining,true);
		$criteria->compare('special_instruction',$this->special_instruction,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
