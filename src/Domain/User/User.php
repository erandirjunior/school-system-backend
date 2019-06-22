<?php

namespace School\Domain\User\Entities;

class User
{
	private $id;

	private $name;

	private $email;

	private $password;

	private $categoryId;
	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name): User
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email): User
	{
		$this->email = $email;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 */
	public function setPassword($password): User
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCategoryId()
	{
		return $this->categoryId;
	}

	/**
	 * @param mixed $categoryId
	 */
	public function setCategoryId($categoryId): void
	{
		$this->categoryId = $categoryId;
	}
}