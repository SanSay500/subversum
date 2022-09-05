<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'hydro_count',
        'terra_count',
        'air_count',
        'dollars_count',
        'crystals',
        'energy',
        'critical_step_chance',
        'critical_step_force',
        'dollars_per_step',
        'max_dollars',
    ];

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
        "email_verified_at",
        "created_at",
        "updated_at",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }

    public function auctionStoreCalculations(User $user, $resource_name){
//        $user->update([
//            $resource_name.'_count'=>
//        ]);
    }

}
