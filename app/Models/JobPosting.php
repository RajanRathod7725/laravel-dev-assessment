<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class JobPosting extends Authenticatable
{
    use SoftDeletes;

    protected $guarded = ['id'];
}
