<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    use HasFactory;
    protected $table = 'user_project';

    protected $fillable = [
        'project_id',
        'user_id',
        'level'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public $timestamps = false;
}
