<?php

namespace School\Application\Controller;

use PlugRoute\Http\Request;
use School\Infrastructure\Controller\Controller;
use School\Infrastructure\Provider\CategoryServiceProvider;

class CategoryController extends Controller
{
	/**
	 * @var \School\Domain\User\CategoryService
	 */
	private $service;

	private $request;

	public function __construct(Request $request,
								CategoryServiceProvider $userServiceProvider)
	{
		$this->service = $userServiceProvider->create();
		$this->request = $request;
	}

	public function show()
	{
		/*$a = new UserRepository((new EntityManagerDataBase())->getConnection(), new ClassMetadata(TbTeste::class));
		dump($a->findAll());*/
	}

	public function create()
	{
		$content 	= 'teste';//$this->request->all();
		$response 	= $this->service->create($content);

		//echo $this->setStatusCode($response['code'])->json($response['message']);
	}

	public function update()
	{

	}

	public function delete()
	{

	}

	public function showById()
	{

	}
}