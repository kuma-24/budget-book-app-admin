<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241215104311 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense_transaction ADD expense_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE expense_transaction ADD CONSTRAINT FK_B5BA94A6B2A3179 FOREIGN KEY (expense_category_id) REFERENCES expense_category (id)');
        $this->addSql('CREATE INDEX IDX_B5BA94A6B2A3179 ON expense_transaction (expense_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense_transaction DROP FOREIGN KEY FK_B5BA94A6B2A3179');
        $this->addSql('DROP INDEX IDX_B5BA94A6B2A3179 ON expense_transaction');
        $this->addSql('ALTER TABLE expense_transaction DROP expense_category_id');
    }
}
