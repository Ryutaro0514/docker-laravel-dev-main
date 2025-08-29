<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $fillable=[
        "title",
        "descliption",
        "completed",
        "author_id"
    ];
}
