<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use SoftDeletes, LogsActivity; 

    protected $fillable =[
        'name', 'description', 'created_by', 'color'
    ];

    protected $dates = ['deleted_at'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return ("User {$eventName} a category");
    }

    public function assets()
    {
        return $this->hasMany('App\Asset');
    }
}
