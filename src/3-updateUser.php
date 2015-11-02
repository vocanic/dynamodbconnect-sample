<?php
/**
This script creates a table named Users with following details
 * HASH key = client
 * RANGE Key = userId
 * Global secondary index = email
 */

include dirname(__FILE__)."/../include.inc.php";
include dirname(__FILE__)."/models.php";
include dirname(__FILE__)."/configure.php";

$user = new User();
$user->client = 'Vocanic';
$user->email = "user@vocanic.com";
$user->password = "Password";
$user->name = "User ".rand();
$user->location = "SL";
$user->time = 100;
$user->Save();

$user1 = new User();
$ok = $user1->Load(array($user->client,$user->userId), true);

echo "Newly created user  = ".json_encode($user1)."\r\n";

$user1->time = 234;
$user1->email = "test@hc.com";
$user1->Save();

$user2 = new User();
$ok = $user2->Load(array($user->client,$user->userId), true);

echo "User after update = ".json_encode($user2)."\r\n";