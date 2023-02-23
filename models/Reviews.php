<?php

namespace app\models;

use yii\db\ActiveRecord;



class Reviews extends ActiveRecord
{
    static public function tableName()
    {
        return 'reviews';
    }
}



