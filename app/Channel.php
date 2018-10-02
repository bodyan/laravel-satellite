<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'channels';    

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
     protected $fillable = ['id_sat', 'id_tp', 'name', 'sid', 'vpid', 'pcrpid', 'pmtpid', 'apid', 'hdsd', 'video_type'];

    /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $guarded = [];

    public function transponders()
    {
        return $this->belongsTo('App\Transponder');
    }

    public function satellites()
    {
        return $this->belongsTo('App\Satellite');
        //return $this->belongsTo('App\Transponder', 'App\Satellite');
    }  

    public function getSidAttribute($sid)
    {
        if ($sid <= 9) {
            return '000' . $sid;
        } elseif (strlen(dechex($sid)) == 1) {
            return '000' . strtoupper(dechex($sid));
        } elseif (strlen(dechex($sid)) == 2) {
            return '00' . strtoupper(dechex($sid));
        } elseif (strlen(dechex($sid)) == 3) {
            return '0' . strtoupper(dechex($sid));
        } else {
            return strtoupper(dechex($sid));
        }
    }      
}
