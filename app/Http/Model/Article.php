<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'article'; //表名
    protected  $primaryKey = 'act_id'; //主键
     public $timestamps = false;

    protected $guarded=[];//表示所有的字段都可以添加


}
