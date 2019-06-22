<?php

use \PlugRoute\PlugRoute;
use \PlugRoute\RouteContainer;
use \PlugRoute\Http\RequestCreator;

$route = new PlugRoute(new RouteContainer(), RequestCreator::create());

$route->get('/', function() {
	echo 'Home';
});

$route->group(['namespace' => 'School\Application\Controller'], function($route) {
	$route->group(['prefix' => '/users'], function($route) {
		$route->get('/', '\UserController@show');

		$route->post('/', '\UserController@create');

		$route->put('/{id:\d+}', '\UserController@update');

		$route->delete('/{id:\d+}', '\UserController@delete');

		$route->get('/{id:\d+}', '\UserController@showById');
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