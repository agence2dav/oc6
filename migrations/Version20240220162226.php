<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240220162226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trick_designations DROP FOREIGN KEY FK_51D61A4CB281BE2E');
        $this->addSql('ALTER TABLE trick_designations DROP FOREIGN KEY FK_51D61A4CFAC7D83F');
        $this->addSql('DROP TABLE designation');
        $this->addSql('DROP TABLE trick_designations');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE designation (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE trick_designations (id INT AUTO_INCREMENT NOT NULL, trick_id INT DEFAULT NULL, designation_id INT DEFAULT NULL, INDEX IDX_51D61A4CFAC7D83F (designation_id), INDEX IDX_51D61A4CB281BE2E (trick_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE trick_designations ADD CONSTRAINT FK_51D61A4CB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('ALTER TABLE trick_designations ADD CONSTRAINT FK_51D61A4CFAC7D83F FOREIGN KEY (designation_id) REFERENCES designation (id)');
    }
}
