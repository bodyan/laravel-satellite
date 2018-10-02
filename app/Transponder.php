<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transponder extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'transponders';    

   /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
     protected $fillable = ['id_sat', 'tp_system', 'modulation', 'frequency', 'symbrate', 'polarization', 'fec'];

    /**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
    protected $guarded = [];

    public function satellites()
    {
        return $this->belongsTo('App\Satellite');
    }   

    public function channels()
    {
        return $this->hasMany('App\Channel')->where('enabled', 1)->orderBy('sid');
    }  
}
