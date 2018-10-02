<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satellite extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'satellites';    

   /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
     protected $fillable = ['name', 'longitude'];

    /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $guarded = [];

    public function channels()
    {
        return $this->hasMany('App\Channel')->where('enabled', 1)->orderBy('sid');
    }

    public function approvedChannels() {
        return $this->hasMany('App\Channel')->where('enabled', 1)->orderBy('sid');
    }  

    public function transponders()
    {
        return $this->hasMany('App\Transponder');
    }  

    public function getLongitudeAttribute($longtitude)
    {
        if($longtitude < 0)
            return substr_replace((int) abs($longtitude), '.', -1, 0) . ' °W';
        elseif($longtitude >= 0 and $longtitude < 1200)
            return substr_replace($longtitude, '.', -1, 0) . ' °E';
        elseif($longtitude >= 3000 and $longtitude < 3600) {
            $longtitude = 3600 - $longtitude;
            return substr_replace($longtitude, '.', -1, 0) . ' °W';
        } else
            return '<p>Невірна довгота</p>';
    }
}
