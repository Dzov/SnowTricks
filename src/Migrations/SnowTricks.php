<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class SnowTricks extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, trick_id INT NOT NULL, user_id INT NOT NULL, content LONGTEXT NOT NULL, posted_at DATETIME NOT NULL, INDEX IDX_9474526CB281BE2E (trick_id), INDEX IDX_9474526CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, trick_id INT NOT NULL, file_name VARCHAR(255) NOT NULL, path VARCHAR(255) NOT NULL, INDEX IDX_C53D045FB281BE2E (trick_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('CREATE TABLE trick (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, created_at DATETIME NOT NULL, description LONGTEXT NOT NULL, name VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_D8F0A91E5E237E06 (name), INDEX IDX_D8F0A91E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, activated TINYINT(1) NOT NULL, avatar VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, registered_at DATETIME NOT NULL, roles TEXT NOT NULL, token VARCHAR(255) NOT NULL, password_reset_token VARCHAR(255) DEFAULT NULL, password_reset_date DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, trick_id INT NOT NULL, iframe_path VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, INDEX IDX_7CC7DA2CB281BE2E (trick_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id);');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id);');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045FB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id);');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id);');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2CB281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id);');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS category');
        $this->addSql('DROP TABLE IF EXISTS comment');
        $this->addSql('DROP TABLE IF EXISTS image');
        $this->addSql('DROP TABLE IF EXISTS trick');
        $this->addSql('DROP TABLE IF EXISTS user');
        $this->addSql('DROP TABLE IF EXISTS video');
    }
}
