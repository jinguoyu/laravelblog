<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
        protected $table = 'category';
    protected $primaryKey ='cat_id';
    public $timestamps = false;

    protected $guarded=[];//表示所有的字段都可以添加
}
