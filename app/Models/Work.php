<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Work extends Model
{
    protected $table = 'work';

    protected $fillable = [
        'name',
        'content',
        'file',
        'date_start',
        'date_end',
        'status',
        'level',
        'project_id'
    ];

    protected $dates = [
        'date_start',
        'date_end'
    ];

    public $timestamps = false;

    public function userWork()
    {
        return $this->hasMany(UserWork::class, 'work_id');
    }

    public function getStatusWorkAttribute()
    {
        $statuses = [
            0 => 'Chưa hoàn thành',
            1 => 'Đã hoàn thành'
        ];

        return $statuses[$this->attributes['status']] ?? 'Không xác định';
    }

    public function timeRemaining()
    {
        $now = Carbon::now();
        if ($now->isAfter($this->date_end)) {
            return "Thời gian đã kết thúc.";
        } else {
            $timeRemaining = $this->date_end->diff($now);
            return $timeRemaining->format('%d ngày %h giờ %i phút');
        }
    }

}
