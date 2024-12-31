<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241215103421 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expense_transaction (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_expense DROP FOREIGN KEY FK_753793AC6B2A3179');
        $this->addSql('ALTER TABLE user_expense DROP FOREIGN KEY FK_753793AC9DDF111A');
        $this->addSql('ALTER TABLE user_expense DROP FOREIGN KEY FK_753793ACA76ED395');
        $this->addSql('DROP TABLE user_expense');
        $this->addSql('ALTER TABLE administrator DROP is_active, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE administrator_account DROP FOREIGN KEY FK_18295B4B4B09E92C');
        $this->addSql('DROP INDEX UNIQ_18295B4B4B09E92C ON administrator_account');
        $this->addSql('ALTER TABLE administrator_account DROP administrator_id, DROP first_name, DROP last_name, DROP first_name_kana, DROP last_name_kana, DROP birth_date, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE expense_category DROP name, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE expense_payment_category DROP name, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE user DROP is_active, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE user_account DROP FOREIGN KEY FK_253B48AEA76ED395');
        $this->addSql('DROP INDEX UNIQ_253B48AEA76ED395 ON user_account');
        $this->addSql('ALTER TABLE user_account DROP user_id, DROP first_name, DROP last_name, DROP first_name_kana, DROP last_name_kana, DROP birth_date, DROP created_at, DROP updated_at');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_expense (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, expense_category_id INT NOT NULL, expense_payment_category_id INT NOT NULL, payment_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', amount NUMERIC(10, 2) NOT NULL, note VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_753793ACA76ED395 (user_id), INDEX IDX_753793AC6B2A3179 (expense_category_id), INDEX IDX_753793AC9DDF111A (expense_payment_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_expense ADD CONSTRAINT FK_753793AC6B2A3179 FOREIGN KEY (expense_category_id) REFERENCES expense_category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user_expense ADD CONSTRAINT FK_753793AC9DDF111A FOREIGN KEY (expense_payment_category_id) REFERENCES expense_payment_category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user_expense ADD CONSTRAINT FK_753793ACA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE expense_transaction');
        $this->addSql('ALTER TABLE expense_category ADD name VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE expense_payment_category ADD name VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE administrator_account ADD administrator_id INT DEFAULT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD first_name_kana VARCHAR(255) NOT NULL, ADD last_name_kana VARCHAR(255) NOT NULL, ADD birth_date DATE NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE administrator_account ADD CONSTRAINT FK_18295B4B4B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_18295B4B4B09E92C ON administrator_account (administrator_id)');
        $this->addSql('ALTER TABLE user_account ADD user_id INT DEFAULT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD first_name_kana VARCHAR(255) NOT NULL, ADD last_name_kana VARCHAR(255) NOT NULL, ADD birth_date DATETIME NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user_account ADD CONSTRAINT FK_253B48AEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_253B48AEA76ED395 ON user_account (user_id)');
        $this->addSql('ALTER TABLE administrator ADD is_active TINYINT(1) NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE user ADD is_active TINYINT(1) NOT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
    }
}
