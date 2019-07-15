<?php

namespace School\Domain\User;

use School\Domain\Category\Category;

/**
 * Class User
 * @package School\Domain\User\Entities
 */
class User
{
	/**
	 * @var
	 */
	private $id;

	/**
	 * @var
	 */
	private $name;

	/**
	 * @var
	 */
	private $email;

	/**
	 * @var
	 */
	private $password;

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
	 * @param $name
	 *
	 * @return User
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
	 * @param $email
	 *
	 * @return User
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
	 * @param $password
	 *
	 * @return User
	 */
	public function setPassword($password): User
	{
		$this->password = $password;

		return $this;
	}
}