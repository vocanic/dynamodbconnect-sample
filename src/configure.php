<?php
if(defined('USE_LOCAL_DB') && USE_LOCAL_DB === "0"){
    $isTestDB = false;
}

\Vocanic\Common\DynamoDBObject::initializeDynamoDBClient(AWS_DYNAMO_DB_ACCESS_KEY, AWS_DYNAMO_DB_ACCESS_SECRET, NULL, true);
User::addKey('client');
User::addKey('userId');
User::addKey('email');
User::addSecondaryIndex('email','emailIndex');