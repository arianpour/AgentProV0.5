<?php namespace App\Providers;

use App\Address;
use App\BankDetail;
use App\Client;
use App\Property;
use App\RentalAgreement;
use Hashids\Hashids;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

	/**
	 * This namespace is applied to the controller routes in your routes file.
	 *
	 * In addition, it is set as the URL generator's root namespace.
	 *
	 * @var string
	 */
	protected $namespace = 'App\Http\Controllers';

	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function boot(Router $router)
	{
		//
		
		parent::boot($router);
        $router->bind('client', function($value,$route)
        {
            $hashids = new Hashids('MySecretSalt*(&^%$eo&*^%&r',20);
            $id= $hashids->decode($value)[0];
            return Client::findOrFail($id);
        });
        $router->bind('bank', function($value,$route)
        {
            $hashids = new Hashids('MySecretSalt*(&^%$eo&*^%&r',20);
            $id= $hashids->decode($value)[0];
            return BankDetail::findOrFail($id);
        });

        $router->bind('address', function($value,$route)
        {
            $hashids = new Hashids('MySecretSalt*(&^%$eo&*^%&r',20);
            $id= $hashids->decode($value)[0];
            return Address::findOrFail($id);
        });
        $router->bind('property', function($value,$route)
        {
            $hashids = new Hashids('MySecretSalt*(&^%$eo&*^%&r',20);
            $id= $hashids->decode($value)[0];
            return Property::findOrFail($id);
        });
        $router->bind('agreement', function($value,$route)
        {
            $hashids = new Hashids('MySecretSalt*(&^%$eo&*^%&r',20);
            $id= $hashids->decode($value)[0];
            return RentalAgreement::findOrFail($id);
        });
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function map(Router $router)
	{
		$router->group(['namespace' => $this->namespace], function($router)
		{
			require app_path('Http/routes.php');
		});
	}

}
