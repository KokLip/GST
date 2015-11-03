<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
	public $lol;

    public function rules()
    {
        return [
            [['name', 'email', 'lol'], 'required'],
            ['email', 'email'],
        ];
    }
}