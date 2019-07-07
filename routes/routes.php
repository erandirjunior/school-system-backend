<?php

use \PlugRoute\PlugRoute;
use \PlugRoute\RouteContainer;
use \PlugRoute\Http\RequestCreator;

$route = new PlugRoute(new RouteContainer(), RequestCreator::create());

$route->get('/', function() {
	echo 'Home';
});

$route->group(['namespace' => 'School\Application\Controller'], function($route) {
	$route->group(['prefix' => '/users', 'namespace' => '\User'], function($route) {
		$route->get('/', '\UserShowerAction@show');

		$route->post('/', '\UserCreatorAction@createAction');

		$route->put('/{id:\d+}', '\UserUpdaterAction@updateAction');

		$route->delete('/{id:\d+}', '\UserDestroyerAction@deleteAction');

		$route->get('/{id:\d+}', '\UserShowerByAction@showById');
	});

	$route->group(['prefix' => '/categories'], function($route) {
		$route->get('/', '\CategoryController@create');

		$route->post('/', '\CategoryController@create');

		$route->put('/{id:\d+}', '\CategoryController@create');

		$route->delete('/{id:\d+}', '\CategoryController@create');

		$route->get('/{id:\d+}', '\CategoryController@showById');
	});
});

$route->on();