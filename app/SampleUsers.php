<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SampleUsers extends Model
{
    protected $table = 'sample_users_data';
    protected $primaryKey = 'id';
    protected $fillable = [
        'fullname', 'email', 'password','image', 'phone',
    ];
}
