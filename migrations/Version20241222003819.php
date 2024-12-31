<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222003819 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense_category ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE expense_payment_category ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE expense_transaction ADD expense_payment_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE expense_transaction ADD CONSTRAINT FK_B5BA94A9DDF111A FOREIGN KEY (expense_payment_category_id) REFERENCES expense_payment_category (id)');
        $this->addSql('CREATE INDEX IDX_B5BA94A9DDF111A ON expense_transaction (expense_payment_category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense_category DROP name');
        $this->addSql('ALTER TABLE expense_transaction DROP FOREIGN KEY FK_B5BA94A9DDF111A');
        $this->addSql('DROP INDEX IDX_B5BA94A9DDF111A ON expense_transaction');
        $this->addSql('ALTER TABLE expense_transaction DROP expense_payment_category_id');
        $this->addSql('ALTER TABLE expense_payment_category DROP name');
    }
}
