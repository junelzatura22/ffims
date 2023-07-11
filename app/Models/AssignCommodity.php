<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignCommodity extends Model
{
    use HasFactory;

    protected $table = "assigned_to_commodity";
    protected $primaryKey = 'atc_id';

}
