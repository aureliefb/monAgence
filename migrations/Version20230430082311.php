<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230430082311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE property ADD surface INT NOT NULL');
        $this->addSql('ALTER TABLE property ADD rooms INT NOT NULL');
        $this->addSql('ALTER TABLE property ADD bedrooms INT NOT NULL');
        $this->addSql('ALTER TABLE property ADD floor INT NOT NULL');
        $this->addSql('ALTER TABLE property ADD price INT NOT NULL');
        $this->addSql('ALTER TABLE property ADD heat INT NOT NULL');
        $this->addSql('ALTER TABLE property ADD city VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE property ADD adress VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE property ADD postal_code VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE property ADD sold BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE property ADD create_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('COMMENT ON COLUMN property.create_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE property DROP surface');
        $this->addSql('ALTER TABLE property DROP rooms');
        $this->addSql('ALTER TABLE property DROP bedrooms');
        $this->addSql('ALTER TABLE property DROP floor');
        $this->addSql('ALTER TABLE property DROP price');
        $this->addSql('ALTER TABLE property DROP heat');
        $this->addSql('ALTER TABLE property DROP city');
        $this->addSql('ALTER TABLE property DROP adress');
        $this->addSql('ALTER TABLE property DROP postal_code');
        $this->addSql('ALTER TABLE property DROP sold');
        $this->addSql('ALTER TABLE property DROP create_at');
    }
}
