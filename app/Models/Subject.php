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

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'category_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public $orderable = [
        'id',
        'title',
        'description',
        'category.title',
    ];

    public $filterable = [
        'id',
        'title',
        'description',
        'category.title',
        'task.title',
    ];

    public const PRIORITY_SELECT = [
        'low'    => 'Low',
        'medium' => 'Medium',
        'high'   => 'High',
    ];

    public const STATUS_SELECT = [
        'not_started'           => 'Not Started',
        'todo'                  => 'To Do',
        'in_progress'           => 'In progress',
        'done'                  => 'Done',
        'archived'              => 'Archived',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    public function getPriorityLabelAttribute($value)
    {
        return static::PRIORITY_SELECT[$this->priority] ?? null;
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
