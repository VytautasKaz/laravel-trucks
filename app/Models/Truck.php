<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Truck extends Model
{
    use HasFactory;
    use Sortable;

    public $fillable = ['year', 'name', 'owners_count', 'comments', 'truckmaker_id'];
    public $sortable = ['year', 'name', 'owners_count', 'comments', 'truckmaker_id'];

    public function truckmaker()
    {
        return $this->belongsTo('App\Models\Truckmaker');
    }
}
