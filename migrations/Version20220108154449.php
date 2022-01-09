<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220108154449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE character_skill (id INT AUTO_INCREMENT NOT NULL, character_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, value INT NOT NULL, INDEX IDX_A0FE03151136BE75 (character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE character_skill ADD CONSTRAINT FK_A0FE03151136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id)');
        $this->addSql('DROP TABLE skill');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, character_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, value INT NOT NULL, INDEX IDX_5E3DE4771136BE75 (character_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4771136BE75 FOREIGN KEY (character_id) REFERENCES `character` (id)');
        $this->addSql('DROP TABLE character_skill');
    }
}
