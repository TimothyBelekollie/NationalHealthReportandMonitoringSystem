<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCenterSpecialization extends Model
{
    use HasFactory;
    protected $fillable=['name','health_center_id'];
}
