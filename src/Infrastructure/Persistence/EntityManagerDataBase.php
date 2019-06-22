<?php

namespace School\Infrastructure\Persistence;

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use DoctrineExtensions\Query\Mysql\ConcatWs;
use DoctrineExtensions\Query\Mysql\DateAdd;
use DoctrineExtensions\Query\Mysql\DateFormat;
use DoctrineExtensions\Query\Mysql\IfElse;
use DoctrineExtensions\Query\Mysql\Replace;
use DoctrineExtensions\Query\Mysql\Rpad;
use \Doctrine\ORM\Mapping\Driver\XmlDriver;

/**
 * Class EntityManager
 * @package School\Infrastructure\Persistence
 */
class EntityManager
{
    /**
     * @var Setup
     */
    private $config;

    /**
     * @var EntityManager
     */
    private $connection;

    /**
     * EntityManager constructor.
     */
    public function __construct()
	{
		$this->connect();
	}

    /**
     * @return EntityManager
     */
    public function getConnection(): EntityManager
	{
		return $this->connection;
	}

    /**
     * Inicialize database connection
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    private function connect(): void
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

		$this->createConfiguration($cache, $path);
		$this->setSqlFunctions();

		$this->connection = EntityManager::create($dbParamss, $this->config);

		$platform = $this->connection->getConnection()->getDatabasePlatform();
		$platform->registerDoctrineTypeMapping('enum', 'string');
	}

    /**
     * Get cache.
     *
     * @return ArrayCache
     */
    private function getArrayCache(): ArrayCache
    {
        return new ArrayCache();
    }

    /**
     * Create configuration of cache, proxy and metadata driver.
     *
     * @param $cache
     * @param $path
     */
    private function createConfiguration($cache, $path): void
    {
        $this->config =  Setup::createConfiguration();
        $this->config->setMetadataCacheImpl($cache);
        $this->config->setQueryCacheImpl($cache);
        $this->config->setProxyDir($path.'Proxies/');
        $this->config->setProxyNamespace('School\Proxies');
        $this->config->setMetadataDriverImpl($this->getDriver($path));
        $this->config->setAutoGenerateProxyClasses(true);
    }

    /**
     * @param $path string
     * @return XmlDriver
     */
    private function getDriver($path): XmlDriver
    {
        return new XmlDriver($path);
    }

    /**
     * Add sql functions to work on dql mode.
     */
    private function setSqlFunctions(): void
	{
		$this->config->addCustomDatetimeFunction('DATE_FORMAT', DateFormat::class);
		$this->config->addCustomStringFunction('IF', IfElse::class);
		$this->config->addCustomStringFunction('REPLACE', Replace::class);
		$this->config->addCustomStringFunction('RPAD', Rpad::class);
		$this->config->addCustomStringFunction('CONCAT_WS', ConcatWs::class);
		$this->config->addCustomStringFunction('DATEADD', DateAdd::class);
	}
}