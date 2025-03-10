<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['city_name'];

    public function customers()
    {
        return $this->hasMany(Customer::class, 'city_id');
    }
}
