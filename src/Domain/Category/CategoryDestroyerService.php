<?php

namespace School\Domain\Category;

use Doctrine\ORM\EntityManager;
use School\Infrastructure\Domain\Repository\CategoryRepository;
use School\Infrastructure\Domain\Service\Service;

class CategoryDestroyerService extends Service
{
	private $repository;

	private $validator;

	public function __construct(CategoryRepository $repository,
								CategoryValidator $categoryValidator)
	{
		$this->repository 	= $repository;
		$this->validator	= $categoryValidator;
	}

	public function create()
	{
		$category = new Category();
		$category->setName('Student');

		$this->repository->persist($category);
		$this->repository->flush();

		/*$this->repository->persist($category);
		$this->repository->flush();*/
	}

	public function update()
	{

    }

	public function delete($id)
	{

    }

	public function index()
	{

    }
}