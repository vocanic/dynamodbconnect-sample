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


if(User::isTableExists()){
    User::deleteTable();
}
User::createTable(new User());

