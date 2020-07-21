<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200721143903 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, candidate_id INT DEFAULT NULL, job_offer_id INT DEFAULT NULL, INDEX IDX_A45BDDC191BD8781 (candidate_id), INDEX IDX_A45BDDC13481D195 (job_offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC191BD8781 FOREIGN KEY (candidate_id) REFERENCES candidate (id)');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC13481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id)');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44712A86AB');
        $this->addSql('DROP INDEX IDX_C8B28E44712A86AB ON candidate');
        $this->addSql('ALTER TABLE candidate ADD job_category INT DEFAULT NULL, DROP job_category_id');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44610BBCBA FOREIGN KEY (job_category) REFERENCES job_category (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E44712A86AB ON candidate (job_category)');
        $this->addSql('ALTER TABLE file CHANGE candidate_id candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_offer CHANGE client client INT DEFAULT NULL, CHANGE job_category job_category INT DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE active active TINYINT(1) DEFAULT NULL, CHANGE notes notes VARCHAR(255) DEFAULT NULL, CHANGE job_title job_title VARCHAR(255) DEFAULT NULL, CHANGE contract_type contract_type VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE id_candidate_id id_candidate_id INT DEFAULT NULL, CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE client CHANGE job_category job_category INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE application');
        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E44610BBCBA');
        $this->addSql('DROP INDEX IDX_C8B28E44712A86AB ON candidate');
        $this->addSql('ALTER TABLE candidate ADD job_category_id INT NOT NULL, DROP job_category');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E44712A86AB FOREIGN KEY (job_category_id) REFERENCES job_category (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E44712A86AB ON candidate (job_category_id)');
        $this->addSql('ALTER TABLE client CHANGE job_category job_category INT DEFAULT NULL');
        $this->addSql('ALTER TABLE file CHANGE candidate_id candidate_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE job_offer CHANGE job_category job_category INT DEFAULT NULL, CHANGE client client INT DEFAULT NULL, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE active active TINYINT(1) NOT NULL, CHANGE notes notes VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE job_title job_title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contract_type contract_type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user CHANGE id_candidate_id id_candidate_id INT DEFAULT NULL, CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
    }
}
