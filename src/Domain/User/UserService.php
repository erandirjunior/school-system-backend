<?php

namespace School\Domain\User;

use Doctrine\ORM\EntityManager;
use School\Domain\Category\Category;
use School\Infrastructure\Domain\Service\Service;

class UserService extends Service
{
	private $repository;

	private $validator;

	public function __construct(EntityManager $repository, UserValidator $userValidator)
	{
		$this->repository 	= $repository;
		$this->validator	= $userValidator;
	}

	public function show()
	{
		$users = $this->repository->getRepository(User::class)->findAll();
		dump($users);
	}

	public function create($content)
	{
		$category = $this->repository
			->getRepository(Category::class)
			->find($content['categoryId']);

		$user = new User();
		$user->setName($content['name'])
			->setPassword($content['password'])
			->setEmail($content['email'])
			->setCategoryId($category);

		$this->repository->persist($user);
		$this->repository->flush();

		return $this->setResponse([], 204)->response();
	}

	public function createExample()
	{
		/*$category = new Category();
		$category->setName('Teste');
		$this->repository->persist($category);
		$this->repository->flush();

		$category = $this->repository->getRepository(Category::class)->find(2);

		dump($category);

		$user = new User();*/
		//$category = new Category();
		//$category->setName('aaa');
		/*$user
			->setName('Erandir')
			->setEmail('teste@teste')
			->setPassword(11111)
			->setIdCategory($category);

		dump($user);*/


        /*$this->repository->persist($user);
        dump($this->repository->flush());*/

        //dump($this->repository->getRepository(User::class, 1)->findAll());
        dump($this->repository->getRepository(User::class)->findAll());
//        dump($this->repository->getRepository(User::class, 1)->getAll('teste@teste'));
    }

	public function update()
	{

    }

	public function delete($id)
	{

    }
}