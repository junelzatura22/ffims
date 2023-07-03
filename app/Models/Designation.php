<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;


    protected $table = 'designation';
    protected $primaryKey = 'd_id';

    // protected $fillable = [
    //     'd_abr',
    //     'created_by',
    //     'd_description'
    // ];

    public static function displayAll()
    {
       return self::select('designation.*', 'users.name as author')
       ->join('users','users.id','designation.created_by')
       ->orderby('created_at', 'desc')->get();//this will not be based because the DataTable sets order
    }
}
