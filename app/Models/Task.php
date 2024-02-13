<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, HasAdvancedFilter, SoftDeletes;

    public $table = 'tasks';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'description',
        'date',
        'status',
        'priority',
    ];

    public const PRIORITY_SELECT = [
        'low'    => 'Low',
        'medium' => 'Medium',
        'high'   => 'High',
    ];

    public $orderable = [
        'id',
        'title',
        'description',
        'date',
        'status',
        'priority',
    ];

    public const STATUS_SELECT = [
        'todo'        => 'To Do',
        'in_progress' => 'In progress',
        'done'        => 'Done',
    ];

    public $filterable = [
        'id',
        'title',
        'description',
        'date',
        'status',
        'priority',
        'user.name',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('project.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStatusLabelAttribute($value)
    {
        return static::STATUS_SELECT[$this->status] ?? null;
    }

    public function getPriorityLabelAttribute($value)
    {
        return static::PRIORITY_SELECT[$this->priority] ?? null;
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
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
