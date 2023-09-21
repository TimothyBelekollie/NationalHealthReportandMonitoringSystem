<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Encounter;

class EncounterDiagnosis extends Model
{
    use HasFactory;
    protected $fillable=['diagnosisCode','testConducted','diagnosisDescription','encounter_id','doctor_prescription','user_id'];
    protected $casts = [
        'testConducted' => 'array',
        'diagnosisDescription' => 'array',
    ];
    
    public function encounter()
    {
        return $this->belongsTo(Encounter::class);
    }

}
