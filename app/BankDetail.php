<?php namespace App;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['bankName','accountNo','client_id'];

    public function client(){
        return $this->belongsTo('App\Client');
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
