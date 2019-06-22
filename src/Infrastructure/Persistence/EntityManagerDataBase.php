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
 * Class EntityManagerDataBase
 * @package School\Infrastructure\Persistence
 */
class EntityManagerDataBase
{
    /**
     * @var Setup
     */
    private $config;

    /**
     * @var EntityManagerDataBase
     */
    private $connection;

    /**
     * EntityManagerDataBase constructor.
     */
    public function __construct()
	{
		$this->connect();
	}

    /**
     * @return EntityManagerDataBase
     */
    public function getConnection(): EntityManager
	{
		return $this->connection;
	}

    /**
     * Inicialize database connection.
     *
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\ORM\ORMException
     */
    private function connect(): void
	{
		AnnotationRegistry::registerLoader('class_exists');

		$cache 		= $this->getArrayCache();
		$dbConfig 	= $this->getDataBaseCredentials();

		$this->createConfiguration($cache);
		$this->setSqlFunctions();

		$this->connection = EntityManager::create($dbConfig, $this->config);

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
    private function createConfiguration($cache): void
    {
        $this->config =  Setup::createConfiguration();
        $this->config->setMetadataCacheImpl($cache);
        $this->config->setQueryCacheImpl($cache);
        $this->config->setProxyDir($this->getPathProxy());
        $this->config->setProxyNamespace('School\Proxies');
        $this->config->setMetadataDriverImpl($this->getDriver());
        $this->config->setAutoGenerateProxyClasses(true);
    }

	private function getPathMapping()
	{
		return __DIR__.'/../Mapping/';
    }

	private function getPathProxy()
	{
		return __DIR__.'/../Proxy/';
    }

    /**
	 * Create XmlDriver.
	 *
     * @param $path string
     * @return XmlDriver
     */
    private function getDriver(): XmlDriver
    {
        return new XmlDriver($this->getPathMapping());
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

	/**
	 * Return database credentials.
	 *
	 * @return array
	 */
	private function getDataBaseCredentials(): array
	{
		return [
			'driver' => 'pdo_mysql',//$_ENV['DB_DRIVE'],
			'user' => 'root',//$_ENV['DB_USER'],
			'password' => 'root',//$_ENV['DB_PASS'],
			'host' => 'localhost',//$_ENV['DB_HOST'],
			'dbname' => 'school',//$_ENV['DB_BASE'],
			'charset' => 'utf8', 'driverOptions' => array(
				1002 => 'SET NAMES utf8'
			)
		];
	}
}