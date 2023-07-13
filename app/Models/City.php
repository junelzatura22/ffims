<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class City extends Model
{
    use HasFactory;
    protected $table = 'refcitymun';
    protected $primaryKey = 'id';


    public static function showCityMun($provCode){

        return DB::table('refcitymun')
        ->where('provCode',$provCode)
        ->orderBy('citymunDesc','asc')->get();
    }
}
