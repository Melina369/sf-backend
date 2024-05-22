<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240522005857 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, precio_compra DOUBLE PRECISION NOT NULL, precio_venta DOUBLE PRECISION NOT NULL, fecha_creado DATETIME DEFAULT NULL, fecha_actualizado DATE DEFAULT NULL, cantidad INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subcategoria (id INT AUTO_INCREMENT NOT NULL, idsubcategoria_id INT DEFAULT NULL, idsubcat_id INT DEFAULT NULL, nombre VARCHAR(255) NOT NULL, INDEX IDX_DA7FB91469CC5793 (idsubcategoria_id), INDEX IDX_DA7FB914FECA8893 (idsubcat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subcategoria ADD CONSTRAINT FK_DA7FB91469CC5793 FOREIGN KEY (idsubcategoria_id) REFERENCES producto (id)');
        $this->addSql('ALTER TABLE subcategoria ADD CONSTRAINT FK_DA7FB914FECA8893 FOREIGN KEY (idsubcat_id) REFERENCES categoria (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subcategoria DROP FOREIGN KEY FK_DA7FB91469CC5793');
        $this->addSql('ALTER TABLE subcategoria DROP FOREIGN KEY FK_DA7FB914FECA8893');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE producto');
        $this->addSql('DROP TABLE subcategoria');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
