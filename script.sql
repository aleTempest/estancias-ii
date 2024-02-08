CREATE TABLE CAT_AREAS
(
    id_area INT NOT NULL PRIMARY KEY,
    area VARCHAR(MAX) NOT NULL
);

CREATE TABLE VEHICULOS
(
    id              INTEGER PRIMARY KEY,
    tipo            VARCHAR(128),
    marca           VARCHAR(128),
    descripcion     VARCHAR(128),
    modelo          VARCHAR(128),
    color           VARCHAR(128),
    no_serie        VARCHAR(128),
    no_motor        VARCHAR(128),
    tipo_interiores VARCHAR(128),
    estado          VARCHAR(128),
    id_bien         INTEGER,
    FOREIGN KEY (id_bien) REFERENCES BIEN(id)
);

CREATE TABLE SOFTWARE
(
    id                INTEGER PRIMARY KEY,
    nombre_software   VARCHAR(254),
    licencia          VARCHAR(254),
    fecha_vencimiento DATE,
    no_serie          VARCHAR(254),
    id_bien           INTEGER,
    FOREIGN KEY (id_bien) REFERENCES BIEN(id)
);

CREATE TABLE RESGUARDANTE
(
    rfc_homoclave      VARCHAR(254) PRIMARY KEY,
    apellido_paterno   VARCHAR(254),
    apellido_materno   VARCHAR(254),
    nombres            VARCHAR(254),
    centro_adscripcion VARCHAR(254)
);

CREATE TABLE REP_LEGAL
(
    rfc_homoclave    VARCHAR(254) PRIMARY KEY,
    apellido_paterno VARCHAR(254),
    apellido_materno VARCHAR(254),
    nombres          VARCHAR(254)
);

CREATE TABLE MUEBLES
(
    id          INTEGER PRIMARY KEY,
    descripcion VARCHAR(254),
    id_bien     INTEGER,
    FOREIGN KEY (id_bien) REFERENCES BIEN(id)
);

CREATE TABLE HARDWARE
(
    id                        INTEGER PRIMARY KEY,
    procesador                VARCHAR(254),
    sistema_operativo         VARCHAR(254),
    nombre_equipo             VARCHAR(254),
    version_sistema_operativo VARCHAR(254),
    id_bien                   INTEGER,
    FOREIGN KEY (id_bien) REFERENCES BIEN(id)
);

CREATE TABLE CAT_SUB_COTACYT
(
    id   INT NOT NULL PRIMARY KEY,
    desc VARCHAR(254) NOT NULL
);

CREATE TABLE CAT_RESGUARDANTE
(
    id               INT NOT NULL PRIMARY KEY,
    apellido_paterno VARCHAR(254) NOT NULL,
    apellido_materno VARCHAR(254) NOT NULL,
    nombre           VARCHAR(254) NOT NULL
);

CREATE TABLE CAT_CONAC
(
    codigo INT NOT NULL PRIMARY KEY,
    descr   VARCHAR(254) NOT NULL
);


CREATE TABLE BIEN
(
    id                  INTEGER PRIMARY KEY,
    marca               VARCHAR(254),
    modelo              VARCHAR(254),
    no_serie            VARCHAR(254),
    no_inventario       VARCHAR(254),
    color               VARCHAR(254),
    fecha               DATE,
    uuid                VARCHAR(254),
    rfc_emisor          VARCHAR(254),
    nombre_denominacion VARCHAR(254),
    rfc_representante   VARCHAR(254) REFERENCES REP_LEGAL(rfc_homoclave),
    rfc_resguardante    VARCHAR(254) REFERENCES RESGUARDANTE(rfc_homoclave)
);