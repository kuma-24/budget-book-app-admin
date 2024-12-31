<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241222095025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE administrator ADD expense_payment_category_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE administrator ADD CONSTRAINT FK_58DF06519DDF111A FOREIGN KEY (expense_payment_category_id) REFERENCES expense_payment_category (id)');
        $this->addSql('CREATE INDEX IDX_58DF06519DDF111A ON administrator (expense_payment_category_id)');
        $this->addSql('ALTER TABLE administrator_account ADD administrator_id INT NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD first_name_kana VARCHAR(255) NOT NULL, ADD last_name_kana VARCHAR(255) NOT NULL, ADD birth_date DATE NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE administrator_account ADD CONSTRAINT FK_18295B4B4B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_18295B4B4B09E92C ON administrator_account (administrator_id)');
        $this->addSql('ALTER TABLE expense_category ADD administrator_id INT NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE expense_category ADD CONSTRAINT FK_C02DDB384B09E92C FOREIGN KEY (administrator_id) REFERENCES administrator (id)');
        $this->addSql('CREATE INDEX IDX_C02DDB384B09E92C ON expense_category (administrator_id)');
        $this->addSql('ALTER TABLE expense_payment_category ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE expense_transaction ADD user_id INT NOT NULL, ADD payment_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD amount INT NOT NULL, ADD note LONGTEXT NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE expense_transaction ADD CONSTRAINT FK_B5BA94AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B5BA94AA76ED395 ON expense_transaction (user_id)');
        $this->addSql('ALTER TABLE user ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user_account ADD user_id INT NOT NULL, ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD first_name_kana VARCHAR(255) NOT NULL, ADD last_name_kana VARCHAR(255) NOT NULL, ADD birth_date DATE NOT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user_account ADD CONSTRAINT FK_253B48AEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_253B48AEA76ED395 ON user_account (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expense_payment_category DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE user_account DROP FOREIGN KEY FK_253B48AEA76ED395');
        $this->addSql('DROP INDEX UNIQ_253B48AEA76ED395 ON user_account');
        $this->addSql('ALTER TABLE user_account DROP user_id, DROP first_name, DROP last_name, DROP first_name_kana, DROP last_name_kana, DROP birth_date, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE user DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE expense_transaction DROP FOREIGN KEY FK_B5BA94AA76ED395');
        $this->addSql('DROP INDEX IDX_B5BA94AA76ED395 ON expense_transaction');
        $this->addSql('ALTER TABLE expense_transaction DROP user_id, DROP payment_date, DROP amount, DROP note, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE expense_category DROP FOREIGN KEY FK_C02DDB384B09E92C');
        $this->addSql('DROP INDEX IDX_C02DDB384B09E92C ON expense_category');
        $this->addSql('ALTER TABLE expense_category DROP administrator_id, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE administrator_account DROP FOREIGN KEY FK_18295B4B4B09E92C');
        $this->addSql('DROP INDEX UNIQ_18295B4B4B09E92C ON administrator_account');
        $this->addSql('ALTER TABLE administrator_account DROP administrator_id, DROP first_name, DROP last_name, DROP first_name_kana, DROP last_name_kana, DROP birth_date, DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE administrator DROP FOREIGN KEY FK_58DF06519DDF111A');
        $this->addSql('DROP INDEX IDX_58DF06519DDF111A ON administrator');
        $this->addSql('ALTER TABLE administrator DROP expense_payment_category_id, DROP created_at, DROP updated_at');
    }
}
