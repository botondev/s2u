<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180527120915 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id VARCHAR(255) NOT NULL, first_comment_id VARCHAR(255) DEFAULT NULL, INDEX IDX_8D93D64969F11C14 (first_comment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_favorite_comments (user_id VARCHAR(255) NOT NULL, comment_id VARCHAR(255) NOT NULL, INDEX IDX_DD635F0A76ED395 (user_id), INDEX IDX_DD635F0F8697D13 (comment_id), PRIMARY KEY(user_id, comment_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_read_comments (user_id VARCHAR(255) NOT NULL, comment_id VARCHAR(255) NOT NULL, INDEX IDX_55A21313A76ED395 (user_id), INDEX IDX_55A21313F8697D13 (comment_id), PRIMARY KEY(user_id, comment_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id VARCHAR(255) NOT NULL, author_id VARCHAR(255) DEFAULT NULL, INDEX IDX_9474526CF675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64969F11C14 FOREIGN KEY (first_comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE user_favorite_comments ADD CONSTRAINT FK_DD635F0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_favorite_comments ADD CONSTRAINT FK_DD635F0F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_read_comments ADD CONSTRAINT FK_55A21313A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_read_comments ADD CONSTRAINT FK_55A21313F8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_favorite_comments DROP FOREIGN KEY FK_DD635F0A76ED395');
        $this->addSql('ALTER TABLE user_read_comments DROP FOREIGN KEY FK_55A21313A76ED395');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF675F31B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64969F11C14');
        $this->addSql('ALTER TABLE user_favorite_comments DROP FOREIGN KEY FK_DD635F0F8697D13');
        $this->addSql('ALTER TABLE user_read_comments DROP FOREIGN KEY FK_55A21313F8697D13');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_favorite_comments');
        $this->addSql('DROP TABLE user_read_comments');
        $this->addSql('DROP TABLE comment');
    }
}
