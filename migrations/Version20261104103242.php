<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261104103242 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campagne DROP CONSTRAINT fk_539b5d16e66695ce');
        $this->addSql('DROP INDEX idx_539b5d16e66695ce');
        $this->addSql('ALTER TABLE campagne DROP groupement_id');
        $this->addSql('ALTER TABLE exercice ADD create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE exercice ADD update_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE exercice ADD groupement_id INT NOT NULL');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74DE66695CE FOREIGN KEY (groupement_id) REFERENCES groupement (id) NOT DEFERRABLE');
        $this->addSql('CREATE INDEX IDX_E418C74DE66695CE ON exercice (groupement_id)');
        $this->addSql('ALTER TABLE groupement DROP CONSTRAINT fk_c8c9f15227b4febf');
        $this->addSql('DROP INDEX uniq_c8c9f15227b4febf');
        $this->addSql('ALTER TABLE groupement DROP caisse_id');
        $this->addSql('ALTER TABLE groupement RENAME COLUMN telephone TO tel');
        $this->addSql('ALTER TABLE membre DROP CONSTRAINT fk_f6b4fb29e66695ce');
        $this->addSql('DROP INDEX idx_f6b4fb29e66695ce');
        $this->addSql('ALTER TABLE membre DROP groupement_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE campagne ADD groupement_id INT NOT NULL');
        $this->addSql('ALTER TABLE campagne ADD CONSTRAINT fk_539b5d16e66695ce FOREIGN KEY (groupement_id) REFERENCES groupement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_539b5d16e66695ce ON campagne (groupement_id)');
        $this->addSql('ALTER TABLE exercice DROP CONSTRAINT FK_E418C74DE66695CE');
        $this->addSql('DROP INDEX IDX_E418C74DE66695CE');
        $this->addSql('ALTER TABLE exercice DROP create_at');
        $this->addSql('ALTER TABLE exercice DROP update_at');
        $this->addSql('ALTER TABLE exercice DROP groupement_id');
        $this->addSql('ALTER TABLE groupement ADD caisse_id INT NOT NULL');
        $this->addSql('ALTER TABLE groupement RENAME COLUMN tel TO telephone');
        $this->addSql('ALTER TABLE groupement ADD CONSTRAINT fk_c8c9f15227b4febf FOREIGN KEY (caisse_id) REFERENCES caisse (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_c8c9f15227b4febf ON groupement (caisse_id)');
        $this->addSql('ALTER TABLE membre ADD groupement_id INT NOT NULL');
        $this->addSql('ALTER TABLE membre ADD CONSTRAINT fk_f6b4fb29e66695ce FOREIGN KEY (groupement_id) REFERENCES groupement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_f6b4fb29e66695ce ON membre (groupement_id)');
    }
}
