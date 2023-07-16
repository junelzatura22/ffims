<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Farmer extends Model
{
    use HasFactory;

    protected $table = 'farmer';
    protected $primaryKey = 'farmer_id';

    public static function showAllFarmer()
    {
        return DB::select("select * from farmer f, 
        users u where u.id = f.created_by order by farmer_id desc");
    }
}
