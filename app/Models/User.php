<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'ak',
        'status',
        'permission_lvl',
        'phone',
        'address',
        'email',
        'Hospital[]',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function Healths()
    {
        return $this -> hasMany('App\Models\Health','user_id', 'id');
    }
    public function improvement(){
        $patient = $this;
        if (count($patient->healths)>1) {
            $count = count($patient->healths);
            $current = $patient->healths[$count - 1];
            $previous = $patient->healths[$count - 2];
            $current = $current->taste+$current->smell+$current->energetic+$current->nose+$current->throught+$current->cough+$current->respiration+$current->pain+$current->temperature;
            $previous =$previous->taste+$previous->smell+$previous->energetic+$previous->nose+$previous->throught+$previous->cough+$previous->respiration+$previous->pain+$previous->temperature;
            $diff = $previous - $current;
            if ($diff>0) {
                echo "paciento bukle pagerejo $diff punktu";
            }
            if ($diff<0) {
                $diff=-$diff;
                echo "paciento bukle pablogejo $diff punktu";
            }
            if ($diff==0) {
                echo "paciento bukle nepakito";
            }
        }else echo "kol kas yra tik".count($patient->healths)."irasas";
                                                        
    }
    public function overalHealth() {
        
        if (count($this->healths)>0) {
            $count = count($this->healths);
            $current = $this->healths[$count - 1];
            $overal = $current->taste+$current->smell+$current->energetic+$current->nose+$current->throught+$current->cough+$current->respiration+$current->pain;

            $max = 82;
            $min = 44;
            $score = $overal + $current->temperature - $min;
            $score =  round($score*13.421);
            $color = "255, 0, 0";
            if($score<=255){
                $color = (255-$score).", 255 , 0";
            }
            if($score>255){
                $color = "255 , ". (510-$score) .", 0";
            };
            echo '<td style="background-color:rgb('.$color.');">bukle '. $overal.'/40, temperatura'. $current->temperature. '</td>';
        }else {
            echo '<td></td>';
        }
    }
}
