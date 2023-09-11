<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;
use App\Models\HealthCenter;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','address','title','division_id','subdivision_id','image','health_center_id'
    ];




    public function hasAnyRole($roles)
    {
        $userRole = $this->role; // Assuming "role" is the name of the relationship
    
        if (is_array($roles)) {
            return $userRole->whereIn('name', $roles)->count() > 0;
        }
        return $userRole->name === $roles;
    }
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // Adjust column name as needed
    }
    
    public function healthCenter()
    {
        return $this->belongsTo(HealthCenter::class, 'health_center_id'); // Adjust column name as needed
    }
    
    
    
    
    
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}
