<?php

namespace app\models;

use yii\db\ActiveRecord;



class Users extends ActiveRecord
{
    static public function tableName()
    {
        return 'users';
    }
}



