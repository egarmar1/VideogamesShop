CREATE DATABASE videogames_shop;
USE videogames_shop;


CREATE TABLE usuarios(
id      int(255) auto_increment not null,
nombre  varchar(100) not null,
apellidos   varchar(255) not null,
email       varchar(255) not null,
password    varchar(255) not null,
rol         varchar(20),
imagen      varchar(255)
CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)
)ENGINE=InnoDb;



CREATE TABLE categorias(
id int(255) auto_increment not null,
nombre varchar(100) not null,
CONSTRAINT pk_categorias PRIMARY KEY(id)
)ENGINE=InnoDb;




CREATE TABLE productos(
id int(255) auto_increment not null,
id_categoria int(255) not null,
titulo varchar(100) not null,
descripcion varchar(255) not null,
precio float(100,2) not null,
stock int(255) not null,
fecha   date not null,
imagen  varchar(255),

CONSTRAINT pk_products PRIMARY KEY(id),
CONSTRAINT fk_products_categorias FOREIGN KEY(categoria_id) REFERENCES  categorias(id);

)ENGINE=InnoDb;


CREATE TABLE pedidos(
id      int(255) auto_increment not null,
usuario_id  int(255) not null,
provincia   varchar(100) not null,
localidad varchar(100) not null,
direccion   varchar(255) not null,
coste       float(200,2) not null,
estado      varchar(20) not null,
fecha       date,
hora        time,

CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedidos_usuarios FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;

CREATE TABLE detallesPedido(
id  int(255) auto_increment not null,
id_pedido int(255) not null,
id_producto int(255) not null,
unidades    int(255) not null,

CONSTRAINT pk_detallesPed PRIMARY KEY(id),
CONSTRAINT fk_detallesPed_ped FOREIGN KEY(id_pedido) REFERENCES pedidos(id),
CONSTRAINT fk_detallesPed_prod FOREIGN KEY(id_producto) REFERENCES productos(id)


)ENGINE=InnoDb;

CREATE TABLE favouriteProduct(
id int(255) auto_increment not null,
id_usuario int(255) not null,
id_producto int(255) not null,

CONSTRAINT pk_favourteProduct PRIMARY KEY(id),
CONSTRAINT fk_favourteProduct_User FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
CONSTRAINT fk_favourteProduct_Prod FOREIGN KEY(id_producto) REFERENCES productos(id)
)ENGINE=InnoDb;