<?php

/**
 * This is the model class for table "{{lesson}}".
 *
 * The followings are the available columns in table '{{lesson}}':
 * @property integer $id
 * @property integer $subject_id
 * @property integer $group_id
 * @property integer $room_id
 * @property integer $teacher_id
 * @property string $time
 * @property string $day
 * @property string $type
 *
 * The followings are the available model relations:
 * @property Subject $subject
 * @property Group $group
 * @property Room $room
 * @property Teacher $teacher
 */
class Lesson extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{lesson}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subject_id, group_id, room_id, teacher_id, time, day, type', 'required'),
			array('subject_id, group_id, room_id, teacher_id', 'numerical', 'integerOnly'=>true),
			array('time, day, type', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, subject_id, group_id, room_id, teacher_id, time, day, type', 'safe', 'on'=>'search'),
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
			'subject' => array(self::BELONGS_TO, 'Subject', 'subject_id'),
			'group' => array(self::BELONGS_TO, 'Group', 'group_id'),
			'room' => array(self::BELONGS_TO, 'Room', 'room_id'),
			'teacher' => array(self::BELONGS_TO, 'Teacher', 'teacher_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('main', 'id'),
			'subject_id' => Yii::t('main', 'subject'),
			'group_id' => Yii::t('main', 'group'),
			'room_id' => Yii::t('main', 'room'),
			'teacher_id' => Yii::t('main', 'teacher'),
			'time' => Yii::t('main', 'time'),
			'day' => Yii::t('main', 'day'),
			'type' => Yii::t('main', 'type'),
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
	public function search(){

		$criteria=new CDbCriteria;

		$criteria->with = array( 'subject', 'group', 'teacher', 'room' );

		$criteria->compare('id',$this->id);
		$criteria->compare('subject.name', $this->subject_id, true);
		$criteria->compare('group.name', $this->group_id, true);
		$criteria->compare('room.name', $this->room_id, true);
		$criteria->compare('teacher.name', $this->teacher_id, true);
		$criteria->compare('time',$this->time);
		$criteria->compare('day',$this->day);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Lesson the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getTypeList(){
		return array(
			'1' => Yii::t('main', 'Lecture'),
			'2' => Yii::t('main', 'Practise'),
			'3' => Yii::t('main', 'Laboratory'),
			'4' => Yii::t('main', 'Seminar'),
		);
	}

	public static function getDayList(){
		return array(
			'1' => Yii::t('main', 'Monday'),
			'2' => Yii::t('main', 'Tuesday'),
			'3' => Yii::t('main', 'Wednesday'),
			'4' => Yii::t('main', 'Thursday'),
			'5' => Yii::t('main', 'Friday'),
			'6' => Yii::t('main', 'Saturday'),
		);
	}

	public static function getTimeList(){
		return array(
			'1' => Yii::t('main', 'First'),
			'2' => Yii::t('main', 'Second'),
			'3' => Yii::t('main', 'Third'),
			'4' => Yii::t('main', 'Fourth'),
			'5' => Yii::t('main', 'Fifth'),
		);
	}
}
