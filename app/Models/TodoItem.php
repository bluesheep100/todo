<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class TodoItem extends Model
{
    use HasFactory;

    public const RULES = [
        'content' => ['nullable', 'min:3', 'max:30'],
        'completed' => ['nullable', 'boolean'],
    ];

    protected $fillable = ['todo_list_id', 'content', 'completed'];

    public function list(): Relation
    {
        return $this->belongsTo(TodoList::class);
    }
}
