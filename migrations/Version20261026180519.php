<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261026180519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cotisation ADD membre_id INT NOT NULL');
        $this->addSql('ALTER TABLE cotisation ADD CONSTRAINT FK_AE64D2ED6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_AE64D2ED6A99F74A ON cotisation (membre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cotisation DROP CONSTRAINT FK_AE64D2ED6A99F74A');
        $this->addSql('DROP INDEX IDX_AE64D2ED6A99F74A');
        $this->addSql('ALTER TABLE cotisation DROP membre_id');
    }
}
