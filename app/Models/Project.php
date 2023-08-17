<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'project';


    protected $fillable = [
        'name',
        'status',
        'customer_id',
        'date_start',
        'date_end',
        'budget',
        'describe',
        'group_id'
    ];

    protected $dates = [
        'date_start',
        'date_end'
    ];

    public $timestamps = false;

}
