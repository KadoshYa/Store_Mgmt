<?php

namespace App;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Asset extends Model
{
    use SoftDeletes, LogsActivity; 

    protected $fillable =[
        'asset_name', 'asset_category_id', 'asset_description', 'asset_quantity' ,'asset_unit' ,'asset_unit_price','asset_total_price' ,'created_by'
    ];

    protected $dates = ['deleted_at'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return ("User {$eventName} a asset");
    }
 
    public function category(){
        return $this->belongsTo('App\Category');
    }    
}
 