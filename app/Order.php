<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use SoftDeletes, LogsActivity; 

    protected $fillable =[
        'asset_id', 'employee_id', 'order_description', 'order_quantity', 'order_type','managed_by' ,'order_status', 'request_date','response_date'
    ];

    protected $dates = ['deleted_at']; 

    protected static $logAttributes = ['description' ,'order_status'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Request';

    public function getDescriptionForEvent(string $eventName): string
    {
        return ("User {$eventName} a Request");
    }
}
 