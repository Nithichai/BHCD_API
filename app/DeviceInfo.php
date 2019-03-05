<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceInfo extends Model
{
    protected $table = 'device_infomation';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'deviceid'
    ];
}
