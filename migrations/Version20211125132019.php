<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125132019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_message (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE edition (id INT AUTO_INCREMENT NOT NULL, manga_id INT DEFAULT NULL, editor_id INT NOT NULL, date DATE NOT NULL, INDEX IDX_A891181F7B6461 (manga_id), INDEX IDX_A891181F6995AC4C (editor_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE editor (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manga (id INT AUTO_INCREMENT NOT NULL, genre_id INT NOT NULL, classification_id INT NOT NULL, author_id INT NOT NULL, original_title VARCHAR(255) DEFAULT NULL, french_title VARCHAR(255) NOT NULL, summary LONGTEXT NOT NULL, anime TINYINT(1) NOT NULL, date DATE NOT NULL, INDEX IDX_765A9E034296D31F (genre_id), INDEX IDX_765A9E032A86559F (classification_id), INDEX IDX_765A9E03F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, category VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tomes (id INT AUTO_INCREMENT NOT NULL, manga_id INT NOT NULL, number VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, summary LONGTEXT NOT NULL, date DATE NOT NULL, rel_date DATE NOT NULL, INDEX IDX_38BCB1507B6461 (manga_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE edition ADD CONSTRAINT FK_A891181F7B6461 FOREIGN KEY (manga_id) REFERENCES manga (id)');
        $this->addSql('ALTER TABLE edition ADD CONSTRAINT FK_A891181F6995AC4C FOREIGN KEY (editor_id) REFERENCES editor (id)');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E034296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E032A86559F FOREIGN KEY (classification_id) REFERENCES classification (id)');
        $this->addSql('ALTER TABLE manga ADD CONSTRAINT FK_765A9E03F675F31B FOREIGN KEY (author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE tomes ADD CONSTRAINT FK_38BCB1507B6461 FOREIGN KEY (manga_id) REFERENCES manga (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E03F675F31B');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E032A86559F');
        $this->addSql('ALTER TABLE edition DROP FOREIGN KEY FK_A891181F6995AC4C');
        $this->addSql('ALTER TABLE manga DROP FOREIGN KEY FK_765A9E034296D31F');
        $this->addSql('ALTER TABLE edition DROP FOREIGN KEY FK_A891181F7B6461');
        $this->addSql('ALTER TABLE tomes DROP FOREIGN KEY FK_38BCB1507B6461');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE category_message');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE edition');
        $this->addSql('DROP TABLE editor');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE manga');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE tomes');
    }
}
