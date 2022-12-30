<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspectionItem extends Model
{
    use HasFactory;

    protected $table="inspection_items";

    public function tasks()
    {
        return $this->belongsTo(Task::class);
    }
}
