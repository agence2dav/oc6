<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240202150157 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CB281BE2E');
        $this->addSql('DROP INDEX IDX_9474526CB281BE2E ON comment');
        $this->addSql('ALTER TABLE comment ADD trick INT NOT NULL, ADD user INT NOT NULL, DROP trick_id, DROP name, DROP user_id');
        $this->addSql('ALTER TABLE designation ADD trick_designations_id INT NOT NULL');
        $this->addSql('ALTER TABLE designation ADD CONSTRAINT FK_8947610DC05C3CFF FOREIGN KEY (trick_designations_id) REFERENCES trick_designations (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8947610DC05C3CFF ON designation (trick_designations_id)');
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91EF8697D13');
        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91EA76ED395');
        $this->addSql('DROP INDEX IDX_D8F0A91EF8697D13 ON trick');
        $this->addSql('DROP INDEX IDX_D8F0A91EA76ED395 ON trick');
        $this->addSql('ALTER TABLE trick ADD user INT NOT NULL, DROP user_id, DROP comment_id');
        $this->addSql('ALTER TABLE trick_designations DROP FOREIGN KEY FK_51D61A4C5977F63');
        $this->addSql('ALTER TABLE trick_designations DROP FOREIGN KEY FK_51D61A4CB46B9EE8');
        $this->addSql('DROP INDEX IDX_51D61A4CB46B9EE8 ON trick_designations');
        $this->addSql('DROP INDEX IDX_51D61A4C5977F63 ON trick_designations');
        $this->addSql('ALTER TABLE trick_designations ADD trick INT NOT NULL, ADD designation INT NOT NULL, DROP trick_id_id, DROP designation_id_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment ADD trick_id INT NOT NULL, ADD name VARCHAR(255) NOT NULL, ADD user_id INT NOT NULL, DROP trick, DROP user');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('CREATE INDEX IDX_9474526CB281BE2E ON comment (trick_id)');
        $this->addSql('ALTER TABLE designation DROP FOREIGN KEY FK_8947610DC05C3CFF');
        $this->addSql('DROP INDEX UNIQ_8947610DC05C3CFF ON designation');
        $this->addSql('ALTER TABLE designation DROP trick_designations_id');
        $this->addSql('ALTER TABLE trick ADD comment_id INT NOT NULL, CHANGE user user_id INT NOT NULL');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91EF8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id)');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D8F0A91EF8697D13 ON trick (comment_id)');
        $this->addSql('CREATE INDEX IDX_D8F0A91EA76ED395 ON trick (user_id)');
        $this->addSql('ALTER TABLE trick_designations ADD trick_id_id INT DEFAULT NULL, ADD designation_id_id INT DEFAULT NULL, DROP trick, DROP designation');
        $this->addSql('ALTER TABLE trick_designations ADD CONSTRAINT FK_51D61A4C5977F63 FOREIGN KEY (designation_id_id) REFERENCES designation (id)');
        $this->addSql('ALTER TABLE trick_designations ADD CONSTRAINT FK_51D61A4CB46B9EE8 FOREIGN KEY (trick_id_id) REFERENCES trick (id)');
        $this->addSql('CREATE INDEX IDX_51D61A4CB46B9EE8 ON trick_designations (trick_id_id)');
        $this->addSql('CREATE INDEX IDX_51D61A4C5977F63 ON trick_designations (designation_id_id)');
    }
}
