CREATE DATABASE WebL18100148;

USE WebL18100148;

CREATE TABLE usuarios
(
id_cred_usuarios varchar(50) not null,
usuario varchar(50) not null,
contraseña varchar(50),
primary key (id_cred_usuarios)
);

INSERT INTO USUARIOS (id_cred_usuarios, usuario, contraseña) VALUES ('U1','Luis','L18100148');
INSERT INTO USUARIOS (id_cred_usuarios, usuario, contraseña) VALUES ('U2','Angel','123456');
INSERT INTO USUARIOS (id_cred_usuarios, usuario, contraseña) VALUES ('U3','Eduardo','654321');

CREATE TABLE formulario_artista
(
id_cantante varchar(50) not null,
nombre_cantante varchar(50) not null,
apellido_cantante varchar(50) not null,
nombre_discografia varchar(50) not null,
direccion_disco varchar(50) not null,
telefono_disco varchar(50) not null,
nombre_album varchar(50) not null,
num_canciones smallint not null,
duracion_album float,
categoria_musica varchar(50) not null,
id_cred_usuarios varchar(50),
primary key (id_cantante),
foreign key (id_cred_usuarios) references usuarios(id_cred_usuarios)
); 

INSERT INTO FORMULARIO_ARTISTA (id_cantante, nombre_cantante, apellido_cantante, nombre_discografia, direccion_disco, telefono_disco, nombre_album, num_canciones, duracion_album, categoria_musica) VALUES ('C12','Grupo Firme','Caz','Manzanita Roja','Guerrero 2152','857496567','Desde la cierra',10,250,'Banda');
INSERT INTO FORMULARIO_ARTISTA (id_cantante, nombre_cantante, apellido_cantante, nombre_discografia, direccion_disco, telefono_disco, nombre_album, num_canciones, duracion_album, categoria_musica) VALUES ('C18','Ariel','Camacho','Del Record','Valles 258','65874565','El Karma',8,150,'Grupera');
INSERT INTO FORMULARIO_ARTISTA (id_cantante, nombre_cantante, apellido_cantante, nombre_discografia, direccion_disco, telefono_disco, nombre_album, num_canciones, duracion_album, categoria_musica) VALUES ('C14','Jovanny','Cadena','Music VIP','Col. Madero 658','142579468','Amarte Duele',12,245,'Regional Mexicano');
INSERT INTO FORMULARIO_ARTISTA (id_cantante, nombre_cantante, apellido_cantante, nombre_discografia, direccion_disco, telefono_disco, nombre_album, num_canciones, duracion_album, categoria_musica) VALUES ('C19','Angel','Quezada','Rap Trap Records','Los Toboganes 487','867458242','Infiel',8,2170,'Rap');
INSERT INTO FORMULARIO_ARTISTA (id_cantante, nombre_cantante, apellido_cantante, nombre_discografia, direccion_disco, telefono_disco, nombre_album, num_canciones, duracion_album, categoria_musica) VALUES ('C25','Luis Angel','El Flaco','Rancho Humilde','Mexico 65','346857298','Mi ultimo deseo',10,250,'Grupero');


