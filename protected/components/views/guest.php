<?php
$this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>Yii::t('main', 'Teacher List'), 'url'=>array('/site/index')),
		array('label'=>Yii::t('main', 'Login'), 'url'=>array('/site/login')),
	),
));
?>
