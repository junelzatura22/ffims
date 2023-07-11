<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Province extends Model
{
    use HasFactory;
    protected $table = 'refprovince';
    protected $primaryKey = 'id';

    public static function showRegion()
    {
       return self::select('refprovince.*')
       ->orderby('provDesc', 'asc')->get();
    }
}
