CREATE TABLE tb_usuario (

  id              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre          VARCHAR(255) NOT NULL,
  apellidos       VARCHAR(255) NOT NULL,
  password        VARCHAR(255) NOT NULL,
  email           VARCHAR(255) NOT NULL,
  telefono        VARCHAR(15),
  facebook        VARCHAR(255),
  twitter         VARCHAR(255),
  alta            TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB;

CREATE TABLE tb_login (

  id              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id      INT,
  ip              VARCHAR(15),
  navegador       VARCHAR(255),
  conexion        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (usuario_id) REFERENCES tb_usuario(id)
    ON UPDATE CASCADE
    ON DELETE SET NULL
)DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB;

CREATE TABLE tb_aviso (

  id              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id      INT,
  tipo_aviso      ENUM('perdido', 'encontrado') NOT NULL,
  tipo_animal     ENUM('perro', 'gato') NOT NULL,
  provincia       VARCHAR(255) NOT NULL,
  localidad       VARCHAR(255) NOT NULL,
  fecha           DATE NOT NULL,
  sugerencia      VARCHAR(255),
  imagen          LONGBLOB,
  creado          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (usuario_id) REFERENCES tb_usuario(id)
    ON UPDATE CASCADE
    ON DELETE SET NULL

)DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB;

CREATE TABLE tb_animal (

  id              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id      INT,
  aviso_id        INT,
  nombre          VARCHAR(255),
  raza            VARCHAR(255) NOT NULL,
  color_pelo      VARCHAR(255) NOT NULL,
  edad            ENUM('cachorro', 'joven', 'adulto'),
  sexo            ENUM('macho', 'hembra'),

  FOREIGN KEY (usuario_id) REFERENCES tb_usuario(id)
    ON UPDATE CASCADE
    ON DELETE SET NULL,

  FOREIGN KEY (aviso_id) REFERENCES tb_aviso(id)
    ON UPDATE CASCADE
    ON DELETE SET NULL
)DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB;

CREATE TABLE tb_comentarios (

  id              INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_id      INT,
  aviso_id        INT,
  texto           TEXT NOT NULL,
  creado          TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  modificado      TIMESTAMP NULL DEFAULT NULL,

  FOREIGN KEY (usuario_id) REFERENCES tb_usuario(id)
    ON UPDATE CASCADE
    ON DELETE SET NULL,

  FOREIGN KEY (aviso_id) REFERENCES tb_aviso(id)
    ON UPDATE CASCADE
    ON DELETE SET NULL
)DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB;

CREATE TABLE tb_mensajes (

  id                          INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario_remitente_id        INT,
  usuario_destinatario_id     INT,
  asunto                      VARCHAR(255) NOT NULL,
  texto                       TEXT NOT NULL,
  leido                       BOOLEAN,
  creado                      TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

  FOREIGN KEY (usuario_remitente_id) REFERENCES tb_usuario(id)
    ON UPDATE CASCADE
    ON DELETE SET NULL,

  FOREIGN KEY (usuario_destinatario_id) REFERENCES tb_usuario(id)
    ON UPDATE CASCADE
    ON DELETE SET NULL
)DEFAULT CHARACTER SET UTF8 ENGINE=InnoDB;
