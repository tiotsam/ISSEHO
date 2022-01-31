<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220131092023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cours (id INT AUTO_INCREMENT NOT NULL, auteur_id INT NOT NULL, niveau_id INT NOT NULL, matieres_id INT NOT NULL, date_debut DATETIME NOT NULL, date_fin DATETIME NOT NULL, max_participants INT NOT NULL, INDEX IDX_FDCA8C9C60BB6FE6 (auteur_id), INDEX IDX_FDCA8C9CB3E9C81 (niveau_id), INDEX IDX_FDCA8C9C82350831 (matieres_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cours_user (cours_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_5EE5E9A67ECF78B0 (cours_id), INDEX IDX_5EE5E9A6A76ED395 (user_id), PRIMARY KEY(cours_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE infos (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, departement INT NOT NULL, ville VARCHAR(255) NOT NULL, birth_date DATE NOT NULL, date_inscription DATE NOT NULL, image_user VARCHAR(255) DEFAULT NULL, rue VARCHAR(255) NOT NULL, tel VARCHAR(14) NOT NULL, UNIQUE INDEX UNIQ_EECA826DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_auto (id INT AUTO_INCREMENT NOT NULL, auteur_id INT NOT NULL, cours_id INT DEFAULT NULL, objet VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, date_envoi DATETIME NOT NULL, INDEX IDX_CBC1B69360BB6FE6 (auteur_id), INDEX IDX_CBC1B6937ECF78B0 (cours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_auto_user (mail_auto_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_C66A1826C7E8384A (mail_auto_id), INDEX IDX_C66A1826A76ED395 (user_id), PRIMARY KEY(mail_auto_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matieres (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, auteur_id INT NOT NULL, objet VARCHAR(255) NOT NULL, contenu LONGTEXT NOT NULL, date_envoi DATETIME NOT NULL, INDEX IDX_B6BD307F60BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message_user (message_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_24064D90537A1329 (message_id), INDEX IDX_24064D90A76ED395 (user_id), PRIMARY KEY(message_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE niveau (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE questionnaire (id INT AUTO_INCREMENT NOT NULL, questions LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', reponses LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistiques_connexions (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_connexion DATETIME NOT NULL, date_deconnexion DATETIME NOT NULL, INDEX IDX_D66F450CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, infos_id INT DEFAULT NULL, questionnaire_id INT DEFAULT NULL, enfants_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), UNIQUE INDEX UNIQ_8D93D649544A4CCA (infos_id), INDEX IDX_8D93D649CE07E8FF (questionnaire_id), INDEX IDX_8D93D649A586286C (enfants_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9CB3E9C81 FOREIGN KEY (niveau_id) REFERENCES niveau (id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C82350831 FOREIGN KEY (matieres_id) REFERENCES matieres (id)');
        $this->addSql('ALTER TABLE cours_user ADD CONSTRAINT FK_5EE5E9A67ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cours_user ADD CONSTRAINT FK_5EE5E9A6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE infos ADD CONSTRAINT FK_EECA826DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mail_auto ADD CONSTRAINT FK_CBC1B69360BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE mail_auto ADD CONSTRAINT FK_CBC1B6937ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('ALTER TABLE mail_auto_user ADD CONSTRAINT FK_C66A1826C7E8384A FOREIGN KEY (mail_auto_id) REFERENCES mail_auto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mail_auto_user ADD CONSTRAINT FK_C66A1826A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307F60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90537A1329 FOREIGN KEY (message_id) REFERENCES message (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE message_user ADD CONSTRAINT FK_24064D90A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE statistiques_connexions ADD CONSTRAINT FK_D66F450CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649544A4CCA FOREIGN KEY (infos_id) REFERENCES infos (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CE07E8FF FOREIGN KEY (questionnaire_id) REFERENCES questionnaire (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A586286C FOREIGN KEY (enfants_id) REFERENCES infos (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cours_user DROP FOREIGN KEY FK_5EE5E9A67ECF78B0');
        $this->addSql('ALTER TABLE mail_auto DROP FOREIGN KEY FK_CBC1B6937ECF78B0');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649544A4CCA');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A586286C');
        $this->addSql('ALTER TABLE mail_auto_user DROP FOREIGN KEY FK_C66A1826C7E8384A');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C82350831');
        $this->addSql('ALTER TABLE message_user DROP FOREIGN KEY FK_24064D90537A1329');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9CB3E9C81');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CE07E8FF');
        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C60BB6FE6');
        $this->addSql('ALTER TABLE cours_user DROP FOREIGN KEY FK_5EE5E9A6A76ED395');
        $this->addSql('ALTER TABLE infos DROP FOREIGN KEY FK_EECA826DA76ED395');
        $this->addSql('ALTER TABLE mail_auto DROP FOREIGN KEY FK_CBC1B69360BB6FE6');
        $this->addSql('ALTER TABLE mail_auto_user DROP FOREIGN KEY FK_C66A1826A76ED395');
        $this->addSql('ALTER TABLE message DROP FOREIGN KEY FK_B6BD307F60BB6FE6');
        $this->addSql('ALTER TABLE message_user DROP FOREIGN KEY FK_24064D90A76ED395');
        $this->addSql('ALTER TABLE statistiques_connexions DROP FOREIGN KEY FK_D66F450CA76ED395');
        $this->addSql('DROP TABLE cours');
        $this->addSql('DROP TABLE cours_user');
        $this->addSql('DROP TABLE infos');
        $this->addSql('DROP TABLE mail_auto');
        $this->addSql('DROP TABLE mail_auto_user');
        $this->addSql('DROP TABLE matieres');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE message_user');
        $this->addSql('DROP TABLE niveau');
        $this->addSql('DROP TABLE questionnaire');
        $this->addSql('DROP TABLE statistiques_connexions');
        $this->addSql('DROP TABLE user');
    }
}
