<?php
/**
 * Created by PhpStorm.
 * User: farrukh
 * Date: 14.06.15
 * Time: 21:40
 */

Yii::import('zii.widgets.CPortlet');

class TopMenu extends CPortlet{

	public $contentCssClass='';

	public function init(){
		parent::init();
	}

	protected function renderContent(){
		if(Yii::app()->user->isGuest)
			$this->render('guest');
		else
			$this->render('user');
	}


}