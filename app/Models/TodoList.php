<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class TodoList extends Model
{
    use HasFactory;

    public const RULES = [
        'name' => ['alphanum', 'min:3', 'max:30'],
    ];

    protected $fillable = ['name'];

    public function items(): Relation
    {
        return $this->hasMany(TodoItem::class);
    }
}
