<?php

require_once 'config/load.php';

$entityManager = new \School\Infrastructure\Persistence\EntityDataBase();

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager->getConnection());