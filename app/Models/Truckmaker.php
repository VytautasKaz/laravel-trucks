<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truckmaker extends Model
{
    use HasFactory;

    public $fillable = ['name'];

    public function trucks()
    {
        return $this->hasMany('App\Models\Truck');
    }
}
