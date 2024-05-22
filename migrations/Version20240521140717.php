<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240521140717 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE participe (id INT AUTO_INCREMENT NOT NULL, sportif_id INT NOT NULL, epreuve_id INT NOT NULL, INDEX IDX_9FFA8D4FFB7083B (sportif_id), INDEX IDX_9FFA8D4AB990336 (epreuve_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE participe ADD CONSTRAINT FK_9FFA8D4FFB7083B FOREIGN KEY (sportif_id) REFERENCES sportif (id)');
        $this->addSql('ALTER TABLE participe ADD CONSTRAINT FK_9FFA8D4AB990336 FOREIGN KEY (epreuve_id) REFERENCES epreuve (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participe DROP FOREIGN KEY FK_9FFA8D4FFB7083B');
        $this->addSql('ALTER TABLE participe DROP FOREIGN KEY FK_9FFA8D4AB990336');
        $this->addSql('DROP TABLE participe');
    }
}
