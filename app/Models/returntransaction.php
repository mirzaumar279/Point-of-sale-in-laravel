<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class returntransaction extends Model
{
    use HasFactory;
    public function returnhistory()
    {
        return $this->hasMany(returnhistory::class, 'returntransaction_id');
    }
}
