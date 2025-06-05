SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

DROP DATABASE IF EXISTS `anuncios`;

CREATE DATABASE `anuncios`;

USE `anuncios`;

CREATE TABLE IF NOT EXISTS `anuncio` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `imagen` VARCHAR(255) NOT NULL,
    `link` VARCHAR(255) NOT NULL,
    `vecesClickado` INT DEFAULT 0,
    `tipo` INT,
    `nombre` VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE anuncio (
     id INT AUTO_INCREMENT PRIMARY KEY,
     imagen VARCHAR(255) NOT NULL,
     link VARCHAR(255) NOT NULL,
     vecesClickado INT DEFAULT 0,
     tipo INT,
     nombre VARCHAR(255),

     FOREIGN KEY (tipo) REFERENCES tipo_anuncio(id) ON DELETE SET NULL
);


CREATE TABLE tipo_anuncio (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(255) NOT NULL
);


INSERT INTO tipo_anuncio (nombre) VALUES ('portátiles');

INSERT INTO anuncio (imagen, link, tipo, nombre) VALUES
     (
         'https://png.pngtree.com/png-clipart/20241114/original/pngtree-asus-elegant-gaming-laptop-png-image_17033096.png',
         'https://www.pccomponentes.com/asus-tuf-gaming-f17-fx707vi-hx040-intel-core-i7-13620h-32gb-1tb-ssd-rtx-4070-173',
         1,
         'ASUS TUF'
     ),
     (
         'https://es-store.msi.com/cdn/shop/files/portatil-gaming-msi-katana-15-b13vfk-487xes-1eb2-4aab-b283-1db1d63dee01_1024x.png?v=1729687865',
         'https://es-store.msi.com/products/katana-15-b13vfk-487xes-portatiles',
         1,
         'MSI katana'
     ),
     (
         'https://assets.mmsrg.com/isr/166325/c1/-/ASSET_MP_117002076/fee_786_587_png',
         'https://www.mediamarkt.es/es/product/_portatil-82xf005tsp-lenovo-16-wuxga-intelr-coretm-i5-13420h-16-gb-512-gb-uhd-graphics-cloud-grey-117002064.html',
         1,
         'Lenovo 16'
     );
