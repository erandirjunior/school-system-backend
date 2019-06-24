<?php

declare(strict_types=1);

namespace School\Infrastructure\Migration;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;
use function Sodium\add;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190623141005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
    	$this->addSql('create table user
						(
							id          int auto_increment
								primary key,
							category_id int          null,
							name        varchar(255) null,
							password    varchar(255) null,
							email       varchar(255) null,
							constraint FK_8D93D64912469DE2
								foreign key (category_id) references category (id)
						)
							collate = utf8_unicode_ci;');

    	$this->addSql('create index user_category_id_fk on user (category_id);');

    }

    public function down(Schema $schema) : void
    {
        $this->addSql('drop table user');
    }
}
