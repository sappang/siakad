<?php

namespace App\Models;

use App\Models\Fee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeeGroup extends Model
{
    use HasFactory;

    protected $fillable = ['group', 'amount'];

    public function fees(): HasMany
    {
        return $this->hasMany(Fee::class);
    }
}
