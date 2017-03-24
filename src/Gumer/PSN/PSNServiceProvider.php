<?php namespace Gumer\PSN;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class PSNServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bindShared('gumer.guzzle', function()
		{
			$client = new Client('', array('redirect.disable' => true));

			return $client;
		});
		$this->app->bindShared('gumer.psn', function()
		{
			$connection = new new Http\Connection;
			$connection->setGuzzle($this->app['guzzle']);
			
			return $connection;
		});

		$this->app->bindShared('gumer.psn.auth', function()
		{
			$provider = new Authentication\UserProvider($this->app['gumer.psn']);
			return Authentication\Manager::instance($provider);
		});
	}

}
