<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users(): Relation
    {
        return $this->belongsToMany(User::class);
    }
}
