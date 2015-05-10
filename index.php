<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

$config = require_once dirname(__FILE__) . '/protected/config/main.php';
$db = require_once dirname(__FILE__) . '/protected/config/db_config.php';

require_once($yii);
Yii::createWebApplication(CMap::mergeArray($config, $db))->run();
