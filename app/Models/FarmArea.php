<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FarmArea extends Model
{
    use HasFactory;

    protected $table = 'farmarea';
    protected $primaryKey = 'farm_id';

    public static function showFarmAreaOf($id)
    {
        return DB::table('farmarea')
            ->join('farmer', 'farmarea.owned_by', 'farmer.farmer_id')
            ->where('owned_by', '=', $id)
            ->orderBy('farmarea.created_at', 'desc')
            ->get();
    }
    public static function showFarmAreaById($id)
    {
        return DB::select('SELECT * FROM farmarea f, farmer fa
        where f.owned_by = fa.farmer_id and farm_id = :id', [$id]);
    }

    public static function loadAreaOf($id)
    {
        return DB::select('SELECT * FROM farmarea f where owned_by = :id', [$id]);
    }
    public static function countFarmArea($id)
    {
        return DB::select('SELECT count(*) as dataCount FROM farmarea f where owned_by = :id', [$id]);
    }

}
