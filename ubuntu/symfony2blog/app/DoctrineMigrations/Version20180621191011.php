<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180621191011 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A6479A76ED395');
        $this->addSql('DROP INDEX UNIQ_957A6479A76ED395 ON fos_user');
        $this->addSql('ALTER TABLE fos_user CHANGE user_id author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A6479F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479F675F31B ON fos_user (author_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE fos_user DROP FOREIGN KEY FK_957A6479F675F31B');
        $this->addSql('DROP INDEX UNIQ_957A6479F675F31B ON fos_user');
        $this->addSql('ALTER TABLE fos_user CHANGE author_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user ADD CONSTRAINT FK_957A6479A76ED395 FOREIGN KEY (user_id) REFERENCES author (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_957A6479A76ED395 ON fos_user (user_id)');
    }
}
