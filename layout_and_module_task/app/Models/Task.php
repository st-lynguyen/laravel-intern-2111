<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'type', 'status', 'start_date', 'due_date', 'assignee', 'estimate', 'actual'];

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getStatusLabelAttribute()
    {
        return [
            '1' => 'Open',
            '2' => 'In process',
            '3' => 'Resolved',
            '4' => 'Pending',
            '5' => 'Verified',
            '6' => 'Closed'
        ][$this->status];
    }

    public function getTypeLabelAttribute()
    {
        return [
            '1' => 'Story',
            '2' => 'Task',
            '3' => 'Bug'
        ][$this->type];
    }

    public function getStartDateLabelAttribute()
    {
        return \Carbon\Carbon::parse($this->start_date)->format('d-m-Y');
    }

    public function getDueDateLabelAttribute()
    {
        return \Carbon\Carbon::parse($this->due_date)->format('d-m-Y');
    }

}
