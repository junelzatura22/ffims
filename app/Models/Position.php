<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'position';
    protected $primaryKey = 'p_id';

    protected $fillable = [
        'p_desc',
        'created_by',
        'rank'
    ];

    public static function displayAll()
    {
       return self::select('position.*', 'users.name as author')
       ->join('users','users.id','position.created_by')
       ->orderby('rank', 'asc')->get();//this will not be based because the DataTable sets order
    }
}
