<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $table = 'ActivityLogs';

    protected $fillable = [
    	'username',
    	'user_id',
    	'current_url',
    	'action',
    	'ip_address',
    	'user_agent'
    ];
}
