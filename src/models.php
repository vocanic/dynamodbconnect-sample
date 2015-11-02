<?php

class User extends \Vocanic\Common\DynamoDBObject{

    public function getTableName(){
        return "Users";
    }

    public function getDataFields(){
        return array(
            "client",
            "userId",
            "email",
            "password",
            "name",
            "location",
            "time"
        );
    }

    public function getTableMeta(){
        return array(
            'TableName'=>$this->getTableName(),
            'AttributeDefinitions'=>array(
                array(
                    'AttributeName' => 'client',
                    'AttributeType' => 'S'
                ),
                array(
                    'AttributeName' => 'userId',
                    'AttributeType' => 'S'
                ),
                array(
                    'AttributeName' => 'email',
                    'AttributeType' => 'S'
                )
            ),
            'KeySchema' => array(
                array(
                    'AttributeName' => 'client',
                    'KeyType'       => 'HASH'
                ),
                array(
                    'AttributeName' => 'userId',
                    'KeyType'       => 'RANGE'
                )
            ),

            'GlobalSecondaryIndexes' => array(
                array(
                    'IndexName' => 'emailIndex',
                    'KeySchema' => array(
                        array('AttributeName' => 'email',    'KeyType' => 'HASH')
                    ),
                    'Projection' => array(
                        'ProjectionType' => 'KEYS_ONLY',
                    ),
                    'ProvisionedThroughput' => array(
                        'ReadCapacityUnits'  => 1,
                        'WriteCapacityUnits' => 1
                    )
                )
            ),


            'ProvisionedThroughput' => array(
                'ReadCapacityUnits'  => 1,
                'WriteCapacityUnits' => 1
            )
        );
    }
}



