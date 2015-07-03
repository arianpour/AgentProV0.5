<?php namespace App;

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

}
