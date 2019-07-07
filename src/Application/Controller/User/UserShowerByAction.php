<?php

namespace School\Application\Controller\User;

use PlugRoute\Http\Request;
use School\Infrastructure\Controller\Controller;
use School\Infrastructure\Provider\User\UserShowerByProvider;

class UserShowerByAction extends Controller
{
	protected $service;

	protected $request;

	public function __construct(Request $request,
								UserShowerByProvider $userShowerByProvider)
	{
		$this->service = $userShowerByProvider->getInstance();
		$this->request = $request;
	}

	public function createAction()
	{
		$content 	= $this->request->all();
		$response 	= $this->service->create($content);

		echo $this->json($response);
	}
}