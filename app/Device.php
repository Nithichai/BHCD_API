<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'device';

    protected $primaryKey = 'espno';

    protected $hidden = ['password'];
}
