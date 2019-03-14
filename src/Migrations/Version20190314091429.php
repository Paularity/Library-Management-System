<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190314091429 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE opac CHANGE student_id student_id INT DEFAULT NULL, CHANGE faculty_id faculty_id INT DEFAULT NULL, CHANGE staff_id staff_id INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B723AF3313070055 ON student (student_no)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE book CHANGE image image VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE opac CHANGE student_id student_id INT DEFAULT NULL, CHANGE faculty_id faculty_id INT DEFAULT NULL, CHANGE staff_id staff_id INT DEFAULT NULL');
        $this->addSql('DROP INDEX UNIQ_B723AF3313070055 ON student');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin');
    }
}
