<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    protected $fillable = ['montantOperation', 'typeOperation'];

    public function CategorieOperations() {
        return $this->hasOne(CategorieOperation::class);
    }
}
