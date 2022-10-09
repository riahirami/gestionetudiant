<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211205163209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notes_eleve (notes_id INT NOT NULL, eleve_id INT NOT NULL, INDEX IDX_7656ED57FC56F556 (notes_id), INDEX IDX_7656ED57A6CC7B2 (eleve_id), PRIMARY KEY(notes_id, eleve_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notes_matiere (notes_id INT NOT NULL, matiere_id INT NOT NULL, INDEX IDX_90C21B1EFC56F556 (notes_id), INDEX IDX_90C21B1EF46CD258 (matiere_id), PRIMARY KEY(notes_id, matiere_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE notes_eleve ADD CONSTRAINT FK_7656ED57FC56F556 FOREIGN KEY (notes_id) REFERENCES notes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notes_eleve ADD CONSTRAINT FK_7656ED57A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notes_matiere ADD CONSTRAINT FK_90C21B1EFC56F556 FOREIGN KEY (notes_id) REFERENCES notes (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notes_matiere ADD CONSTRAINT FK_90C21B1EF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eleve CHANGE id_eleve id_eleve INT NOT NULL');
        $this->addSql('ALTER TABLE matiere CHANGE code_mat code_mat INT NOT NULL');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68CA3219091');
        $this->addSql('ALTER TABLE notes DROP FOREIGN KEY FK_11BA68CA6CC7B2');
        $this->addSql('DROP INDEX UNIQ_11BA68CA3219091 ON notes');
        $this->addSql('DROP INDEX UNIQ_11BA68CA6CC7B2 ON notes');
        $this->addSql('ALTER TABLE notes DROP eleve_id, DROP code_matt');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE notes_eleve');
        $this->addSql('DROP TABLE notes_matiere');
        $this->addSql('ALTER TABLE eleve CHANGE id_eleve id_eleve INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matiere CHANGE code_mat code_mat INT DEFAULT NULL');
        $this->addSql('ALTER TABLE notes ADD eleve_id INT NOT NULL, ADD code_matt INT NOT NULL');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68CA3219091 FOREIGN KEY (code_matt) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE notes ADD CONSTRAINT FK_11BA68CA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_11BA68CA3219091 ON notes (code_matt)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_11BA68CA6CC7B2 ON notes (eleve_id)');
    }
}
