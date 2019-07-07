<?php

namespace School\Application\Controller\User;

use PlugRoute\Http\Request;
use School\Infrastructure\Controller\Controller;
use School\Infrastructure\Provider\User\UserShowerProvider;

class UserShowerAction extends Controller
{
	protected $service;

	protected $request;

	public function __construct(Request $request,
								UserShowerProvider $userShowerProvider)
	{
		$this->service = $userShowerProvider->getInstance();
		$this->request = $request;
	}

	public function showAction()
	{

	}
}