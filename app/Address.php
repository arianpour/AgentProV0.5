<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['unit', 'street', 'postCode','city','state','country'];


    /**
     * Get all of the owning addressable models.
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    public function getUnitStreetAttribute(){
        return $this->attributes['unit'].', '.$this->attributes['street'];

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
