<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone',
    ];

    public function notes()
    {
        return $this->belongsToMany(Note::class, 'employee_has_notes');
    }

    protected $appends = ['full_name'];


    public function getFullNameAttribute()
    {
        return ucwords("{$this->first_name} {$this->last_name}");
    }
}
