<?php namespace App;


use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;


class Client extends Model {

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
    protected $fillable = ['name','email','phoneNo',
        'idNumber','nationality','role','user_id'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function property(){
        return $this->hasMany('App\Property');
    }
    public function addresses(){
        return $this->morphOne('App\Address','addressable');
    }
    public function bankDetails(){
        return $this->hasMany('App\BankDetail');
    }
    public function renalAgreement(){
        return $this->hasMany('App\RentalAgreement');
    }

}
