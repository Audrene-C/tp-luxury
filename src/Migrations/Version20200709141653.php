<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200709141653 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidate ADD job_type_id INT NOT NULL, DROP job_category');
        $this->addSql('ALTER TABLE candidate ADD CONSTRAINT FK_C8B28E445FA33B08 FOREIGN KEY (job_type_id) REFERENCES job_category (id)');
        $this->addSql('CREATE INDEX IDX_C8B28E445FA33B08 ON candidate (job_type_id)');
        $this->addSql('ALTER TABLE job_category CHANGE job category VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE candidate DROP FOREIGN KEY FK_C8B28E445FA33B08');
        $this->addSql('DROP INDEX IDX_C8B28E445FA33B08 ON candidate');
        $this->addSql('ALTER TABLE candidate ADD job_category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP job_type_id');
        $this->addSql('ALTER TABLE job_category CHANGE category job VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
