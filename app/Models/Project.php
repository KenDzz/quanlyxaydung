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

    public function group() {
        return $this->belongsTo(group::class, 'group_id');
    }


    public function getStatusTextAttribute()
    {
        $statuses = [
            1 => 'Kế hoạch',
            2 => 'Đang thực hiện',
            3 => 'Tạm dừng',
            4 => 'Hoàn thành',
        ];

        return $statuses[$this->attributes['status']] ?? 'Không xác định';
    }

    public function getStatusColorAttribute()
    {
        $statuses = [
            1 => 'bg-primary',
            2 => 'bg-warning',
            3 => 'bg-danger',
            4 => 'bg-warning',
        ];

        return $statuses[$this->attributes['status']] ?? 'Không xác định';
    }

    public function userProject()
    {
        return $this->hasMany(UserProject::class, 'project_id');
    }
}
