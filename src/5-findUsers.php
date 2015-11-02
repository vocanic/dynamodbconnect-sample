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

/*
 * KeyConditions = EQ | LE | LT | GE | GT | BEGINS_WITH | BETWEEN
 * ComparisonOperator = EQ | NE | LE | LT | GE | GT | NOT_NULL | NULL | CONTAINS | NOT_CONTAINS | BEGINS_WITH | IN | BETWEEN
 */

//Clear Database

if(User::isTableExists()){
    User::deleteTable();
}
User::createTable(new User());


$user = new User();
$user->client = "Vocanic";
$user->email = "user1@vocanic.com";
$user->password = "Password1";
$user->time = 5001;
$user->name = "User ".rand();
$user->location = "SL";
$user->Save();

echo "Inserting  user (1) :".json_encode($user,true)."\r\n";

$user = new User();
$user->client = "Vocanic";
$user->email = "user2@vocanic.com";
$user->password = "Password2";
$user->time = 6034;
$user->name = "User ".rand();
$user->location = "SL";
$user->Save();

echo "Inserting user (2) :".json_encode($user,true)."\r\n";

$user = new User();
$user->client = "Vocanic";
$user->email = "user2@huckleberryapp.com";
$user->password = "Password3";
$user->time = 1230;
$user->name = "User ".rand();
$user->location = "SL";
$user->Save();

echo "Inserting user (2) :".json_encode($user,true)."\r\n";


echo "Finding users where email =  user1@vocanic.com. (You should get one result)"."\r\n";

$users = $user->Find(
    array(
        "email"=>array(
            array("S"=>"user1@vocanic.com"),
            "EQ"
        )
    )
);
echo "Users :".json_encode($users)."\r\n";
echo "Users Count :".count($users)."\r\n";

echo "Finding users where email like '%user1@vocanic.com%'. (You should get two results)"."\r\n";

$users = $user->Find(
    array(
        "email"=>array(
            array("S"=>"vocanic.com"),
            "CONTAINS"
        )
    )
);
echo "Users :".json_encode($users)."\r\n";
echo "Users Count :".count($users)."\r\n";


echo "Finding users where email like '%user1%' and passowrd = 'Password1'. (You should get one result)"."\r\n";

$users = $user->Find(
    array(
        "email"=>array(
            array("S"=>"user1"),
            "CONTAINS"
        ),
        "password"=>array(
            array("S"=>"Password1"),
            "EQ"
        )
    )
);
echo "Users :".json_encode($users)."\r\n";
echo "Users Count :".count($users)."\r\n";


echo "Finding users where time > 10. (You should get 3 results)"."\r\n";

$users = $user->Find(
    array(
        "time"=>array(
            array("N"=>10),
            "GT"
        )
    )
);
echo "Users :".json_encode($users)."\r\n";
echo "Users Count :".count($users)."\r\n";

echo "Finding users where time > 5000. (You should get 2 results)"."\r\n";

$users = $user->Find(
    array(
        "time"=>array(
            array("N"=>5000),
            "GT"
        )
    )
);
echo "Users :".json_encode($users)."\r\n";
echo "Users Count :".count($users)."\r\n";


echo "Count users where time > 5000. (You should get 2 results)"."\r\n";

$usersCount = $user->Count(
    array(
        "time"=>array(
            array("N"=>5000),
            "GT"
        )
    )
);
echo "Users count :".$usersCount."\r\n";