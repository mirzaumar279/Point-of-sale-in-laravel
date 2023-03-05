<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    // public $timestamps=false;
    use HasFactory;

    public function history()
    {
        return $this->hasMany(history::class, 'transaction_id');
    }
}
