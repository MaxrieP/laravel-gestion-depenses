<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieOperation extends Model
{
    use HasFactory;
    protected $fillable = ['nomCategorieOperation'];

    public function Operation()
    {
        return $this->belongsTo(Operation::class, 'idOperation');
    }
}
