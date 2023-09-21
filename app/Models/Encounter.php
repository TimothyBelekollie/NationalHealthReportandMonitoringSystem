<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\EncounterDiagnosis;
class Encounter extends Model
{
    use HasFactory;
    protected $fillable=['encounterDate','health_center_id','patient_id'];
    
    
    public function healthCenter(): BelongsTo
    { 
        return $this->belongsTo(HealthCenter::class, 'health_center_id', 'id');
    }
    public function patient(): BelongsTo
    { 
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function encounterDiagnosis()
    {
        return $this->hasOne(EncounterDiagnosis::class);
    }
}
