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
        '1'    => 'Low',
        '2' => 'Medium',
        '3'   => 'High',
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
        '1'         => 'To Do',
        '2'         => 'In progress',
        '3'         => 'Done',
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

    public function subject()
    {
        return $this->belongsToMany(Subject::class);
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
        if ($this->status == 1) {
            return 'badge-gray';
        } else if ($this->status == 3) {
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
