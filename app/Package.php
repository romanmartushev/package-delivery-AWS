<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package';
    protected $fillable = [
        'source_address', 'destination_address', 'time_order_placed','time_delivered','cost',
    ];
}
