<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Patient;
use App\Models\Encounter;
use App\Models\BirthEvent;

class HealthCenter extends Model
{
    use HasFactory;

    protected $fillable=["name","description","subdivision_id","health_center_type_id"];


    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class,'health_center_id','id');
    }
    
    public function birthEvents(): HasMany
    {
        return $this->hasMany(BirthEvent::class);
    }
   
    public function deathEvents(): HasMany
    {
        return $this->hasMany(DeathEvent::class);
    }


    public function encounters(): HasMany
    {
        return $this->hasMany(Encounter::class);
    }

    public function subdivision()
    {
        return $this->belongsTo(Subdivision::class);
    }
}
