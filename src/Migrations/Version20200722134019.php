<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200722134019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application CHANGE candidate_id candidate_id INT DEFAULT NULL, CHANGE job_offer_id job_offer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidate CHANGE job_category job_category INT DEFAULT NULL, CHANGE passport_file passport_file VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE client CHANGE job_category job_category INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_offer CHANGE client client INT DEFAULT NULL, CHANGE job_category job_category INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE active active TINYINT(1) DEFAULT NULL, CHANGE notes notes VARCHAR(255) DEFAULT NULL, CHANGE job_title job_title VARCHAR(255) DEFAULT NULL, CHANGE contract_type contract_type VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE file CHANGE candidate_id candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_category CHANGE data_group data_group VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B27CF2F3');
        $this->addSql('DROP INDEX UNIQ_8D93D649B27CF2F3 ON user');
        $this->addSql('ALTER TABLE user ADD candidate INT DEFAULT NULL, DROP id_candidate_id, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649C8B28E44 FOREIGN KEY (candidate) REFERENCES candidate (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649B27CF2F3 ON user (candidate)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE application CHANGE candidate_id candidate_id INT DEFAULT NULL, CHANGE job_offer_id job_offer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidate CHANGE job_category job_category INT DEFAULT NULL, CHANGE passport_file passport_file VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE client CHANGE job_category job_category INT DEFAULT NULL');
        $this->addSql('ALTER TABLE file CHANGE candidate_id candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_category CHANGE data_group data_group VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE job_offer CHANGE job_category job_category INT DEFAULT NULL, CHANGE client client INT DEFAULT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE active active TINYINT(1) DEFAULT \'NULL\', CHANGE notes notes VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE job_title job_title VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE contract_type contract_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649C8B28E44');
        $this->addSql('DROP INDEX UNIQ_8D93D649B27CF2F3 ON user');
        $this->addSql('ALTER TABLE user ADD id_candidate_id INT DEFAULT NULL, DROP candidate, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B27CF2F3 FOREIGN KEY (id_candidate_id) REFERENCES candidate (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649B27CF2F3 ON user (id_candidate_id)');
    }
}
