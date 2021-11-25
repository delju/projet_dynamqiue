<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211125131623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_message (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE edition CHANGE manga_id manga_id INT DEFAULT NULL, CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE manga CHANGE author_id author_id INT NOT NULL, CHANGE genre_id genre_id INT NOT NULL, CHANGE classification_id classification_id INT NOT NULL, CHANGE original_title original_title VARCHAR(255) DEFAULT NULL, CHANGE date date DATE NOT NULL, CHANGE anime_adapted anime TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE message ADD category VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE tomes ADD rel_date DATE NOT NULL, DROP release_date, CHANGE number number VARCHAR(255) NOT NULL, CHANGE date date DATE NOT NULL, CHANGE name title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE category_message');
        $this->addSql('ALTER TABLE edition CHANGE manga_id manga_id INT NOT NULL, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE manga CHANGE genre_id genre_id INT DEFAULT NULL, CHANGE classification_id classification_id INT DEFAULT NULL, CHANGE author_id author_id INT DEFAULT NULL, CHANGE original_title original_title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date date DATETIME NOT NULL, CHANGE anime anime_adapted TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE message DROP category');
        $this->addSql('ALTER TABLE tomes ADD release_date DATETIME DEFAULT NULL, DROP rel_date, CHANGE number number INT NOT NULL, CHANGE date date DATETIME NOT NULL, CHANGE title name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
