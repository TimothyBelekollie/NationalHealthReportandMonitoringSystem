<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class BirthEvent extends Model
{
    use HasFactory;

    protected $fillable=['event_date','baby_gender','baby_type','health_center_id','patient_id'];
    // protected $casts = [
    //     'event_date' => 'timestamps',
       
    // ];

    public function patient(): BelongsTo
    { 
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
    
    public function healthCenter(): BelongsTo
    { 
        return $this->belongsTo(HealthCenter::class,'health_center_id','id');
    }



}
