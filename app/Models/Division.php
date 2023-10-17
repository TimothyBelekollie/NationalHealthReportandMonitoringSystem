<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Subdivision;

class Division extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function subdivision(): HasMany
    {
        return $this->hasMany(Subdivision::class);
    }

    public function subdivisions()
    {
        return $this->hasMany(Subdivision::class);
    }

}
