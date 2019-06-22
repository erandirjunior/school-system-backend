<?php

namespace School\Domain\Category;

class Category
{
	private $id;

	private $name;

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
	public function setName($name): Category
	{
		$this->name = $name;

		return $this;
	}
}