<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $table = 'refregion';
    protected $primaryKey = 'id';

    public static function showRegion()
    {
       return self::select('refregion.*')
       ->orderby('regCode', 'asc')->get();
    }
}
