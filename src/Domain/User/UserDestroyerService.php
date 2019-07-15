<?php

namespace School\Domain\User;

use School\Infrastructure\Service\Service;

class UserDestroyerService extends Service
{
	use UserBase;

	public function delete($id)
	{
		$user = $this->repository->find($id);

		$user->setDeletedAt(new \DateTime());

		$this->setResponse(["Error: registry wasn't delete!"], 500);

		if ($this->repository->edit($user)) {
			$this->setResponse(["Registry deleted with success!"], 204);
		}

		return $this->response();
    }
}