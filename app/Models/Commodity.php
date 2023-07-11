<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    use HasFactory;

    protected $table = "commodity";
    protected $primaryKey = 'com_id';



    public static function showCommodityList()
    {
        return self::select('commodity.*', 'users.name as author')
            ->join('users', 'users.id', 'commodity.created_by')
            ->orderby('created_at', 'desc')->paginate(10);
    }

    public static function commodityList()
    {
        return self::select('commodity.*')
            ->orderby('com_name', 'asc')->get();
    }
}
