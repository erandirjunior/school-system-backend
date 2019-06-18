<?php

namespace School\Infrastructure\Persistence;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;
use DoctrineExtensions\Query\Mysql\ConcatWs;
use DoctrineExtensions\Query\Mysql\DateAdd;
use DoctrineExtensions\Query\Mysql\DateFormat;
use DoctrineExtensions\Query\Mysql\IfElse;
use DoctrineExtensions\Query\Mysql\Replace;
use DoctrineExtensions\Query\Mysql\Rpad;

class EntityDataBase
{
	private $config;

	private $connection;

	public function __construct()
	{
		$this->connect();
	}

	public function getConnection()
	{
		return $this->connection;
	}

	private function getArrayCache()
	{
		return new ArrayCache();
	}

	public function connect()
	{
		$path = __DIR__.'/../Entities/';

		AnnotationRegistry::registerLoader('class_exists');

		$cache = $this->getArrayCache();

		$dbParamss = [
			'driver'   => 'pdo_mysql',//$_ENV['DB_DRIVE'],
			'user'     => 'root',//$_ENV['DB_USER'],
			'password' => 'root',//$_ENV['DB_PASS'],
			'host'     => 'localhost',//$_ENV['DB_HOST'],
			'dbname'   => 'school',//$_ENV['DB_BASE'],
			'charset'  => 'utf8',
			'driverOptions' => array(
				1002 => 'SET NAMES utf8'
			)
		];

		//$driver = new AnnotationDriver(new AnnotationReader(), $path);

		$this->createConfiguration('', $cache, $path);
		$this->setSqlFunctions();

		$this->connection = EntityManager::create($dbParamss, $this->config);

		$platform = $this->connection->getConnection()->getDatabasePlatform();
		$platform->registerDoctrineTypeMapping('enum', 'string');
	}

	private function setSqlFunctions()
	{
		$this->config->addCustomDatetimeFunction('DATE_FORMAT', DateFormat::class);
		$this->config->addCustomStringFunction('IF', IfElse::class);
		$this->config->addCustomStringFunction('REPLACE', Replace::class);
		$this->config->addCustomStringFunction('RPAD', Rpad::class);
		$this->config->addCustomStringFunction('CONCAT_WS', ConcatWs::class);
		$this->config->addCustomStringFunction('DATEADD', DateAdd::class);

	}

	private function createConfiguration($driver, $cache, $path){

		$this->config =  Setup::createConfiguration();
		$this->config->setMetadataCacheImpl($cache);
		$this->config->setQueryCacheImpl($cache);
		$this->config->setProxyDir($path.'Proxies/');
		$this->config->setProxyNamespace('Plenus\Proxies');
		//$driver = new \Doctrine\ORM\Mapping\Driver\XmlDriver(array($path));
		$driver = new \Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver([$path => '\School\Domain\User\Entities\User.php']);
		$this->config->setsetMetadataDriverImpl($driver);

		$this->config->setAutoGenerateProxyClasses(true);

		//$this->config = Setup::createXMLMetadataConfiguration([$path], false, null, $cache);
	}
}