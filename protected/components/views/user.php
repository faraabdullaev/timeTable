<?php
$this->widget('zii.widgets.CMenu',array(
	'items'=>array(
		array('label'=>Yii::t('main', 'Teacher List'), 'url'=>array('/site/index')),
		array('label'=>Yii::t('main', 'Lessons'), 'url'=>array('/lesson/')),
		array('label'=>Yii::t('main', 'Groups'), 'url'=>array('/group/')),
		array('label'=>Yii::t('main', 'Students'), 'url'=>array('/user/')),
		array('label'=>Yii::t('main', 'Teachers'), 'url'=>array('/teacher/')),
		array('label'=>Yii::t('main', 'Subjects'), 'url'=>array('/subject/')),
		array('label'=>Yii::t('main', 'Rooms'), 'url'=>array('/room/')),
		array('label'=>Yii::t('main', 'Logout'), 'url'=>array('/site/logout'))

	),
));

?>
