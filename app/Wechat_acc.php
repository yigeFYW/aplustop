<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wechat_acc extends Model
{
    public $table = "wechat_accs";
    public $timestamps = false;
    public $primaryKey = "aid";
}
