<?php

namespace School\Application\Controller\User;

use PlugRoute\Http\Request;
use School\Infrastructure\Controller\Controller;
use School\Infrastructure\Provider\User\UserUpdaterProvider;

class UserUpdaterAction extends Controller
{
	protected $service;

	protected $request;

	public function __construct(Request $request,
								UserUpdaterProvider $userUpdaterProvider)
	{
		$this->service = $userUpdaterProvider->getInstance();
		$this->request = $request;
	}

	public function updateAction()
	{

	}
}