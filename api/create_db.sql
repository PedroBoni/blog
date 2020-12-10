CREATE DATABASE blog;

USE blog;

CREATE TABLE tb_article (
	cd_article INT AUTO_INCREMENT,
    nm_title VARCHAR(20) NOT NULL,
    ds_subtitle VARCHAR(50),
    ds_content LONGTEXT NOT NULL,
    PRIMARY KEY (cd_article)
)ENGINE=InnoDB DEFAULT CHARACTER SET = utf8;