<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Division;
use App\Models\HealthCenter;
class Subdivision extends Model
{
    use HasFactory;

    protected $fillable=['name','division_id','id'];


   
   
       /**
         * Get the division that owns the Subdivision
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function division(): BelongsTo
        {
            return $this->belongsTo(Division::class);
        }
  

        public function healthCenters()
    {
        return $this->hasMany(HealthCenter::class);
    }

}
