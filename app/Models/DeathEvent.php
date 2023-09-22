<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Patient;
use App\Models\HealthCenter;

class DeathEvent extends Model
{
    use HasFactory;

protected $fillable=['event_date','health_center_id','patient_id'];

    public function patient(): BelongsTo
    { 
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    
    public function healthCenter(): BelongsTo
    { 
        return $this->belongsTo(HealthCenter::class,'health_center_id','id');
    }
}
