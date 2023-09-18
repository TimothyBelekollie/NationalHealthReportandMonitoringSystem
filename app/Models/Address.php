<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Patient;

class Address extends Model
{
    use HasFactory;
    protected $fillable=["community","subdivision_id","city","patient_id"];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
