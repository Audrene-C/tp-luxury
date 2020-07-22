<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200720093222 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE client CHANGE job_category_id job_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE id_candidate_id id_candidate_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE file CHANGE candidate_id candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidate ADD passport_file VARCHAR(255) DEFAULT NULL, CHANGE job_category_id job_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_offer CHANGE client_id_id client_id_id INT DEFAULT NULL, CHANGE job_category_id job_category_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidate DROP passport_file, CHANGE job_category_id job_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client CHANGE job_category_id job_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE file CHANGE candidate_id candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_offer CHANGE job_category_id job_category_id INT DEFAULT NULL, CHANGE client_id_id client_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE id_candidate_id id_candidate_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
