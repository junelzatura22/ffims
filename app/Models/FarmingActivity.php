<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class FarmingActivity extends Model
{
    use HasFactory;

    protected $table = "farming_activities";
    protected $primaryKey = 'fa_id';

    protected $fillable = [
        'fa_name'
    ];


    public static function showFarmingActivity()
    {
        $query =  self::select('farming_activities.*', 'users.name as author', 'commodity.com_name as c_name')
            ->join('users', 'users.id', 'farming_activities.created_by')
            ->join('commodity', 'commodity.com_id', 'farming_activities.commodity_id');

        if (!empty(Request::get('searchKey'))) {
            $query = $query->where('fa_name', 'like', '%' . Request::get('searchKey') . '%');
        }
        if (!empty(Request::get('cid'))) {
            if (Request::get('cid') != "") {
                $query = $query->where('commodity.com_id', '=',  Request::get('cid'));//return ID
            }
        }
        $query = $query->orderby('created_at', 'desc')->paginate(10);


        return $query;
    }
}
