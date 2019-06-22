<?php

namespace School\Infrastructure\Controller;

trait Response
{
	/**
	 * @var \PlugHttp\Response
	 */

	private static $response;
	/**
	 * @var int
	 */
	private $statusCode = 200;

	public function json(array $data)
	{
		$this->inicialize();

		return self::$response
			->setStatusCode($this->statusCode)
			->json($data);
	}

	public function setStatusCode(int $statusCode)
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	private function inicialize()
	{
		if (!self::$response) {
			self::$response = new \PlugHttp\Response();
		}
	}
}