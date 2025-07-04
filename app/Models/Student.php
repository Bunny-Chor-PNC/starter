<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'age', 'province', 'class', 'grade', 'teacher_id'];
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    protected $appends = ['full_name'];
    public function getFullNameAttribute() {
        return "{$this->first_name} {$this->last_name}";
    }
}
