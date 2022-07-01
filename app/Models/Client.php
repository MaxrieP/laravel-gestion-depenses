<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nomClient'];

    public function Operation()
    {
        return $this->belongsTo(Operation::class);
    }
}
