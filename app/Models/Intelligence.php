<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intelligence extends Model
{
    protected $table = "intelligences";

    protected $fillable = [
        'title',
        'focus_img_url',
        'summary',
        'content',
        'author',
        'editor',
        'status'
    ];
}
