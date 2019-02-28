<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190228050354 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(30) NOT NULL, first_name VARCHAR(30) NOT NULL, middle_name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faculty (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(30) NOT NULL, first_name VARCHAR(30) NOT NULL, middle_name VARCHAR(30) NOT NULL, contact_no VARCHAR(30) NOT NULL, email_address VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE publisher (id INT AUTO_INCREMENT NOT NULL, publisher_name VARCHAR(60) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(30) NOT NULL, first_name VARCHAR(30) NOT NULL, middle_name VARCHAR(30) NOT NULL, contact_no VARCHAR(30) NOT NULL, email_address VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE student (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(30) NOT NULL, first_name VARCHAR(30) NOT NULL, middle_name VARCHAR(30) NOT NULL, educational_level VARCHAR(30) NOT NULL, course VARCHAR(30) NOT NULL, year_section VARCHAR(30) NOT NULL, contact_no VARCHAR(30) NOT NULL, email_address VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE faculty');
        $this->addSql('DROP TABLE publisher');
        $this->addSql('DROP TABLE staff');
        $this->addSql('DROP TABLE student');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
