<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table="tasks";

    public function inspection_items()
    {
        return $this->hasMany(InspectionItem::class, 'task_id','id');
    }
}
