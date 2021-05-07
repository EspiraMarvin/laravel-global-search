<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Trip extends Model
{
    protected $table = "trips";

    protected $fillable = [
        'id','status', 'request_date', 'pickup_lat','pickup_lng','pickup_location','dropoff_lat','dropoff_lng',
        'dropoff_location', 'pickup_date','dropoff_date','driver_id','driver_name','driver_rating','driver_pic',
        'car_make','car_model','car_number','car_year','car_pic','duration','duration_unit','distance','distance_unit',
        'cost','cost_unit'
    ];
    protected $dates = ['request_date', 'pickup_date', 'dropoff_date','mydate','created_at','updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('completed', function (Builder $builder) {
            $builder->where('status', 'LIKE', 'COMPLETED');
        });
    }
}
