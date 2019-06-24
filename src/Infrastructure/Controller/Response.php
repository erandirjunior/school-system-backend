<?php

namespace School\Infrastructure\Controller;

trait Response
{
	/**
	 * @var \PlugHttp\Response
	 */

	private static $response;

	public function json(array $data)
	{
		$this->inicialize();

		//dump('aqui');

		return self::$response
			->setStatusCode($data['code'])
			->response()
			->json($data['response']);
	}

	private function inicialize()
	{
		if (!self::$response) {
			self::$response = new \PlugHttp\Response();
		}
	}
}