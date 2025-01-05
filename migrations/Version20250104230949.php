<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250104230949 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrator CHANGE expense_payment_category_id expense_payment_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE expense_payment_category DROP FOREIGN KEY FK_58D11BEE4B09E92C');
        $this->addSql('DROP INDEX IDX_58D11BEE4B09E92C ON expense_payment_category');
        $this->addSql('ALTER TABLE expense_payment_category DROP administrator_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense_payment_category ADD administrator_id INT NOT NULL');
        $this->addSql('ALTER TABLE expense_payment_category ADD CONSTRAINT FK_58D11BEE4B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_58D11BEE4B09E92C ON expense_payment_category (administrator_id)');
        $this->addSql('ALTER TABLE administrator CHANGE expense_payment_category_id expense_payment_category_id INT DEFAULT NULL');
    }
}
