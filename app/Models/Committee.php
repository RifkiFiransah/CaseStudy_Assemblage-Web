<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Committee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function sections(): BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function tasks(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
