CREATE TABLE tb_solicitudes(
    id_solicitud                        INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombres                              VARCHAR (255) NULL,
    email                              VARCHAR (255) NULL,
    descripcion                         VARCHAR (255) NULL,
    fyh_creacion                        DATETIME NULL,
    fyh_actualizacion                   DATETIME NULL,
    fyh_eliminacion                     DATETIME NULL,
    estado                              VARCHAR(10)
);