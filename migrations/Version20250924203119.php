<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250924203119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("
            ALTER TABLE `user`
                ADD `created_at` DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
                ADD `last_login` DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
        ");
    
        $this->addSql("UPDATE `user` SET `created_at` = NOW() WHERE `created_at` IS NULL");
    
        $this->addSql("
            ALTER TABLE `user`
                MODIFY `created_at` DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)'
        ");
    
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64986CC499D ON `user` (`pseudo`)');
    }
    

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP created_at, DROP last_login');
    }
}
