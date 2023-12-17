<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HealthCenter;
use App\Models\Address;
use App\Models\DeathEvent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Patient extends Model
{
    use HasFactory;
    protected $fillable=["name","nationality","contact","emmergency_contact","email","gender","dob","health_center_id","unique_patient_identifier"];

/**
         * Get the healthCenter that owns the Patient
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function healthCenter(): BelongsTo
        { 
            return $this->belongsTo(HealthCenter::class, 'health_center_id', 'id');
        }

        public function address()
    {
        return $this->hasOne(Address::class);
    }
    
    public function encounters(): HasMany
    {
        return $this->hasMany(Encounter::class);
    }

  
    public function birthEvents(): HasMany
    {
        return $this->hasMany(BirthEvent::class);
    }

    public function deathEvent()
    {
        return $this->hasOne(DeathEvent::class);
    }
}
