<?php

namespace School\Infrastructure\Domain\Service;

trait ResponseService
{
	private $message;

	private $statusCode;

	public function setResponse(array $message = [], int $code = 200)
	{
		$this->message 		= $message;
		$this->statusCode 	= $code;

		return $this;
	}

	public function response()
	{
		return [
			'response' 	=> $this->message,
			'code' 		=> $this->statusCode
		];
	}
}