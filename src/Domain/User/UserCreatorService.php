<?php

namespace School\Domain\User;

use School\Infrastructure\Domain\Service\Service;

class UserCreatorService extends Service
{
	use UserBase;

	public function create($content)
	{
		/*$validator = $this->validator->validate($content);

		if (!$validator->isValid()) {
			return $this->setResponse(['Error'], 400)->response();
		}*/

		return $this->insert($content);

	}

	private function insert($content)
	{
		$user = $this->createObject($content);
		//$this->repository->persist($user);

		$this->setResponse(['Error'], 500);

		if ($this->repository->edit($user)) {
			$this->setResponse(['Success'], 201);
		}

		return $this->response();
	}

	private function createObject($content)
	{
		$category = $this->categoryRepository
			->find($content['categoryId']);

		$user = new User();
		$user->setName($content['name'])
			->setPassword($content['password'])
			->setEmail($content['email'])
			->setCategoryId($category);

		return $user;
	}

	public function create1()
	{
		/*$category = new Category();
		$category->setName('Teste');
		$this->repository->persist($category);
		$this->repository->flush();

		$category = $this->repository->getRepository(Category::class)->find(2);*/

//		dump($category);

		$category = $this->categoryRepository
			->find(1);

		$user = new User();
		$user
			->setName('Erandir')
			->setEmail('teste@teste')
			->setPassword(11111)
			->setCategoryId($category);

		dump($user);


        $this->repository->persist($user);
        dump($this->repository->flush());

        //dump($this->repository->getRepository(User::class, 1)->findAll());
//        dump($this->repository->getRepository(User::class)->findAll());
//        dump($this->repository->getRepository(User::class, 1)->getAll('teste@teste'));
    }
}