<?php

declare(strict_types=1);

namespace School\Infrastructure\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190623142001 extends AbstractMigration
{
	public function up(Schema $schema) : void
	{
		$this->addSql('create table school.category
						(
							id         int auto_increment
								primary key,
							name       varchar(255)                       not null,
							created_at datetime default CURRENT_TIMESTAMP null,
							updated_at datetime                           null,
							deleted_at datetime                           null,
							constraint category_name_uindex
								unique (name)
						)
							collate = utf8_unicode_ci;
						');
	}

	public function down(Schema $schema) : void
	{
//		$this->addSql('ALTER TABLE category DROP INDEX category_name_uindex');
		$this->addSql('DROP INDEX name ON category');
		$this->addSql('DROP INDEX id ON category');
		$this->addSql('drop table category');
	}
}
