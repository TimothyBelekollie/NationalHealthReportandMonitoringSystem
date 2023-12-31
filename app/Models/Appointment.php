<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable=['name','email','phone','message','health_center_id','user_id','status','confirm_date','specialization'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
