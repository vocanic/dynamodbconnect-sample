<?php
date_default_timezone_set('Asia/Singapore');

if(!defined('USE_LOCAL_DB')){define('USE_LOCAL_DB',"1");}
if(!defined('AWS_CLIENT_VERSION')){define('AWS_CLIENT_VERSION',"2012-08-10");}

if(!defined('AWS_DYNAMO_DB_ACCESS_KEY')){define('AWS_DYNAMO_DB_ACCESS_KEY','__A_VALID_AWS_KEY_REQUIRED__');}
if(!defined('AWS_DYNAMO_DB_ACCESS_SECRET')){define('AWS_DYNAMO_DB_ACCESS_SECRET','__A_VALID_AWS_SECRET_REQUIRED__');}


include  dirname(__FILE__)."/vendor/autoload.php";
