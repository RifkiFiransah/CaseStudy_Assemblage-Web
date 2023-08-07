<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Committee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class, 'section_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'task_id');
    }
}
