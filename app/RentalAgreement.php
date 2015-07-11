<?php namespace App;

use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class RentalAgreement extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['client_id','owner_id','property_id', 'user_id','dateOfAgreement','commencingDate','expireDate'
        ,'rentalAmount','rentalDeposit','utilitiesDeposit'
        ,'otherDeposit','premiseUse'];

    public function setexpireDatecommencingDateAttribute($date){
        $this->attributes['expireDate']=Carbon::parse($date);
    }
    public function setdateOfAgreementAttribute($date){
        $this->attributes['dateOfAgreement']=Carbon::parse($date);
    }
    public function setcommencingDateAttribute($date){
        $this->attributes['commencingDate']=Carbon::parse($date);
    }
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

    /**
     * Get the value of the model's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        $hashids = new Hashids('MySecretSalt*(&^%$eo&*^%&r',20);
        return $hashids->encode($this->getKey());
    }

}
