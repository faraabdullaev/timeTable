<?php
/**
 * Created by PhpStorm.
 * User: farrukh
 * Date: 02.06.15
 * Time: 13:52
 */

class TableController extends Controller{

	public function actionAddCollumn(){
		$db = Yii::app()->db->createCommand();
		$db->addColumn(
			'{{lesson}}',
			'isFlasher',
			'integer DEFAULT 0'
		);
	}

}