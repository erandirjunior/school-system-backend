<?php

namespace School\Domain\User;

trait UserCheckEmailDuplicate
{
	private function checkIfEmailExists($email)
	{
		$email = $this->repository->findBy(compact('email'));

		return $email ? true : false;
	}
}