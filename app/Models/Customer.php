<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'cust_id';
    protected $fillable = ['cust_name', 'cust_code', 'cust_address', 'city_id', 'city_name'];
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
