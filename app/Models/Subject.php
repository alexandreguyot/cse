<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'subjects';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
    ];

    public $orderable = [
        'id',
        'title',
        'description',
        'priority',
        'status',
    ];

    public const PRIORITY_SELECT = [
        '1'     => 'Low',
        '2'     => 'Medium',
        '3'     => 'High',
    ];

    public $filterable = [
        'id',
        'title',
        'description',
        'priority',
        'status',
        'task.title',
    ];

    public const STATUS_SELECT = [
        '1'         => 'Not Started',
        '2'         => 'To Do',
        '3'         => 'In Progress',
        '4'         => 'Done',
        '5'         => 'Archived',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getPriorityLabelAttribute($value)
    {
        return static::PRIORITY_SELECT[$this->priority] ?? null;
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    public function task()
    {
        return $this->belongsToMany(Task::class);
    }

    public function category()
    {
        return $this->belongsToMany(Task::class);
    }

    public function getBadgesByPriority() {
        if ($this->priority == '1') {
            return 'badge-green';
        } else if ($this->priority == '2') {
            return 'badge-blue';
        }
        return 'badge-red';
    }

    public function getBadgesByStatus() {
        if ($this->status == 1 || $this->status == 2) {
            return 'badge-gray';
        } else if ($this->status == 4 || $this->status == 5) {
            return 'badge-blue';
        }
        return 'badge-green';
    }

    public function getCreatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }

    public function getDeletedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.datetime_format')) : null;
    }
}
