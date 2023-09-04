<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWork extends Model
{
    protected $table = 'user_work';

    protected $fillable = [
        'work_id',
        'user_id'
    ];

    public $timestamps = false;

    public function work()
    {
        return $this->belongsTo(Work::class, 'work_id');
    }

}
