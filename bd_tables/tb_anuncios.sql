CREATE TABLE tb_anuncios(
    id_anuncio                  INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titulo                      VARCHAR (255) NULL,
    descripcion                 VARCHAR (255) NULL,
    imagen                     BLOB,
    fyh_creacion               DATETIME NULL,
    fyh_actualizacion          DATETIME NULL,
    fyh_eliminacion            DATETIME NULL,
    estado                     VARCHAR(10)
);