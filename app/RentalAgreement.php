<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class RentalAgreement extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['dateOfAgreement','commencingDate','expireDate'
        ,'rentalAmount','rentalDeposit','utilitiesDeposit'
        ,'otherDeposit','premiseUse'];

    /**
     * Get the user that owns the RentalAgreement.
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function client(){
        return $this->belongsTo('App\Client');
    }
    public function property(){
        return $this->belongsTo('App\Property');
    }


}
