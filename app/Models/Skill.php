<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Skill extends Authenticatable
{
    use SoftDeletes;

    protected $guarded = ['id'];
}
