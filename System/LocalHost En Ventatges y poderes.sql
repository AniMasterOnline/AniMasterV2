SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE Partida (
      id_partida     int NOT NULL AUTO_INCREMENT,
      id_usuario     int NOT NULL,
      nombre     varchar(32),
      imagen     varchar(50),
      descripcion     varchar(250),
      anyo     varchar(8),
      nv_sobrenatural     int,
      limite     int,
      token char(40),
	  diario varchar(60000),
      PRIMARY KEY (`id_partida`),
      KEY `id_usuario` (`id_usuario`)
);



CREATE TABLE Usuario (
      id_usuario     int NOT NULL AUTO_INCREMENT,
      nickname     varchar(32) UNIQUE,
      imagen     varchar(32),
      nombre     varchar(32),
      apellido     varchar(32),
      email     varchar(32),
      telefono     varchar(32),
      password     varchar(32),
      id_tipo     int,
      num_partidas int DEFAULT NULL, -- < value on guardar el nombre de partides actuals i poder limitaru amb php
      PRIMARY KEY (`id_usuario`)
);



CREATE TABLE Personaje (
      id_personaje     int NOT NULL AUTO_INCREMENT,
      id_usuario     int NOT NULL,
	  id_partida     int,
      id_categoria     int NOT NULL,
      nombre     varchar(32),
      apellido     varchar(32),
      edad     int,
      nivel     int,
      turno     int,
      puntos_vida     int,
      sexo     varchar(32),
      raza     varchar(32),
      pelo     varchar(32),
      ojos     varchar(32),
      altura     varchar(32),
      peso     varchar(32),
      apariencia     int,
      tamanyo     int,
      exp_actual     int,
      c_AGI     int,
      c_CON     int,
      c_DES     int,
      c_FUE     int,
      c_INT     int,
      c_PER     int,
      c_POD     int,
      c_VOL     int,
      nacionalidad     int(11),
      imagen     varchar(32),
      humano     varchar(8),
  puntos_hs     int,
  puntos_hp     int,
  puntos_totales     int,
  ha int,
  hp int,
  he int,
  la int,
      PRIMARY KEY (`id_personaje`),
      KEY `id_usuario` (`id_usuario`),
      KEY `id_categoria` (`id_categoria`),
  KEY `nacionalidad` (`nacionalidad`)
);



CREATE TABLE IF NOT EXISTS `Nacionalidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `paises`
--

INSERT INTO `Nacionalidad` (`id`, `nombre`) VALUES
(1, 'Abel'),
(2, 'Arlan'),
(3, 'Alberia'),
(4, 'Galgados'),
(5, 'Ilmora'),
(6, 'Helenia'),
(7, 'Kanon'),
(8, 'Haufman'),
(9, 'Goldar'),
(10, 'Hendell'),
(11, 'Moth'),
(12, 'Dwänholf'),
(13, 'Phaion'),
(14, 'Gabriel'),
(15, 'Togarini'),
(16, 'Remo'),
(17, 'Bellafonte'),
(18, 'Lucrecio'),
(19, 'El Dominio'),
(20, 'Argos'),
(21, 'Kushistán'),
(22, 'Estigia'),
(23, 'Salazar'),
(24, 'Nanwe'),
(25, 'Kashmir'),
(26, 'Baho'),
(27, 'Lannet'),
(28, 'Shivat'),
(29, 'Bekent'),
(30, 'Dafne'),
(31, 'Pristina'),
(32, 'Espheria'),
(33, 'Ygdramar'),
(34, 'Manterra'),
(35, 'Corinia'),
(36, 'Arabel'),
(37, 'Elcia'),
(38, 'Itzi'),
(39, 'Dalaborn');



CREATE TABLE Categoria (
      id_categoria     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      descripcion     varchar(3000),
      PRIMARY KEY (`id_categoria`)
);



CREATE TABLE Habilidades_Secundarias (
  id_HS     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      id_rama     int NOT NULL,
      caracteristica     varchar(32),
      PRIMARY KEY (`id_HS`),
      KEY `id_rama` (`id_rama`)
);



CREATE TABLE Rama (
  id_rama     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32) NOT NULL,
      PRIMARY KEY (`id_rama`)
);



CREATE TABLE Habilidades_Primarias (
      id_HP     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      caracteristica     varchar(32),
      PRIMARY KEY (`id_HP`)
);



CREATE TABLE Nivel (
      nivel     int NOT NULL,
      puntos     int,
      incr_caracteristica int,
      exp_necesaria   int,
      presencia_base   int,
      PRIMARY KEY (`nivel`)
);



CREATE TABLE Objeto (
      `id_objeto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) DEFAULT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  `peso` float(4,1) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `public` varchar(8) DEFAULT 'true',
  `disponibilidad` varchar(8) DEFAULT NULL,
  `calidad` int(11) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT '6',
      PRIMARY KEY (`id_objeto`)
);



CREATE TABLE Roles (
      id_tipo     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      PRIMARY KEY (`id_tipo`)
);



CREATE TABLE Tipo (
  id_tipo     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32) NOT NULL,
      PRIMARY KEY (`id_tipo`)
);



CREATE TABLE Caracteristica (
      id_caracteristica     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(32),
      PRIMARY KEY (`id_caracteristica`)
);

CREATE TABLE Puntos_Vida (
      id_constitucion     int NOT NULL,
      cantidad     int,
      PRIMARY KEY (`id_constitucion`)
);

CREATE TABLE Regeneracion (
      id_constitucion     int NOT NULL,
      regeneracion_Diaria     int,
      PRIMARY KEY (`id_constitucion`)
);

CREATE TABLE Tamanyo (
      id_tamanyo     int NOT NULL,
      altura     varchar(32),
  peso     varchar(32),
      PRIMARY KEY (`id_tamanyo`)
);


CREATE TABLE Ventaja (
      id_ventaja     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(150),
      descripcion     varchar(999),
      efectos     varchar(999),
      limitacion     varchar(999),
      puntos_creacion     int,
      PRIMARY KEY (`id_ventaja`)
);


CREATE TABLE Habilidades_Esenciales (
      id_habilidad     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(150),
      coste     int,
      gnosis     int,
      PRIMARY KEY (`id_habilidad`)
);


CREATE TABLE EfectoEsencial (
      id_efecto_esencial     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(150),
  valor int,
      PRIMARY KEY (`id_efecto_esencial`)
);


CREATE TABLE Ventaja_Efecto (
      id_ventaja     int NOT NULL,
      id_efecto     int NOT NULL
);

ALTER TABLE Ventaja_Efecto ADD PRIMARY KEY (id_ventaja,id_efecto);


CREATE TABLE Habilidades_Esenciales_Efecto (
      id_habilidad     int NOT NULL,
  id_efecto_esencial     int NOT NULL
);

ALTER TABLE Habilidades_Esenciales_Efecto ADD PRIMARY KEY (id_habilidad,id_efecto_esencial);



CREATE TABLE Poderes_Monstruo (
      id_poder     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(150),
      descripcion     varchar(999),
      explicacion     varchar(999),
      prohibicion     varchar(999),
      PRIMARY KEY (`id_poder`)
);


CREATE TABLE Efecto_Poder (
      id_efecto_poder     int NOT NULL AUTO_INCREMENT,
      nombre     varchar(150),
      coste     int,
      gnosis     int,
      penalizador     varchar(999),
      id_poder     int NOT NULL,
      PRIMARY KEY (`id_efecto_poder`)
);



CREATE TABLE Caracteristicas_P (
      base     int NOT NULL,
      bono     int,
      PRIMARY KEY (`base`)
);



CREATE TABLE Partida_Usuari (
      id_usuario    int NOT NULL,
      id_partida    int NOT NULL,
      pos   int DEFAULT NULL,
  aceptado varchar(50) DEFAULT 'false'
);


ALTER TABLE Partida_Usuari ADD PRIMARY KEY (id_usuario,id_partida);



CREATE TABLE Personaje_HS (
      id_personaje     int NOT NULL,
      id_HS     int NOT NULL,
	  valor int DEFAULT 0
);


ALTER TABLE Personaje_HS ADD PRIMARY KEY (id_personaje,id_HS);



CREATE TABLE Personaje_HP (
      id_personaje     int NOT NULL,
      id_HP     int NOT NULL
);


ALTER TABLE Personaje_HP ADD PRIMARY KEY (id_personaje,id_HP);



CREATE TABLE Mensaje (
      id_usuario     int NOT NULL,
      Usuario_id_usuario     int NOT NULL,
      conversacion     varchar(32),
      fecha     date
);


ALTER TABLE Mensaje ADD PRIMARY KEY (id_usuario,Usuario_id_usuario);



CREATE TABLE Personaje_Objeto (
      id_personaje     int NOT NULL,
      id_objeto     int NOT NULL,
	  cantidad int DEFAULT 1
);


ALTER TABLE Personaje_Objeto ADD PRIMARY KEY (id_personaje,id_objeto);



CREATE TABLE Objeto_Caracteristica (
      id_caracteristica     int NOT NULL,
      id_objeto     int NOT NULL,
      valor     varchar(250)
);


ALTER TABLE Objeto_Caracteristica ADD PRIMARY KEY (id_caracteristica,id_objeto);



CREATE TABLE Partida_Objeto (
      id_partida     int NOT NULL,
      id_objeto     int NOT NULL
);


ALTER TABLE Partida_Objeto ADD PRIMARY KEY (id_partida,id_objeto);



CREATE TABLE Personaje_Ventaja (
      id_personaje     int NOT NULL,
      id_ventaja     int NOT NULL
);


ALTER TABLE Personaje_Ventaja ADD PRIMARY KEY (id_personaje,id_ventaja);


CREATE TABLE Personaje_Poderes (
      id_poder     int NOT NULL,
      id_personaje     int NOT NULL
);


ALTER TABLE Personaje_Poderes ADD PRIMARY KEY (id_poder,id_personaje);



CREATE TABLE Personaje_Habilidades (
      id_habilidad     int NOT NULL,
      id_personaje     int NOT NULL
);


ALTER TABLE Personaje_Habilidades ADD PRIMARY KEY (id_habilidad,id_personaje);




CREATE TABLE Categoria_HP (
      id_categoria     int NOT NULL,
      id_HP     int NOT NULL,
      coste int,
      incr_nv  int
);

ALTER TABLE Categoria_HP ADD PRIMARY KEY (id_categoria,id_HP);

CREATE TABLE Categoria_HS (
      id_categoria     int NOT NULL,
      id_HS     int NOT NULL,
      coste int,
      incr_nv  int
);

ALTER TABLE Categoria_HS ADD PRIMARY KEY (id_categoria,id_HS);

CREATE TABLE Combate (
      id_personaje     int NOT NULL,
      id_partida     int NOT NULL
);


ALTER TABLE Combate ADD PRIMARY KEY (id_partida);







ALTER TABLE Partida ADD FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario);



ALTER TABLE Usuario ADD FOREIGN KEY (id_tipo) REFERENCES Roles (id_tipo);



ALTER TABLE Personaje ADD FOREIGN KEY (id_categoria) REFERENCES Categoria (id_categoria);
ALTER TABLE Personaje ADD FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario);
ALTER TABLE Personaje ADD FOREIGN KEY (nacionalidad) REFERENCES Nacionalidad (id);




ALTER TABLE Habilidades_Secundarias ADD FOREIGN KEY (id_rama) REFERENCES Rama (id_rama);





ALTER TABLE Objeto ADD FOREIGN KEY (id_tipo) REFERENCES Tipo (id_tipo);








ALTER TABLE Efecto_Poder ADD FOREIGN KEY (id_poder) REFERENCES Poderes_Monstruo (id_poder);






ALTER TABLE Partida_Usuari ADD FOREIGN KEY (id_usuario) REFERENCES Usuario (id_usuario);
ALTER TABLE Partida_Usuari ADD FOREIGN KEY (id_partida) REFERENCES Partida (id_partida);


ALTER TABLE Personaje_HS ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);
ALTER TABLE Personaje_HS ADD FOREIGN KEY (id_HS) REFERENCES Habilidades_Secundarias (id_HS);


ALTER TABLE Personaje_HP ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);
ALTER TABLE Personaje_HP ADD FOREIGN KEY (id_HP) REFERENCES Habilidades_Primarias (id_HP);

--
-- ALTER TABLE Mensaje ADD FOREIGN KEY (id_usuario,Usuario_id_usuario) REFERENCES Usuario (id_usuario,id_usuario);
--

ALTER TABLE Personaje_Objeto ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);
ALTER TABLE Personaje_Objeto ADD FOREIGN KEY (id_objeto) REFERENCES Objeto (id_objeto);


ALTER TABLE Objeto_Caracteristica ADD FOREIGN KEY (id_caracteristica) REFERENCES Caracteristica (id_caracteristica);
ALTER TABLE Objeto_Caracteristica ADD FOREIGN KEY (id_objeto) REFERENCES Objeto (id_objeto);


ALTER TABLE Partida_Objeto ADD FOREIGN KEY (id_partida) REFERENCES Partida (id_partida);
ALTER TABLE Partida_Objeto ADD FOREIGN KEY (id_objeto) REFERENCES Objeto (id_objeto);


ALTER TABLE Personaje_Ventaja ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);
ALTER TABLE Personaje_Ventaja ADD FOREIGN KEY (id_ventaja) REFERENCES Ventaja (id_ventaja);


ALTER TABLE Personaje_Poderes ADD FOREIGN KEY (id_poder) REFERENCES Poderes_Monstruo (id_poder);
ALTER TABLE Personaje_Poderes ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);


ALTER TABLE Personaje_Habilidades ADD FOREIGN KEY (id_habilidad) REFERENCES Habilidades_Esenciales (id_habilidad);
ALTER TABLE Personaje_Habilidades ADD FOREIGN KEY (id_personaje) REFERENCES Personaje (id_personaje);

ALTER TABLE Categoria_HP ADD FOREIGN KEY (id_categoria) REFERENCES Categoria (id_categoria);
ALTER TABLE Categoria_HP ADD FOREIGN KEY (id_HP) REFERENCES Habilidades_Primarias (id_HP);

ALTER TABLE Categoria_HS ADD FOREIGN KEY (id_categoria) REFERENCES Categoria (id_categoria);
ALTER TABLE Categoria_HS ADD FOREIGN KEY (id_HS) REFERENCES Habilidades_Secundarias (id_HS);

ALTER TABLE Habilidades_Esenciales_Efecto ADD FOREIGN KEY (id_habilidad) REFERENCES Habilidades_Esenciales (id_habilidad);
ALTER TABLE Habilidades_Esenciales_Efecto ADD FOREIGN KEY (id_efecto_esencial) REFERENCES EfectoEsencial (id_efecto_esencial);


--
-- Volcado de datos para la tabla `Roles`
--
INSERT INTO `Roles` (`id_tipo`,`nombre`) VALUES
(0, 'Administrador'),
(1, 'Usuario');


--
-- Volcado de datos para la tabla `Usuario`
--
INSERT INTO  `Animaster`.`Usuario` (
`id_usuario` ,
`nickname` ,
`imagen` ,
`nombre` ,
`apellido` ,
`email` ,
`telefono` ,
`password` ,
`id_tipo` ,
`num_partidas`
)
VALUES 

(NULL ,  'Admin', NULL ,  'admin', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  '0'),
(NULL ,  'david', NULL ,  'david', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  NULL),
(NULL ,  'marc', NULL ,  'marc', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  '1'),
(NULL ,  'gurwinder', NULL ,  'gurwinder', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  NULL),
(NULL ,  'admin2', NULL ,  'admin2', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  '0'),
(NULL ,  'test', NULL ,  'test', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  NULL),
(NULL ,  'test2', NULL ,  'test2', NULL , NULL , NULL ,  'eb0a191797624dd3a48fa681d3061212',  NULL,  NULL);



--
-- Volcado de datos para la tabla `Caracteristicas_P`
--

INSERT INTO `Caracteristicas_P` (`base`, `bono`) VALUES
(1, -30),
(2, -20),
(3, -10),
(4, -5),
(5, 0),
(6, 5),
(7, 5),
(8, 10),
(9, 10),
(10, 15),
(11, 20),
(12, 20),
(13, 25),
(14, 30),
(15, 30),
(16, 35),
(17, 35),
(18, 40),
(19, 40),
(20, 45);

--
-- Volcado de datos para la tabla `Puntos_Vida`
--
INSERT INTO `Puntos_Vida` (`id_constitucion`, `cantidad`) 
VALUES
(1, 5),
(2, 20),
(3, 40),
(4, 55),
(5, 70),
(6, 85),
(7, 95),
(8, 110),
(9, 120),
(10, 135),
(11, 150),
(12, 160),
(13, 175),
(14, 185),
(15, 200),
(16, 215),
(17, 225),
(18, 240),
(19, 250),
(20, 265);


--
-- Volcado de datos para la tabla `Regeneracion`
--
INSERT INTO `Regeneracion` (`id_constitucion`, `regeneracion_Diaria`) 
VALUES
(1, 0),
(2, 0),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(8, 20),
(9, 20),
(10, 30),
(11, 40),
(12, 50),
(13, 75),
(14, 100),
(15, 250),
(16, 500),
(17, 1440),
(18, 2880),
(19, 7200),
(20, 7200);


--
-- Volcado de datos para la tabla `Tamanyo`
--
INSERT INTO `Tamanyo` (`id_tamanyo`, `altura`, `peso`) 
VALUES
(2, '0.20 a 0.60 m', '5 a 15 kg'),
(3, '0.40 a 0.60 m', '10 a 20 kg'),
(4, '0.60 a 1.00 m', '20 a 30 kg'),
(5, '0.80 a 1.20 m', '20 a 50 kg'),
(6, '1.00 a 1.40 m', '30 a 50 kg'),
(7, '1.10 a 1.50 m', '30 a 60 kg'),
(8, '1.20 a 1.60 m', '35 a 70 kg'),
(9, '1.30 a a.60 m', '40 a 80 kg'),
(10, '1.40 a 1.70 m', '40 a 90 kg'),
(11, '1.40 a 1.80 m', '50 a 100 kg'),
(12, '1.50 a 1.80 m', '50 a 120 kg'),
(13, '1.50 a 1.80 m', '50 a 140 kg'),
(14, '1.60 a 1.90 m', '50 a 150 kg'),
(15, '1.60 a 2.00 m', '60 a 180 kg'),
(16, '1.70 a 2.10 m', '70 a 220 kg'),
(17, '1.70 a 2.10 m', '80 a 240 kg'),
(18, '1.80 a 2.20 m', '90 a 260 kg'),
(19, '1.90 a 2.30 m', '100 a 280 kg'),
(20, '2.00 a 2.40 m', '110 a 320 kg'),
(21, '2.10 a 2.60 m', '120 a 450 kg'),
(22, '+2.5 m', '+400 kg');


--
-- Volcado de datos para la tabla `ventaja`
--
INSERT INTO  `Animaster`.`Ventaja` (
`id_ventaja` ,
`nombre` ,
`descripcion` ,
`efectos` ,
`limitacion` ,
`puntos_creacion`
)
VALUES 
(1, 'repetir una tirada de características', 'El azar permite a tu personaje modificar una de sus características básicas.', 'Te permite lanzar un dado adicional una vez que has generado las características de tu personaje, y utilitzar el resultado obtenido en lugar de uno de los anteriores. La nueva cifra no podrá ser inferior al valor de tu tirada más baja.', 'Esta ventaja no es compatible con el cuarto método de generación de características. Puede adquirirse tantas veces como se desee.', -1),
(2, 'sumar un punto a una característica', 'Uno de los atributos del personaje es superior a su valor original', 'Añade un punto al valor de una característica', 'Las características físicas no podrán superar el once usando esta ventaja. Puede adquirirse tantas veces como se desee.', -1),
(3, 'sustituir una característica por un nueve', 'Sustituye el valor de uno de los atributos del personaje', 'Sustituye una característica por un nueve sin importar cuál fuese su valor original', 'Esta ventaja puede comprarse tantas veces como se desee.', -2),
(4, 'resistencia física excepcional 1', 'La resistencia física del personaje es muy elevada. Los daños, venenos o enfermedades no tienen tanto efecto en él como podrían tenerlos en otros sujetos normales.', 'RF), Resistencia contra venenos (RV) y Resistencia contra enfermedades (RE). La inversión de un segundo punto de creación aumenta el nivel de las resistencias a +50.', NULL, -1),
(5, 'resistencia física excepcional 2', 'La resistencia física del personaje es muy elevada. Los daños, venenos o enfermedades no tienen tanto efecto en él como podrían tenerlos en otros sujetos normales.', 'RF), Resistencia contra venenos (RV) y Resistencia contra enfermedades (RE). La inversión de un segundo punto de creación aumenta el nivel de las resistencias a +50.', NULL, -2),
(6, 'fondos iniciales 1', 'El personaje es un individuo que posee una gran fortuna en material y equipamiento.', 'Esta ventaja proporciona una cantidad de dinero inicial o equipo valorado en 2.000 Escudos de Oro (MO). Los puntos invertidos adicionalmente aumentan esta cantidad a 5.000 y a 10.000 Escudos respectivamente.', NULL, -1),
(7, 'fondos iniciales 2', 'El personaje es un individuo que posee una gran fortuna en material y equipamiento.', 'Esta ventaja proporciona una cantidad de dinero inicial o equipo valorado en 2.000 Escudos de Oro (MO). Los puntos invertidos adicionalmente aumentan esta cantidad a 5.000 y a 10.000 Escudos respectivamente.', NULL, -2),
(8, 'fondos iniciales 3', 'El personaje es un individuo que posee una gran fortuna en material y equipamiento.', 'Esta ventaja proporciona una cantidad de dinero inicial o equipo valorado en 2.000 Escudos de Oro (MO). Los puntos invertidos adicionalmente aumentan esta cantidad a 5.000 y a 10.000 Escudos respectivamente.', NULL, -3),
(9, 'afinidad animal', 'Quien posea esta ventaja tiene un vínculo especial hacia los animales que le permite obtener una reacción positiva por su parte. Incomprensiblemente es incluso capaz de comunicarse de un modo limitado con ellos, entendiendo a rasgos generales cuáles son sus intenciones y viceversa.', 'El alcance de esta ventaja debe de ser interpretada por el Director del Juego. De cualquier modo, hay que explicar que un animal entrenado para atacar acabará haciéndolo a pesar de esta ventaja, pero probablemente lo hará tras una advertencia y dando siempre la oportunidad de escapar al personaje. En caso de que se fuerce un combate contra un animal, el personaje con esta ventaja será siempre la última persona a la que atacará si se encuentra en un grupo.', NULL, -1),
(10, 'regeneración básica', 'Las heridas sufridas por el personaje sanan con mucha facilidad, ya que su cuerpo posee un factor de curación muy elevado.', 'Aumenta en 2 niveles la Regeneración del personaje. La inversión de puntos adicionales la aumenta en 4 y 6 niveles, respectivamente', NULL, -1),
(11, 'regeneración avanzada', 'Las heridas sufridas por el personaje sanan con mucha facilidad, ya que su cuerpo posee un factor de curación muy elevado.', 'Aumenta en 2 niveles la Regeneración del personaje. La inversión de puntos adicionales la aumenta en 4 y 6 niveles, respectivamente', NULL, -2),
(12, 'regeneración mayor', 'Las heridas sufridas por el personaje sanan con mucha facilidad, ya que su cuerpo posee un factor de curación muy elevado.', 'Aumenta en 2 niveles la Regeneración del personaje. La inversión de puntos adicionales la aumenta en 4 y 6 niveles, respectivamente', NULL, -3),
(13, 'encanto', 'El personaje tiene cierto encanto personal que le vuelve carismático ante los demás. Siempre causa una reacción positiva a la gente que no le conoce, e incluso condiciona parcialmente a algunos individuos a ser ligeramente más permisivos con él.', 'El alcance de esta ventaja debe de ser interpretada por el Director del Juego.', NULL, -1),
(14, 'ambidestría', 'Una persona que goza de ambidestría tiene un perfecto control sobre ambas manos y puede utilizarlas con la misma habilidad', 'Un personaje ambidiestro podrá efectuar maniobras con cualquier mano con idéntica habilidad. En combate, permite reducir a -10 los ataques efectuados con un arma adicional.', NULL, -1),
(15, 'visión nocturna', 'Esta ventaja permite al personaje ver en la oscuridad y adaptarse a enorme velocidad a cualquier cambio en la intensidad de la luz.', 'Permite ignorar cualquier penalizador causado por la oscuridad, siempre que no se trate de un lugar con carencia absoluta de luz o algún tipo de oscuridad mágica, en cuyo caso, sólo quedan reducidos a la mitad.', NULL, -1),
(16, 'buena suerte', 'El personaje tiene mucha suerte a la hora de poner en práctica cualquier cosa que se proponga y resulta muy raro que cometa un grave error.', 'Se reduce un punto la cifra requerida para pifiar. En circunstancias normales el personaje pifiará con un 2. Si alcanza la maestría en una habilidad sólo pifiará con un 1.', NULL, -1),
(17, 'inquietante', 'El personaje tiene la capacidad de poner nerviosas a las personas siempre que lo desee. Incluso el individuo más pequeño y enclenque puede inquietar a otros si goza de ventaja. De este modo, podrá desanimar muchas ocasiones violentas en su contra o forzar el consentimiento de personas intimidables.', 'El personaje puede resultar inquietante si lo desea. El alcance de esta ventaja debe de ser interpretado por el Director del Juego.', NULL, -1),
(18, 'apto en un campo', 'El personaje tiene una gran capacidad de aprendizaje en los costes de todo un campo de habilidades secundarias.', 'El coste de desarrollo de un campo de habilidades secundarias se reduce en un punto. Si se da el caso de que la categoria del personaje posee una habilidad secundaria concreta dentro de dicho campo con un coste inferior al del resto de habilidades, este valor también se reducirá.', 'Los costes de desarrollo no pueden reducirse por debajo de 1. Esta ventaja sólo funciona con los costes de las habilidades secundarias.', -2),
(19, 'apto en una materia 1', 'Representa que el personaje tiene una enorme capacidad de aprendizaje en una habilidad secundaria que le permite desarrollarla con muy poco esfuerzo, por debajo incluso de lo que su categoría indica.', 'Esta ventaja reduce un punto el coste de desarrollo de una habilidad secundaria por cada Punto de Creación que se invierta.', 'Los costes de desarrollo no pueden reducirse por debajo de 1. Esta ventaja sólo funciona con los costes de las habilidades secundarias.', -1),
(20, 'apto en una materia 2', 'Representa que el personaje tiene una enorme capacidad de aprendizaje en una habilidad secundaria que le permite desarrollarla con muy poco esfuerzo, por debajo incluso de lo que su categoría indica.', 'Esta ventaja reduce un punto el coste de desarrollo de una habilidad secundaria por cada Punto de Creación que se invierta.', 'Los costes de desarrollo no pueden reducirse por debajo de 1. Esta ventaja sólo funciona con los costes de las habilidades secundarias.', -2),
(21, 'sentidos agudos', 'Los sentidos del personaje están tan desarrollados como los de un animal.', 'Añade un punto a la Percepción del personaje a la hora de realizar controles de características y un bonificador especial de +30 a sus habilidades secundarias de Advertir y Buscar.', NULL, -1),
(22, 'aprendizaje innato 1', 'El personaje tiene una capacidad innata para mejorar en una habilidad secundaria. Sin esforzarse o practicarla, va perfeccionándola poco a poco.', 'Otorga un bono de categoría de +10 por nivel en una habilidad secundaria. Este bono se suma a cualquier otro bonificador innato que pudiera obtener el personaje gracias a su categoría. La inversión de un punto adicional aumenta el bono a +20.', NULL, -1),
(23, 'aprendizaje innato 2', 'El personaje tiene una capacidad innata para mejorar en una habilidad secundaria. Sin esforzarse o practicarla, va perfeccionándola poco a poco.', 'Otorga un bono de categoría de +10 por nivel en una habilidad secundaria. Este bono se suma a cualquier otro bonificador innato que pudiera obtener el personaje gracias a su categoría. La inversión de un punto adicional aumenta el bono a +20.', NULL, -2),
(24, 'aprendizaje innato en un campo 1', 'Igual que en el anterior, salvo que en este caso el personaje mejora en todas las habilidades secundarias que pertenezcan a un campo determinado', 'Otorga un bono de categoría de +5 por nivel a todas las habilidades de un campo. Estos bonificadores se suman a cualquier otro bono innato que pudiera obtener el personaje por su categoría. La inversion de un punto adiconal aumenta el bono a +10.', NULL, -2),
(25, 'aprendizaje innato en un campo 2', 'Igual que en el anterior, salvo que en este caso el personaje mejora en todas las habilidades secundarias que pertenezcan a un campo determinado', 'Otorga un bono de categoría de +5 por nivel a todas las habilidades de un campo. Estos bonificadores se suman a cualquier otro bono innato que pudiera obtener el personaje por su categoría. La inversion de un punto adiconal aumenta el bono a +10.', NULL, -3),
(26, 'conocedor de todas las materias', 'El personaje es un individuo que posee la excepcional habilidad de adaptarse a cualquier necesidad que se le presente y desarrolla conocimientos en todos los campos y materias. No importa lo rara o inusual que sea la habilidad secundaria que requiera utilizar, siempre tendrá algún conocimiento o pericia que le será útil en esa situación.', 'El personaje no aplica nunca el penalizacod de -30 por no haber invertido PD en una habilidad secundaria y tiene un bonificador natural de 10 en todas sus habilidades secundarias, que se suma directamente al bono que le otorgue su característica.', NULL, -2),
(27, 'sueño ligero', 'El personaje permanece parcialmente consciente mientras duerme y es capaz de despertarse al más mínimo ruido o movimiento.', 'El personaje sólo aplica un penalizador de -20 a su habilidad de Advertir mientras duerme.', NULL, -1),
(28, 'reflejos rápidos 1', 'El personaje posee unos reflejos excepcionales que le permiten responder con enorme velocidad ante cualquier situación', 'Otorga un bonificador especial de +25 al turno. Los Puntos de Creación adicionales aumentarán el bono de +45 y a +60 respectivamente.', NULL, -1),
(29, 'reflejos rápidos 2', 'El personaje posee unos reflejos excepcionales que le permiten responder con enorme velocidad ante cualquier situación', 'Otorga un bonificador especial de +25 al turno. Los Puntos de Creación adicionales aumentarán el bono de +45 y a +60 respectivamente.', NULL, -2),
(30, 'reflejos rápidos 3', 'El personaje posee unos reflejos excepcionales que le permiten responder con enorme velocidad ante cualquier situación', 'Otorga un bonificador especial de +25 al turno. Los Puntos de Creación adicionales aumentarán el bono de +45 y a +60 respectivamente.', NULL, -3),
(31, 'inmunidad al dolor y al cansancio', 'El personaje es especialmente resistente a los efectos del dolor y de la fatiga.', 'Los penalizadores provocados por el dolor y el Cansancio se reducen a la mitad', NULL, -1),
(32, 'tamaño no natural', 'El personaje tiene un Tamaño inusual para su Fuerza y Constitución, permitiendo que quien debería ser una colosal masa de músculos sea una persona pequeña o viceversa.', 'El personaje puede aumentar o disminuir hasta cinco punto su Tamaño en el momento de su creación', NULL, -1),
(33, 'afortunado', 'Una persona afortunada es alguien que goza de verdadera suerte. En muchas ocasiones, podrá salir de situaciones difíciles utilizando únicamente su buena estrella.', 'El alcance de esta ventaja debe de ser interpretada por el Director del Juego. En cualquier caso, nunca sufrirá los efectos negativos de una trampa o de un ataque que se determinen mediante el azar.', NULL, -1),
(34, 'armadura natural', 'El personaje tiene una piel extemadamente resistente y unos músculos muy duros, lo suficiente como para que sea muy dificil traspasarlos.', 'Otorga un Tipo de Armadura natural de 2 contra odas las clases de ataques salvo las de energía. Aunque cuenta como una protección, no se aplican penalizadores al turno por emplear capas de armaduras adicionales.', NULL, -1),
(35, 'armadura mística', 'El aura del personaje forma una capa de energía mística a su alrededor que le protege contra los ataques sobrenaturales', 'Otorga un Tipo de Armadura natural de 4 contra los ataques basados en Energía. Aunque cuenta como una armadura, no se aplican penalizadores al turno por emplear capas de protección adicionales.', NULL, -1),
(36, 'Infatigable 1', 'El aguante a la fatiga del personaje es muy superior al que debería permitirle su Constitución', 'Aumenta tres puntos el Cansancio del personaje. Los Puntos de Creación adicionales lo incrementan seis y nueve puntos respectivamente', NULL, -1),
(37, 'Infatigable 2', 'El aguante a la fatiga del personaje es muy superior al que debería permitirle su Constitución', 'Aumenta tres puntos el Cansancio del personaje. Los Puntos de Creación adicionales lo incrementan seis y nueve puntos respectivamente', NULL, -2),
(38, 'Infatigable 3', 'El aguante a la fatiga del personaje es muy superior al que debería permitirle su Constitución', 'Aumenta tres puntos el Cansancio del personaje. Los Puntos de Creación adicionales lo incrementan seis y nueve puntos respectivamente', NULL, -3),
(39, 'ver lo sobrenatural', 'Los ojos del personaje pueden llegar a ver los telares del flujo de las almas y al mismo tiempo percibir la energía de las matrices psíquicas.', 'El personaje ve lo sobrenatural, tanto magia y matrices psíquicas como criaturas espirituales. Por tanto, no aplica el penalizador de cegado en ninguna de dichas situaciones.', NULL, -1),
(40, 'sentido del peligro', 'Dota de un sexto sentido al personaje, que le permite presentir cuando algo peligroso se acerca o le amenaza. No será capaz de detectar el origen o la naturaleza del peligro hasta que este se cierna sobre él, pero sí de intuir su presencia.', 'El personaje no puede ser cogido por sorpresa, salvo por una diferencia de 150 en turno contra su adversario.', NULL, -2),
(41, 'curtido 1', 'El personaje ya ha tenido varias experiencias en el mundo real, de las que ha aprendido grandes lecciones', 'El personaje comienza con 50 puntos de experiencia añadidos. Los Puntos de Creación adicionales aumentan los puntos de experiencia iniciales a 100 y 150, respectivamente. Este aumento permite subir de nivel de modo convencional si se alcanzan los puntos de experiencia necesarios.', NULL, -1),
(42, 'curtido 2', 'El personaje ya ha tenido varias experiencias en el mundo real, de las que ha aprendido grandes lecciones', 'El personaje comienza con 50 puntos de experiencia añadidos. Los Puntos de Creación adicionales aumentan los puntos de experiencia iniciales a 100 y 150, respectivamente. Este aumento permite subir de nivel de modo convencional si se alcanzan los puntos de experiencia necesarios.', NULL, -2),
(43, 'curtido 3', 'El personaje ya ha tenido varias experiencias en el mundo real, de las que ha aprendido grandes lecciones', 'El personaje comienza con 50 puntos de experiencia añadidos. Los Puntos de Creación adicionales aumentan los puntos de experiencia iniciales a 100 y 150, respectivamente. Este aumento permite subir de nivel de modo convencional si se alcanzan los puntos de experiencia necesarios.', NULL, -3),
(44, 'aprendizaje 1', 'El personaje tiene una enorme capacidad de aprendizaje para desarrollar su potencial, y saca siempre el máximo provecho a lo que ha visto o hecho.', 'Obtiene un beneficio adiconal de 3 puntos de experiencia a la cantidad que le otorga el Director de Juego al finalizar cada sesión de juego. Los Puntos de Creación adicionales aumentan el beneficio a 6 y 9 puntos respectivamente.', NULL, -1),
(45, 'aprendizaje 2', 'El personaje tiene una enorme capacidad de aprendizaje para desarrollar su potencial, y saca siempre el máximo provecho a lo que ha visto o hecho.', 'Obtiene un beneficio adiconal de 3 puntos de experiencia a la cantidad que le otorga el Director de Juego al finalizar cada sesión de juego. Los Puntos de Creación adicionales aumentan el beneficio a 6 y 9 puntos respectivamente.', NULL, -2),
(46, 'aprendizaje 3', 'El personaje tiene una enorme capacidad de aprendizaje para desarrollar su potencial, y saca siempre el máximo provecho a lo que ha visto o hecho.', 'Obtiene un beneficio adiconal de 3 puntos de experiencia a la cantidad que le otorga el Director de Juego al finalizar cada sesión de juego. Los Puntos de Creación adicionales aumentan el beneficio a 6 y 9 puntos respectivamente.', NULL, -3),
(47, 'Reducir 2 puntos una característica', 'Uno de los atributos del personaje ha sido desarrollado menos de lo que potencialmente debía', 'Reduce en dos puntos una de las características básicas', 'Esta desventaja sólo puede adquirirse en una ocasión. No es posible disminuir una característica por debajo de 3.', 1),
(48, 'salud enfermiza', 'El personaje tiene una salud terriblemente débil y es propenso a enfermar con facilidad', 'La RE del personaje queda reducida a la mitad.', NULL, 1),
(49, 'Lenta curación', 'Por alguna causa, la capacidad regenerativa del cuerpo del personaje está terriblemente mermada y este se recupera de las heridas que sufre con gran dificultad, incluso mediante medios sobrenaturales.', 'El personaje recupera sólo la mitad de puntos de vida de cualquier cantidad que debiera recobrar, ya sea mediante regeneración normal o medios místicos.', NULL, 1),
(50, 'miopía', 'La vista del personaje esta afectada por un problema que no le deja ver bien. Para él, muchas cosas permanecerán borrosas y tendrá dificultades incluso para leer, por lo que necesitará la ayuda de algún instrumento para suplir su carencia.', 'Aplicará un negativo de -50 a cualquier tirada de habilidad de Advertir o Buscar en la que se emplee la vista y un -3 a cualquier control de Percepción que la requiera. Este penalizador también se aplicará a la puntería. Si consigue unas gafas, el negativo penalizador se reduciría como el Director de Juego considere conveniente.', NULL, 1),
(51, 'vulnerable a los venenos', 'El cuerpo del personaje no es capaz de soportar los venenos, puesto que sus defensas biológicas no están preparadas para combatir ningún tipo de sustancia nociva.', 'La RV del personaje queda reducida a la mitad.', NULL, 1),
(52, 'fácil posesión', 'Aunque su voluntad sea fuerte, el personaje es muy propenso a ser dominado por cualquier entidad con la capacidad de afectar a su mente o alterar su personalidad.', 'El personaje aplica un negativo de -50 a cualquier RP o RM que realice contra algún tipo de dominio o posesión capaz de modificar su conducta.', NULL, 1),
(53, 'vulnerable a la magia', 'Esta desventaja representa que el personaje es my propenso a verse afectado por las energías mágicas', 'La RM del personaje queda reducida a la mitad', NULL, 1),
(54, 'vulnerable al frío o al calor', 'El calor o el frío, a elección del jugador, afectan terriblemente al personaje causándole muchos problemas físicos. Su cuerpo se ve seriamente perjudicado si se pone en contacto con algo muy caliente o frío, al igual que si visita lugares con temperaturas extremas, como volcanes o zonas heladas.', 'El personaje sufre un penalizador de -80 a cualquier Resistencia contra ese elemento y un -30 a toda acción en climas extremos.', NULL, 1),
(55, 'extremidad atrofiada', 'El personaje tiene un serio problema controlando uno de sus miembros. Esta extremidad le tiembla terriblemente en todo momento o deja de responderle en la situación en la que más lo requiera.', 'El personaje aplica un penalizador de -80 a todas las acciones físicas que requieran el uso del miembro atrofiado.', NULL, 1),
(56, 'debilidad física', 'El personaje es excepcionalmente débil ante los daños físicos, por lo que cada vez que recibe una herida crítica tiene serias posibilidades de morir o sufrir daños irreversibles.', 'La RF del personaje queda reducida a la mitad', NULL, 1),
(57, 'aspecto desagradable', 'El personaje tiene terribles deformaciones que vuelven su aspecto muy desagradable a la vista', 'Reduce la apariencia del personaje a 2', 'El personaje tiene que tener como mínimo un 7 en apariencia. Esta característica debe de haber sido generada mediante una tirada, no eligida libremente por el jugador.', 1),
(58, 'desafortunado', 'La desgracia acompaña al personaje allí donde va. Esté donde esté, siempre le pasarán cosas terribles por mucho que se esfuerce por evitarlo.', 'El Director de Juego deberá interpretar el alcance de esta desventaja. En un grupo, alguien desafortunado será siempre el que caiga en la trampa aleatoria y el primero al que ataquen cuando el azar decida quién recibe el primer impacto.', NULL, 1),
(59, 'enfermedad grave', 'El personaje sufre algún tipo de enfermedad degenerativa que acabará matándole. Suele quedarle una media de poco más de un año de vida al empezar la partida, pero el periodo de tiempo puede ser menor o mayor si el Director de Juego lo necesita para encajar con los límites temporales de su campaña. Al contrario de lo que pueda parecer, un personaje con esta desventaja no sólo es perfectamente jugable, sino que precisamente puede tener como objetivo adicional algún medio para curarse.', 'El personaje aplicará un penalizador acumulativo de -10 a toda acción por cada mes que transcurra. El Director de Juego determinará una fecha en secreto, llegada la cual morirá.', NULL, 2),
(60, 'alergia grave', 'El personaje tiene algún tipo de alergia hacia algo, tan grave que, por el mero contacto o inhalación, recibirá una terrible reacción alérgica que perdurará durante horas. Algunos ejemplos de alergias habituales son hacia el metal, al polen, o incluso hacia la luz.', 'Los negativos a toda acción por entrar en contacto con dicha sustancia variarán entre un -40 y -80, dependiendo de la gravedad o del tiempo que se haya permanecido en contacto con dicho elemento.', NULL, 1),
(61, 'sueño profundo', 'Representa una terrible desventaja para alguien cuya vida suele estar en peligro incluso mientras duerme. El personaje tiene un sueño muy profundo y resulta muy difícil que se despierte. Aguantará sin despertarse incluso con un contacto físico ligero, y cuando finalmente lo haga permanecerá aturdido durante vario minutos.', 'El personaje aplicará un penalizador de -200 a cualquier tirada de percepción mientras duerme. Durante los diez asaltos posteriores a su despertar, aplicará un penalizador de -40 a toda acción.', NULL, 1),
(62, 'fobia grave', 'El personaje siente un terrible temor hacia algo, que le obliga a comportarse de manera irracional en su presencia. Algunos buenos ejemplos de fobias conocidas serían la hidrogobia, el miedo al agua, la hemofobia, le miedo a la sangre o la claustrofobia, el miedo a los espacios cerrados. Naturalmente, una fobia un elemento demasiado conceto no debería permitirse y quedará a la discrecion del Director de Juego su fijación exacta.', 'El personaje aplicará el estado de miedo siempre que se encuentre con el objeto de su fobia.', NULL, 1),
(63, 'mala suerte', 'El personaje tiene muy mala suerte a la hora de hacer lo que propone y suele fracasar estrepitosamente mucho más de lo que le gustaría', 'La cigra requerida para pifiar aumenta en dos puntos. En las habilidades normales pifiará con un resultado de 5 y, si es maestro, lo hará con 4.', NULL, 1),
(64, 'mudo', 'De alguna manera, el personaje está privado de la capacidad física de hablar.', 'El personaje no puede hablar', NULL, 1),
(65, 'ciego', 'Por alguna razón el personaje está privado del sentido de la vista, o lo que es lo mismo, está copmletamiente ciego.', 'El personaje no podrá usar ninguna habilidad que requiera ver. Aplicará en todo momento el penalizador de cegado.', NULL, 2),
(66, 'sordo', 'Como su nombre indica, el personaje está completamente sordo, es decir, carece de capacidad auditiva.', 'El personaje no podrá emplear ninguna habilidad que requiera el uso del oído.', NULL, 1),
(67, 'aprendizaje lento 1', 'La habilidad de prendizaje del personaje es mucho más limitada que la de un individuo normal. No significa que sea menos inteligente que el resto, sino que no aprende tanto de sus errores ni saca realmente todo el provecho que puede de sus éxitos.', 'El personaje tiene un penalizador de 4 puntos de experiencia a los otorgados por el Director de Juego al finalizar la sesión. El punto de desventaja adicional aumenta este penalizador a 8.', NULL, 1),
(68, 'aprendizaje lento 2', 'La habilidad de prendizaje del personaje es mucho más limitada que la de un individuo normal. No significa que sea menos inteligente que el resto, sino que no aprende tanto de sus errores ni saca realmente todo el provecho que puede de sus éxitos.', 'El personaje tiene un penalizador de 4 puntos de experiencia a los otorgados por el Director de Juego al finalizar la sesión. El punto de desventaja adicional aumenta este penalizador a 8.', NULL, 2),
(69, 'reacción lenta 1', 'Los reflejos del personaje están poco preparados para responder con velocidad a los acontecimientos', 'El personaje aplicará un penalizador especial de -30 a su turno. El punto de desventaja adicional aumenta este negativo hasta -60.', NULL, 1),
(70, 'reacción lenta 2', 'Los reflejos del personaje están poco preparados para responder con velocidad a los acontecimientos', 'El personaje aplicará un penalizador especial de -30 a su turno. El punto de desventaja adicional aumenta este negativo hasta -60.', NULL, 2),
(71, 'adicción o vicio grave', 'Representa que se tiene una necesidad imperiosa de realizar algún tipo de acción conceta o de consumir una sustancia específica a dirario. Un personaje con esta desventaja hará lo que sea necesario para conseguir satisfacer su vicio, puesto qe en caso contrario empezará a sentirse muy nervioso y a entrar en crisis.', 'El personaje aplicará un penalizador acumulativo de -10 por cada día que transcurra sin satisfacer su vicio.', NULL, 1),
(72, 'vulnerable al dolor', 'El personaje no es capaz de resistir el color físico, que le aterra y perjudica excepcionalmente.', 'Dobla cualquier penalizador causado por el dolor, ya sea producido por críticos o efectos místicos.', NULL, 1),
(73, 'exhausto', 'Un personaje con esta desventaja es muy vulnerable a los efectos del Cansancio. No solo se cansa con mayor facilidad que los demás, sino que sufre especialmente los efectos de la fatiga.', 'Dobla los penalizadores a la acción provocados por la fatiga y resta un punto de Cansancio base del personaje', NULL, 1);


--
-- Volcado de datos para la tabla `Tipo`
--
INSERT INTO  `Animaster`.`Tipo` (
`id_tipo` ,
`nombre`
)
VALUES (
NULL ,  'alimento'
), (
NULL ,  'armaduras'
), (
NULL ,  'armas y escudos'
), (
NULL ,  'arte y decoración'
), (
NULL ,  'cartas'
), (
NULL ,  'útiles varios'
), (
NULL ,  'venenos'
), (
NULL ,  'vestimenta'
), (
NULL ,  'yelmos'
);


--
-- Volcado de datos para la tabla `Categoria`
--
INSERT INTO  `Animaster`.`Categoria` (
`id_categoria` ,
`nombre` ,
`descripcion`
)
VALUES 
(1, 'Guerrero', 'El guerrero es el luchador arquetípico por excelencia. Esta categoría engloba a aquellas personas que han dedicado por completo su vida al combate y son capaces de explotar al máximo su habilidad bélica. Esto les lleva no sólo a dominar el manejo de las armas, sino a, llegado el momento, emplear su energía anímica en la lucha. También tienen facilidad para desarrollar un gran conocimiento en el campo de las tácticas militares y convertirse en cabecillas de ejércitos. Tradicionalmente, los guerreros pueden llegar a trabajar casi de cualquier cosa, desde meros mercenarios a caballeros.'),
(2, 'Guerrero Acróbata', 'Los guerreros acróbatas son luchadores que se han especializado en sacar el máximo provecho a su agilidad y rapidez. Su principal ventaja consiste en aticiparse a los movimientos de sus adversarios y tratar de acabar con ellos antes de que reaccionen. También prefieren esquivar los ataques y estar tan lejos como puedan del lugar donde se da el gople. Se benefician de una gran movilidad, siendo capaces de saltar, caer o correr con una destreza que muy pocos logran igualar. Pueden adoptar cualquier tipo de papel en la sociedad, pero generalmente asumirán profesiones ligadas al combate, como duelista o espadachines.'),
(3, 'Paladín', 'Los paladines son luchadores muy defensivos que combaten apoyándose en ciertas capacidads místicas. Una de sus especialidades consiste en expulsar a los seres sobrenaturales usando sus poderes naturales. Normalmente, muchos se rigen por códigos de conducta basados en normas religiosas o en el honor, aunque no están obligados a ello. Son líderes naturales, capaces de utilizar su carisma y dotes para movilizar a su favor a enormes cantidades de personas, que incluso darán sus vidas por ellos.'),
(4, 'Paladín Oscuro', 'En cierto modo, esta categoría es la opuesta directa al paladín. Es un luchador especializado en el ataque que se apoya en unas limitadas habilidades místicas. Sus principales poderes se basan en el dominio y el control de los seres sobrenaturales, quienes, una vez sometidos a su voluntad, son utilitzados en su beneficio. Tienen grandes capacidades de mando, pero emplean la intimidación y el miedo para subyugar a los demás a sus deseos. Si esto no funciona, persuaden a las personas tratando de conseguir salirse con lo que pretende.'),
(5, 'Maestro en Armas', 'Son luchadores que se han dediado a perfeccionar sus habilidades marciales con todo tipo de armas. Se trata de guerreros natos, los cuales han llevado hasta el límite su capacidad combativa por encima de cualquier otra categoría. Opuestamente a los guerreros convencionales, no emplean ninguna otra habilidad en la lucha más que su maestría en el uso de las armas. En una contienda, ingoran el uso de su energía física y de todo aquello que no sea su propia habilidad marical, pero no por ello dejan de ser los combatientes más hábiles y los más centrados en las verdaderas habilidades marciales. La gran mayoría de caballeros y mercenarios tienen esta categoría.'),
(6, 'Explorador', 'Un explorador es el prototipo tradicional de aventurero. Normalmente, se trata de personas que han sacado el máximo provecho a su capacidad de percibir lo que les rodea y adentrasre donde nadie más sería capaz. Un explorador suele tener siempre sus sentidos pendientes de lo que hay a su alrededor, por lo que es muy complicado cogerle por sorpresa. Es también un rastreador y un superviviente nato, razón por la que tiene grandes conocimientos sobre zonas boscosas o regiones inhóspitas. En la sociedad suele trabajar como cazadores, batidoes o incluso arqueólogos, pero lo más normal es que simplemente se trate de habitantes de territorios apartados donde sus habilidades son necesarias para sobrevivir.'),
(7, 'Sombra', 'Las sombras son luchadores que se mueven en la oscuridad y aprovechan a su favor el entorno. Aunque sus habilidades de combate son excelentes, prefieren acabar con sus enemigos sin darles la oportunidad de responder a su ataques. Para ello, emplean el subterfugio para sorprenderles, o usan otras tácticas más complejas. Incluso si es descubierta, una sombra es capaz de seguir luchando con sus enemigos en igualdad de oportunidades, aunque su resistencia tiende a ser menor que la de otros luchadores. Generalmente ágiles y veloces, prefieren esquivar los ataques en lugar de afrontarlos.'),
(8, 'Ladrón', 'Como sugiere su nombre, un ladrón es un personaje especializado en los campos del sigilo, el robo y la ocultación. Son personas que huyen de los enfrentamientos directos y prefieren confiar en sus habilidades de subterfugio para conseguir lo que desean. Dado que su resistencia física no suele ser demasiado elevada, son muy hábiles huyendo y esquivando golpes cuando son descubiertos. Pueden representar diversos papeles en la sociedad, aunque habitualmente se dedican a la profesión que da nombre a la categoría.'),
(9, 'Asesino', 'Son individuos que se especializan en los campos del subterfugio y la intriga. Se mueven en el anonimato y tratan de que sus víctimas no sean ni siquiera conscientes de qué les ha matado. Emplean técnicas muy refinadas, prefiriendo evitar en todo momento llegar al combate donde son muy vulnerables. Por ello, tras hacer su trabajo, desaparecen de nuevo entre las sombras de las que surgieron. De todas formas, personajes con esta categoria no están necesariamente obligados a representar únicamente el papel de ejecutores dentro de la sociedad, ya que existen muchos otros ámbitos en los que pueden poner en práctica sus excelentes habilidades, como por ejemplo el espionaje.'),
(10, 'Novel', 'Los noveles representan el arquetipo de Sin categoría, o lo que es lo mismo, alguien que no se encuentra dentro de ninguno de los arquetipos que se han explicado hasta el momento. Puede ser cualquier tipo de persona que no tenga una verdadera especialización. Desde campesinos a barcos, pasando por nobles y bufones, el novel es la categoría estándar de Ánima, a la que podrá acceder cualquiera. El novel tiene buenas habilidades en todos los campos, desde la magia al combate, aunque no se especializa en ninguno. Además le resulta excepcionalmente fácil cambiar posteriormente de categoría a la de cualquier otro arquetipo. En muchas ocasiones, cuando un jugador no tenga realmente decidido qué hacer con su personaje, puede empezar como novel y realizar después un cambio de categoría, cuando finalmente encuentre la apropiada.');



--
-- Volcado de datos para la tabla `rama`
--
INSERT INTO `Rama` (`id_rama`, `nombre`) 
VALUES (
NULL, 'Atléticas'), (
NULL, 'Vigor'), (
NULL, 'Perceptivas'), (
NULL, 'Intelectuales'), (
NULL, 'Sociales'), (
NULL, 'Subterfugio'), (
NULL, 'Creativas'), (
NULL, 'Especial');

--
-- Volcado de datos para la tabla `nivel`
--
INSERT INTO `Nivel` (`nivel`, `puntos`, `incr_caracteristica`, `exp_necesaria`, `presencia_base`) 
VALUES 
(NULL, '400', NULL, NULL, '20'),
('1', '600', NULL, NULL, '30'),
('2', '700', '1', '100', '35'),
('3', '800', NULL, '225', '40'),
('4', '900', '1', '375', '45'),
('5', '1000', NULL, '550', '50'),
('6', '1100', '1', '750', '55'),
('7', '1200', NULL, '975', '60'),
('8', '1300', '1', '1225', '65'),
('9', '1400', NULL, '1500', '70'),
('10', '1500', '1', '1800', '75'),
('11', '1600', NULL, '2125', '80'),
('12', '1700', '1', '2475', '85'),
('13', '1800', NULL, '2850', '90'),
('14', '1900', '1', '3250', '95'),
('15', '2000', NULL, '3675', '100'),
('16', '2100', '1', '4125', '105'),
('17', '2200', NULL, '4575', '110'),
('18', '2300', '1', '5025', '115'),
('19', '2400', NULL, '5475', '120'),
('20', '2500', '1', '5925', '125');

--
-- Volcado de datos para la tabla `habilidades_primarias`
--
INSERT INTO `Habilidades_Primarias` (`id_HP`, `nombre`, `caracteristica`) 
VALUES 
(NULL, 'Habilidad Ataque', 'DES'), 
(NULL, 'Habilidad Parada', 'DES'), 
(NULL, 'Habilidad Esquiva', 'AGI'), 
(NULL, 'Llevar Armadura', 'FUE');


--
-- Volcado de datos para la tabla `habilidades_secundarias`
--
INSERT INTO `Habilidades_Secundarias` (`id_HS`, `nombre`, `id_rama`, `caracteristica`) 
VALUES 
(1, 'Acrobacias', '1', 'AGI'), 
(2, 'Atletismo', '1', 'AGI'), 
(3, 'Montar', '1', 'AGI'), 
(4, 'Nadar', '1', 'AGI'), 
(5, 'Trepar', '1', 'AGI'), 
(6, 'Saltar', '1', 'FUE'), 
(7, 'Frialdad', '2', 'VOL'), 
(8, 'P. Fuerza', '2', 'FUE'), 
(9, 'Res. Dolor', '2', 'VOL'), 
(10, 'Advertir', '3', 'PER'), 
(11, 'Buscar', '3', 'PER'), 
(12, 'Rastrear', '3', 'PER'),
(13, 'Animales', '4', 'INT'),
(14, 'Ciencia', '4', 'INT'),
(15, 'Herbolaria', '4', 'INT'),
(16, 'Historia', '4', 'INT'),
(17, 'Medicina', '4', 'INT'),
(18, 'Memorizar', '4', 'INT'),
(19, 'Navegacion', '4', 'INT'),
(20, 'Ocultismo', '4', 'INT'),
(21, 'Tasacion', '4', 'INT'),
(22, 'Ley', '4', 'INT'),
(23, 'Tactica', '4', 'INT'),
(24, 'Estilo', '5', 'POD'),
(25, 'Intimidar', '5', 'VOL'),
(26, 'Liderazgo', '5', 'POD'),
(27, 'Persuasion', '5', 'INT'),
(28, 'Comerciar', '5', 'INT'),
(29, 'Callejeo', '5', 'INT'),
(30, 'Etiqueta', '5', 'INT'),
(31, 'Cerrajeria', '6', 'DES'),
(32, 'Disfraz', '6', 'DES'),
(33, 'Ocultarse', '6', 'PER'),
(34, 'Robo', '6', 'DES'),
(35, 'Sigilo', '6', 'AGI'),
(36, 'Tramperia', '6', 'PER'),
(37, 'Venenos', '6', 'INT'),
(38, 'Arte', '7', 'DES'),
(39, 'Baile', '7', 'AGI'),
(40, 'Forja', '7', 'DES'),
(41, 'T. Manos', '7', 'DES'),
(42, 'Canto', '7', 'VOL'),
(43, 'Runas', '7', 'DES'),
(44, 'Animismo', '7', 'POD'),
(45, 'Alquimia', '7', 'INT'),
(46, 'Especial1', '8', 'DES'),
(47, 'Especial2', '8', 'DES'),
(48, 'Especial3', '8', 'AGI'),
(49, 'Especial4', '8', 'INT');


--
-- Volcado de datos para la tabla `categoria_hp`
--
INSERT INTO `Categoria_HP` (`id_HP`, `id_categoria`, `coste`, `incr_nv`) 
VALUES 
('1', '1', '2', '5'),
('2', '1', '2', '5'),
('3', '1', '2', NULL),
('4', '1', '2', '5'),
('1', '2', '2', '5'),
('2', '2', '3', NULL),
('3', '2', '2', '5'),
('4', '2', '2', NULL),
('1', '3', '2', NULL),
('2', '3', '2', '5'),
('3', '3', '2', NULL),
('4', '3', '2', '10'),
('1', '4', '2', '5'),
('2', '4', '2', NULL),
('3', '4', '2', NULL),
('4', '4', '2', '5'),
('1', '5', '2', '5'),
('2', '5', '2', '5'),
('3', '5', '2', NULL),
('4', '5', '1', '10'),
('1', '6', '2', '5'),
('2', '6', '2', NULL),
('3', '6', '2', NULL),
('4', '6', '2', NULL),
('1', '7', '2', '5'),
('2', '7', '3', NULL),
('3', '7', '2', '5'),
('4', '7', '2', NULL),
('1', '8', '2', NULL),
('2', '8', '3', NULL),
('3', '8', '2', '5'),
('4', '8', '3', NULL),
('1', '9', '2', '5'),
('2', '9', '3', NULL),
('3', '9', '2', NULL),
('4', '9', '3', NULL),
('1', '10', '2', NULL),
('2', '10', '2', NULL),
('3', '10', '2', NULL),
('4', '10', '2', NULL);

--
-- Volcado de datos para la tabla `categoria_hs`
--
INSERT INTO `Categoria_HS` (`id_categoria`, `id_HS`, `coste`, `incr_nv`) 
VALUES 
('1', '1', '2', NULL),
('1', '2', '2', NULL),
('1', '3', '2', NULL),
('1', '4', '2', NULL),
('1', '5', '2', NULL),
('1', '6', '2', NULL),
('1', '7', '2', NULL),
('1', '8', '1', '5'),
('1', '9', '2', NULL),
('1', '10', '2', NULL),
('1', '11', '2', NULL),
('1', '12', '2', NULL),
('1', '13', '3', NULL),
('1', '14', '3', NULL),
('1', '15', '3', NULL),
('1', '16', '3', NULL),
('1', '17', '3', NULL),
('1', '18', '3', NULL),
('1', '19', '3', NULL),
('1', '20', '3', NULL),
('1', '21', '3', NULL),
('1', '22', '3', NULL),
('1', '23', '3', NULL),
('1', '24', '3', NULL),
('1', '25', '3', NULL),
('1', '26', '2', NULL),
('1', '27', '2', NULL),
('1', '28', '2', NULL),
('1', '29', '2', NULL),
('1', '30', '2', NULL),
('1', '31', '2', NULL),
('1', '32', '2', NULL),
('1', '33', '2', NULL),
('1', '34', '2', NULL),
('1', '35', '2', NULL),
('1', '36', '2', NULL),
('1', '37', '2', NULL),
('1', '38', '2', NULL),
('1', '39', '2', NULL),
('1', '40', '2', NULL),
('1', '41', '2', NULL),
('1', '42', '2', NULL),
('1', '43', '2', NULL),
('1', '44', '2', NULL),
('1', '45', '2', NULL),
('1', '46', '2', NULL),
('1', '47', '2', NULL),
('1', '48', '2', NULL),
('1', '49', '2', NULL),


('2', '1', '2', '10'),
('2', '2', '2', '10'),
('2', '3', '2', NULL),
('2', '4', '2', NULL),
('2', '5', '2', NULL),
('2', '6', '2', '10'),
('2', '7', '2', NULL),
('2', '8', '2', NULL),
('2', '9', '2', NULL),
('2', '10', '2', NULL),
('2', '11', '2', NULL),
('2', '12', '2', NULL),
('2', '13', '3', NULL),
('2', '14', '3', NULL),
('2', '15', '3', NULL),
('2', '16', '3', NULL),
('2', '17', '3', NULL),
('2', '18', '3', NULL),
('2', '19', '3', NULL),
('2', '20', '3', NULL),
('2', '21', '3', NULL),
('2', '22', '3', NULL),
('2', '23', '3', NULL),
('2', '24', '2', '10'),
('2', '25', '2', NULL),
('2', '26', '2', NULL),
('2', '27', '2', NULL),
('2', '28', '2', NULL),
('2', '29', '2', NULL),
('2', '30', '2', NULL),
('2', '31', '2', NULL),
('2', '32', '2', NULL),
('2', '33', '2', NULL),
('2', '34', '2', NULL),
('2', '35', '2', NULL),
('2', '36', '2', NULL),
('2', '37', '2', NULL),
('2', '38', '2', NULL),
('2', '39', '2', NULL),
('2', '40', '2', NULL),
('2', '41', '2', '10'),
('2', '42', '2', NULL),
('2', '43', '2', NULL),
('2', '44', '2', NULL),
('2', '45', '2', NULL),
('2', '46', '2', NULL),
('2', '47', '2', NULL),
('2', '48', '2', NULL),
('2', '49', '2', NULL),

('3', '1', '2', NULL),
('3', '2', '2', NULL),
('3', '3', '2', NULL),
('3', '4', '2', NULL),
('3', '5', '2', NULL),
('3', '6', '2', NULL),
('3', '7', '2', '10'),
('3', '8', '2', NULL),
('3', '9', '1', '10'),
('3', '10', '2', NULL),
('3', '11', '2', NULL),
('3', '12', '2', NULL),
('3', '13', '2', NULL),
('3', '14', '2', NULL),
('3', '15', '2', NULL),
('3', '16', '2', NULL),
('3', '17', '2', NULL),
('3', '18', '2', NULL),
('3', '19', '2', NULL),
('3', '20', '2', NULL),
('3', '21', '2', NULL),
('3', '22', '2', NULL),
('3', '23', '2', NULL),
('3', '24', '1', '5'),
('3', '25', '1', NULL),
('3', '26', '1', '10'),
('3', '27', '1', NULL),
('3', '28', '1', NULL),
('3', '29', '1', NULL),
('3', '30', '1', NULL),
('3', '31', '3', NULL),
('3', '32', '3', NULL),
('3', '33', '3', NULL),
('3', '34', '3', NULL),
('3', '35', '3', NULL),
('3', '36', '3', NULL),
('3', '37', '3', NULL),
('3', '38', '2', NULL),
('3', '39', '2', NULL),
('3', '40', '2', NULL),
('3', '41', '2', NULL),
('3', '42', '2', NULL),
('3', '43', '2', NULL),
('3', '44', '2', NULL),
('3', '45', '2', NULL),
('3', '46', '2', NULL),
('3', '47', '2', NULL),
('3', '48', '2', NULL),
('3', '49', '2', NULL),

('4', '1', '2', NULL),
('4', '2', '2', NULL),
('4', '3', '2', NULL),
('4', '4', '2', NULL),
('4', '5', '2', NULL),
('4', '6', '2', NULL),
('4', '7', '1', '5'),
('4', '8', '2', NULL),
('4', '9', '2', '10'),
('4', '10', '2', NULL),
('4', '11', '2', NULL),
('4', '12', '2', NULL),
('4', '13', '2', NULL),
('4', '14', '2', NULL),
('4', '15', '2', NULL),
('4', '16', '2', NULL),
('4', '17', '2', NULL),
('4', '18', '2', NULL),
('4', '19', '2', NULL),
('4', '20', '2', NULL),
('4', '21', '2', NULL),
('4', '22', '2', NULL),
('4', '23', '2', NULL),
('4', '24', '1', '5'),
('4', '25', '1', '10'),
('4', '26', '1', NULL),
('4', '27', '1', '5'),
('4', '28', '1', NULL),
('4', '29', '1', NULL),
('4', '30', '1', NULL),
('4', '31', '2', NULL),
('4', '32', '2', NULL),
('4', '33', '2', NULL),
('4', '34', '2', NULL),
('4', '35', '2', NULL),
('4', '36', '2', NULL),
('4', '37', '2', NULL),
('4', '38', '2', NULL),
('4', '39', '2', NULL),
('4', '40', '2', NULL),
('4', '41', '2', NULL),
('4', '42', '2', NULL),
('4', '43', '2', NULL),
('4', '44', '2', NULL),
('4', '45', '2', NULL),
('4', '46', '2', NULL),
('4', '47', '2', NULL),
('4', '48', '2', NULL),
('4', '49', '2', NULL),

('5', '1', '2', NULL),
('5', '2', '2', NULL),
('5', '3', '2', NULL),
('5', '4', '2', NULL),
('5', '5', '2', NULL),
('5', '6', '2', NULL),
('5', '7', '1', NULL),
('5', '8', '1', '5'),
('5', '9', '1', NULL),
('5', '10', '2', NULL),
('5', '11', '2', NULL),
('5', '12', '2', NULL),
('5', '13', '3', NULL),
('5', '14', '3', NULL),
('5', '15', '3', NULL),
('5', '16', '3', NULL),
('5', '17', '3', NULL),
('5', '18', '3', NULL),
('5', '19', '3', NULL),
('5', '20', '3', NULL),
('5', '21', '3', NULL),
('5', '22', '3', NULL),
('5', '23', '3', NULL),
('5', '24', '2', NULL),
('5', '25', '2', NULL),
('5', '26', '2', NULL),
('5', '27', '2', NULL),
('5', '28', '2', NULL),
('5', '29', '2', NULL),
('5', '30', '2', NULL),
('5', '31', '3', NULL),
('5', '32', '3', NULL),
('5', '33', '3', NULL),
('5', '34', '3', NULL),
('5', '35', '3', NULL),
('5', '36', '3', NULL),
('5', '37', '3', NULL),
('5', '38', '2', NULL),
('5', '39', '2', NULL),
('5', '40', '2', NULL),
('5', '41', '2', NULL),
('5', '42', '2', NULL),
('5', '43', '2', NULL),
('5', '44', '2', NULL),
('5', '45', '2', NULL),
('5', '46', '2', NULL),
('5', '47', '2', NULL),
('5', '48', '2', NULL),
('5', '49', '2', NULL),

('6', '1', '2', NULL),
('6', '2', '2', NULL),
('6', '3', '2', NULL),
('6', '4', '2', NULL),
('6', '5', '2', NULL),
('6', '6', '2', NULL),
('6', '7', '3', NULL),
('6', '8', '3', NULL),
('6', '9', '3', NULL),
('6', '10', '1', '10'),
('6', '11', '1', '10'),
('6', '12', '1', '10'),
('6', '13', '1', '5'),
('6', '14', '3', NULL),
('6', '15', '2', '5'),
('6', '16', '3', NULL),
('6', '17', '2', NULL),
('6', '18', '3', NULL),
('6', '19', '3', NULL),
('6', '20', '3', NULL),
('6', '21', '3', NULL),
('6', '22', '3', NULL),
('6', '23', '3', NULL),
('6', '24', '2', NULL),
('6', '25', '2', NULL),
('6', '26', '2', NULL),
('6', '27', '2', NULL),
('6', '28', '2', NULL),
('6', '29', '2', NULL),
('6', '30', '2', NULL),
('6', '31', '2', NULL),
('6', '32', '2', NULL),
('6', '33', '2', NULL),
('6', '34', '2', NULL),
('6', '35', '2', NULL),
('6', '36', '1', '5'),
('6', '37', '2', NULL),
('6', '38', '2', NULL),
('6', '39', '2', NULL),
('6', '40', '2', NULL),
('6', '41', '2', NULL),
('6', '42', '2', NULL),
('6', '43', '2', NULL),
('6', '44', '2', NULL),
('6', '45', '2', NULL),
('6', '46', '2', NULL),
('6', '47', '2', NULL),
('6', '48', '2', NULL),
('6', '49', '2', NULL),

('7', '1', '2', NULL),
('7', '2', '2', NULL),
('7', '3', '2', NULL),
('7', '4', '2', NULL),
('7', '5', '2', NULL),
('7', '6', '2', NULL),
('7', '7', '2', NULL),
('7', '8', '2', NULL),
('7', '9', '2', NULL),
('7', '10', '2', '10'),
('7', '11', '2', '10'),
('7', '12', '2', NULL),
('7', '13', '3', NULL),
('7', '14', '3', NULL),
('7', '15', '3', NULL),
('7', '16', '3', NULL),
('7', '17', '3', NULL),
('7', '18', '3', NULL),
('7', '19', '3', NULL),
('7', '20', '3', NULL),
('7', '21', '3', NULL),
('7', '22', '3', NULL),
('7', '23', '3', NULL),
('7', '24', '2', NULL),
('7', '25', '2', NULL),
('7', '26', '2', NULL),
('7', '27', '2', NULL),
('7', '28', '2', NULL),
('7', '29', '2', NULL),
('7', '30', '2', NULL),
('7', '31', '2', NULL),
('7', '32', '2', NULL),
('7', '33', '2', '10'),
('7', '34', '2', NULL),
('7', '35', '2', '10'),
('7', '36', '2', NULL),
('7', '37', '2', NULL),
('7', '38', '2', NULL),
('7', '39', '2', NULL),
('7', '40', '2', NULL),
('7', '41', '2', NULL),
('7', '42', '2', NULL),
('7', '43', '2', NULL),
('7', '44', '2', NULL),
('7', '45', '2', NULL),
('7', '46', '2', NULL),
('7', '47', '2', NULL),
('7', '48', '2', NULL),
('7', '49', '2', NULL),

('8', '1', '1', NULL),
('8', '2', '1', NULL),
('8', '3', '1', NULL),
('8', '4', '1', NULL),
('8', '5', '1', NULL),
('8', '6', '1', NULL),
('8', '7', '3', NULL),
('8', '8', '3', NULL),
('8', '9', '3', NULL),
('8', '10', '2', '5'),
('8', '11', '2', '5'),
('8', '12', '2', NULL),
('8', '13', '3', NULL),
('8', '14', '3', NULL),
('8', '15', '3', NULL),
('8', '16', '3', NULL),
('8', '17', '3', NULL),
('8', '18', '3', NULL),
('8', '19', '3', NULL),
('8', '20', '3', NULL),
('8', '21', '1', NULL),
('8', '22', '3', NULL),
('8', '23', '3', NULL),
('8', '24', '2', NULL),
('8', '25', '2', NULL),
('8', '26', '2', NULL),
('8', '27', '2', NULL),
('8', '28', '2', NULL),
('8', '29', '2', NULL),
('8', '30', '2', NULL),
('8', '31', '1', NULL),
('8', '32', '1', NULL),
('8', '33', '1', '5'),
('8', '34', '1', '10'),
('8', '35', '1', '5'),
('8', '36', '1', '5'),
('8', '37', '1', NULL),
('8', '38', '2', NULL),
('8', '39', '2', NULL),
('8', '40', '2', NULL),
('8', '41', '2', '5'),
('8', '42', '2', NULL),
('8', '43', '2', NULL),
('8', '44', '2', NULL),
('8', '45', '2', NULL),
('8', '46', '2', NULL),
('8', '47', '2', NULL),
('8', '48', '2', NULL),
('8', '49', '2', NULL),

('9', '1', '2', NULL),
('9', '2', '2', NULL),
('9', '3', '2', NULL),
('9', '4', '2', NULL),
('9', '5', '2', NULL),
('9', '6', '2', NULL),
('9', '7', '2', '10'),
('9', '8', '3', NULL),
('9', '9', '3', NULL),
('9', '10', '1', '10'),
('9', '11', '1', '10'),
('9', '12', '1', NULL),
('9', '13', '3', NULL),
('9', '14', '3', NULL),
('9', '15', '3', NULL),
('9', '16', '3', NULL),
('9', '17', '3', NULL),
('9', '18', '2', NULL),
('9', '19', '3', NULL),
('9', '20', '3', NULL),
('9', '21', '3', NULL),
('9', '22', '3', NULL),
('9', '23', '3', NULL),
('9', '24', '2', NULL),
('9', '25', '2', NULL),
('9', '26', '2', NULL),
('9', '27', '2', NULL),
('9', '28', '2', NULL),
('9', '29', '2', NULL),
('9', '30', '2', NULL),
('9', '31', '2', NULL),
('9', '32', '2', NULL),
('9', '33', '2', '10'),
('9', '34', '2', NULL),
('9', '35', '1', '10'),
('9', '36', '2', '10'),
('9', '37', '2', '10'),
('9', '38', '2', NULL),
('9', '39', '2', NULL),
('9', '40', '2', NULL),
('9', '41', '2', NULL),
('9', '42', '2', NULL),
('9', '43', '2', NULL),
('9', '44', '2', NULL),
('9', '45', '2', NULL),
('9', '46', '2', NULL),
('9', '47', '2', NULL),
('9', '48', '2', NULL),
('9', '49', '2', NULL),

('10', '1', '2', NULL),
('10', '2', '2', NULL),
('10', '3', '2', NULL),
('10', '4', '2', NULL),
('10', '5', '2', NULL),
('10', '6', '2', NULL),
('10', '7', '2', NULL),
('10', '8', '2', NULL),
('10', '9', '2', NULL),
('10', '10', '2', NULL),
('10', '11', '2', NULL),
('10', '12', '2', NULL),
('10', '13', '2', NULL),
('10', '14', '2', NULL),
('10', '15', '2', NULL),
('10', '16', '2', NULL),
('10', '17', '2', NULL),
('10', '18', '2', NULL),
('10', '19', '2', NULL),
('10', '20', '2', NULL),
('10', '21', '2', NULL),
('10', '22', '2', NULL),
('10', '23', '2', NULL),
('10', '24', '2', NULL),
('10', '25', '2', NULL),
('10', '26', '2', NULL),
('10', '27', '2', NULL),
('10', '28', '2', NULL),
('10', '29', '2', NULL),
('10', '30', '2', NULL),
('10', '31', '2', NULL),
('10', '32', '2', NULL),
('10', '33', '2', NULL),
('10', '34', '2', NULL),
('10', '35', '2', NULL),
('10', '36', '2', NULL),
('10', '37', '2', NULL),
('10', '38', '2', NULL),
('10', '39', '2', NULL),
('10', '40', '2', NULL),
('10', '41', '2', NULL),
('10', '42', '2', NULL),
('10', '43', '2', NULL),
('10', '44', '2', NULL),
('10', '45', '2', NULL),
('10', '46', '2', NULL),
('10', '47', '2', NULL),
('10', '48', '2', NULL),
('10', '49', '2', NULL);




--
-- Volcado de datos para la tabla `caracteristica`
--
INSERT INTO `Caracteristica` (`id_caracteristica`, `nombre`) VALUES
(1, 'Daño'),
(2, 'Turno'),
(3, 'FUE Req.'),
(4, 'Crítico 1'),
(5, 'Crítico 2'),
(6, 'Tipo de arma'),
(7, 'Especial'),
(8, 'Enterza'),
(9, 'Rotura'),
(10, 'Presencia'),
(11, 'Tipo'),
(12, 'Cadencia de Fuego'),
(13, 'Recarga'),
(14, 'Alcance'),
(15, 'Requerimiento de Armadura'),
(16, 'Penalizador natural'),
(17, 'Restricción al movimiento'),
(18, 'Localización'),
(19, 'Classe'),
(20, 'TA_FIL'),
(21, 'Penalización a la percepción'),
(22, 'Dureza');



--
-- Volcado de datos para la tabla `objeto`
--
INSERT INTO `Objeto` (`id_objeto`, `nombre`, `descripcion`, `peso`, `precio`, `public`, `disponibilidad`, `calidad`, `id_tipo`) 
VALUES
(1, 'Oro', 'Moneda de oro', 0.0, 1000, 'true', NULL, 0, 6),
(2, 'Plata', 'Moneda de plata', 0.0, 10, 'true', NULL, 0, 6),
(3, 'Bronce', 'Moneda de bronce', 0.0, 1, 'true', NULL, 0, 6),
(4, 'Alabarda', '', 3, 12000, 'true', NULL, 0, 3),
(5, 'Arpón', '', 2, 50000, 'true', NULL, 0, 3),
(6, 'Cadena', '', 2, 2000, 'true', NULL, 0, 3),
(7, 'Cestus', '', 0.5, 3000, 'true', NULL, 0, 3),
(8, 'Cimitarra', '', 1, 10000, 'true', NULL, 0, 3),
(9, 'Daga', '', 0.5, 500, 'true', NULL, 0, 3),
(10, 'Daga de parada', '', 0.6, 10000, 'true', NULL, 0, 3),
(11, 'Espada ancha', '', 1.5, 10000, 'true', NULL, 0, 3),
(12, 'Espada bastarda', '', 2, 20000, 'true', NULL, 0, 3),
(13, 'Espada corta', '', 0.8, 2000, 'true', NULL, 0, 3),
(14, 'Espada larga', '', 1.4, 5000, 'true', NULL, 0, 3),
(15, 'Estilete', '', 0.4, 600, 'true', NULL, 0, 3),
(16, 'Acolchada', '', 3, 1000, 'true', NULL, 0, 2),
(17, 'Anillas', '', 9, 50000, 'true', NULL, 0, 2),
(18, 'Completa', '', 20, 400000, 'true', NULL, 0, 2),
(19, 'Completa de cuero', '', 7, 5000, 'true', NULL, 0, 2),
(20, 'Completa de campaña', '', 25, 800000, 'true', NULL, 0, 2),
(21, 'Completa pesada', '', 30, 700000, 'true', NULL, 0, 2),
(22, 'Cota de cuero', '', 3, 1000, 'true', NULL, 0, 2),
(23, 'Cuero endurecido', '', 4, 15000, 'true', NULL, 0, 2),
(24, 'Cuero tachonado', '', 4.5, 25000, 'true', NULL, 0, 2),
(25, 'Escamas', '', 9, 120000, 'true', NULL, 0, 2),
(26, 'Gabardina', '', 1.5, 50, 'true', NULL, 0, 2),
(27, 'Mallas', '', 13, 70000, 'true', NULL, 0, 2),
(28, 'Peto', '', 4, 40000, 'true', NULL, 0, 2),
(29, 'Piel', '', 2, 5000, 'true', NULL, 0, 2),
(30, 'Piezas', '', 6, 40000, 'true', NULL, 0, 2),
(31, 'Placas', '', 18, 300000, 'true', NULL, 0, 2),
(32, 'Semicompleta', '', 13, 100000, 'true', NULL, 0, 2);

--
-- Volcado de datos para la tabla `objeto_caracteristica`
--
INSERT INTO `Objeto_Caracteristica` (`id_caracteristica`, `id_objeto`, `valor`) 
VALUES 
(1, 4, '60'),
(2, 4, '-15'),
(3, 4, '6 / 11'),
(4, 4, 'FIL'),
(5, 4, 'CON'),
(6, 4, 'Asta / Mandoble'),
(7, 4, 'A dos manos'),
(8, 4, '15'),
(9, 4, '4'),
(10, 4, '20'),
(11, 4, NULL),
(12, 4, NULL),
(13, 4, NULL),
(14, 4, NULL),
(15, 4, NULL),
(16, 4, NULL),
(17, 4, NULL),
(18, 4, NULL),
(19, 4, NULL),
(20, 4, NULL),
(21, 4, NULL),
(22, 4, NULL),

(1, 5, '35'),
(2, 5, '-5'),
(3, 5, '5'),
(4, 5, 'PEN'),
(5, 5, ''),
(6, 5, 'Asta'),
(7, 5, 'A una o a dos manos, Lanzable'),
(8, 5, '11'),
(9, 5, NULL),
(10, 5, '15'),
(11, 5, NULL),
(12, 5, NULL),
(13, 5, NULL),
(14, 5, NULL),
(15, 5, NULL),
(16, 5, NULL),
(17, 5, NULL),
(18, 5, NULL),
(19, 5, NULL),
(20, 5, NULL),
(21, 5, NULL),
(22, 5, NULL),

(1, 6, '35'),
(2, 6, NULL),
(3, 6, '6'),
(4, 6, 'CON'),
(5, 6, NULL),
(6, 6, 'Cuerda'),
(7, 6, 'Compleja, Presa(Fuerza 8)'),
(8, 6, '13'),
(9, 6, '2'),
(10, 6, '15'),
(11, 6, NULL),
(12, 6, NULL),
(13, 6, NULL),
(14, 6, NULL),
(15, 6, NULL),
(16, 6, NULL),
(17, 6, NULL),
(18, 6, NULL),
(19, 6, NULL),
(20, 6, NULL),
(21, 6, NULL),
(22, 6, NULL),

(1, 7, '25'),
(2, 7, '10'),
(3, 7, '3'),
(4, 7, 'PEN'),
(5, 7, 'FIL'),
(6, 7, 'Arma corta'),
(7, 7, NULL),
(8, 7, '11'),
(9, 7, '-2'),
(10, 7, '15'),
(11, 7, NULL),
(12, 7, NULL),
(13, 7, NULL),
(14, 7, NULL),
(15, 7, NULL),
(16, 7, NULL),
(17, 7, NULL),
(18, 7, NULL),
(19, 7, NULL),
(20, 7, NULL),
(21, 7, NULL),
(22, 7, NULL),

(1, 8, '50'),
(2, 8, '-5'),
(3, 8, '5'),
(4, 8, 'FIL'),
(5, 8, NULL),
(6, 8, 'Espada'),
(7, 8, NULL),
(8, 8, '13'),
(9, 8, '4'),
(10, 8, '20'),
(11, 8, NULL),
(12, 8, NULL),
(13, 8, NULL),
(14, 8, NULL),
(15, 8, NULL),
(16, 8, NULL),
(17, 8, NULL),
(18, 8, NULL),
(19, 8, NULL),
(20, 8, NULL),
(21, 8, NULL),
(22, 8, NULL),

(1, 9, '30'),
(2, 9, '20'),
(3, 9, '3'),
(4, 9, 'PEN'),
(5, 9, 'FIL'),
(6, 9, 'Arma corta'),
(7, 9, 'Lanzable, Precisa'),
(8, 9, '10'),
(9, 9, '-2'),
(10, 9, '15'),
(11, 9, NULL),
(12, 9, NULL),
(13, 9, NULL),
(14, 9, NULL),
(15, 9, NULL),
(16, 9, NULL),
(17, 9, NULL),
(18, 9, NULL),
(19, 9, NULL),
(20, 9, NULL),
(21, 9, NULL),
(22, 9, NULL),

(1, 10, '30'),
(2, 10, '15'),
(3, 10, '3'),
(4, 10, 'PEN'),
(5, 10, 'FIL'),
(6, 10, 'Arma corta'),
(7, 10, 'Lanzable, Traba el arma, Precisa'),
(8, 10, '12'),
(9, 10, NULL),
(10, 10, '20'),
(11, 10, NULL),
(12, 10, NULL),
(13, 10, NULL),
(14, 10, NULL),
(15, 10, NULL),
(16, 10, NULL),
(17, 10, NULL),
(18, 10, NULL),
(19, 10, NULL),
(20, 10, NULL),
(21, 10, NULL),
(22, 10, NULL),

(1, 11, '55'),
(2, 11, '-5'),
(3, 11, '5'),
(4, 11, 'FIL'),
(5, 11, NULL),
(6, 11, 'Espada'),
(7, 11, NULL),
(8, 11, '15'),
(9, 11, '3'),
(10, 11, '25'),
(11, 11, NULL),
(12, 11, NULL),
(13, 11, NULL),
(14, 11, NULL),
(15, 11, NULL),
(16, 11, NULL),
(17, 11, NULL),
(18, 11, NULL),
(19, 11, NULL),
(20, 11, NULL),
(21, 11, NULL),
(22, 11, NULL),

(1, 12, '70'),
(2, 12, '-30'),
(3, 12, '7 / 9'),
(4, 12, 'FIL'),
(5, 12, 'CON'),
(6, 12, 'Espada / Mandoble'),
(7, 12, NULL),
(8, 12, '15'),
(9, 12, '5'),
(10, 12, '25'),
(11, 12, NULL),
(12, 12, NULL),
(13, 12, NULL),
(14, 12, NULL),
(15, 12, NULL),
(16, 12, NULL),
(17, 12, NULL),
(18, 12, NULL),
(19, 12, NULL),
(20, 12, NULL),
(21, 12, NULL),
(22, 12, NULL),

(1, 13, '40'),
(2, 13, '15'),
(3, 13, '4'),
(4, 13, 'PEN'),
(5, 13, 'FIL'),
(6, 13, 'arma corta'),
(7, 13, 'Precisa'),
(8, 13, '12'),
(9, 13, '1'),
(10, 13, '20'),
(11, 13, NULL),
(12, 13, NULL),
(13, 13, NULL),
(14, 13, NULL),
(15, 13, NULL),
(16, 13, NULL),
(17, 13, NULL),
(18, 13, NULL),
(19, 13, NULL),
(20, 13, NULL),
(21, 13, NULL),
(22, 13, NULL),

(1, 14, '50'),
(2, 14, NULL),
(3, 14, '6'),
(4, 14, 'FIL'),
(5, 14, NULL),
(6, 14, 'Espada'),
(7, 14, NULL),
(8, 14, '13'),
(9, 14, '3'),
(10, 14, '25'),
(11, 14, NULL),
(12, 14, NULL),
(13, 14, NULL),
(14, 14, NULL),
(15, 14, NULL),
(16, 14, NULL),
(17, 14, NULL),
(18, 14, NULL),
(19, 14, NULL),
(20, 14, NULL),
(21, 14, NULL),
(22, 14, NULL),

(1, 15, '25'),
(2, 15, '20'),
(3, 15, '3'),
(4, 15, 'PEN'),
(5, 15, NULL),
(6, 15, 'Arma corta'),
(7, 15, 'Lanzable, precisa'),
(8, 15, '8'),
(9, 15, '-3'),
(10, 15, '15'),
(11, 15, NULL),
(12, 15, NULL),
(13, 15, NULL),
(14, 15, NULL),
(15, 15, NULL),
(16, 15, NULL),
(17, 15, NULL),
(18, 15, NULL),
(19, 15, NULL),
(20, 15, NULL),
(21, 15, NULL),
(22, 15, NULL),

(1, 16, NULL),
(2, 16, NULL),
(3, 16, NULL),
(4, 16, NULL),
(5, 16, NULL),
(6, 16, NULL),
(7, 16, NULL),
(8, 16, '10'),
(9, 16, NULL),
(10, 16, '25'),
(11, 16, NULL),
(12, 16, NULL),
(13, 16, NULL),
(14, 16, NULL),
(15, 16, NULL),
(16, 16, '-5'),
(17, 16, NULL),
(18, 16, 'Camisola'),
(19, 16, 'Blanda'),
(20, 16, '1'),
(21, 16, NULL),
(22, 16, NULL),

(1, 17, NULL),
(2, 17, NULL),
(3, 17, NULL),
(4, 17, NULL),
(5, 17, NULL),
(6, 17, NULL),
(7, 17, NULL),
(8, 17, '15'),
(9, 17, NULL),
(10, 17, '30'),
(11, 17, NULL),
(12, 17, NULL),
(13, 17, NULL),
(14, 17, NULL),
(15, 17, '60'),
(16, 17, '-20'),
(17, 17, '2'),
(18, 17, 'Camisola'),
(19, 17, 'Blanda'),
(20, 17, '4'),
(21, 17, NULL),
(22, 17, NULL);



INSERT INTO `Habilidades_Esenciales` (`id_habilidad`, `nombre`, `coste`, `gnosis`) 
VALUES
(1, 'Resistencia al cansancio', -10,0),
(2, 'Sentido agudizado', -10,0),
(3, 'Afinidad', -20,5),
(4, 'Características físicas sobrehumanas', -20,0),
(5, 'Características anímicas sobrehumanas', -20,5),
(6, 'Características físicas sobrenaturales', -40,20),
(7, 'Características anímicas sobrenaturales', -40,20),
(8, 'Características físicas divinas', -80,30),
(9, 'Características anímicas divinas', -80,35),
(10, 'Atributo incrementado +1', -20,0),
(11, 'Atributo incrementado +2', -40,5),
(12, 'Atributo incrementado +3', -60,15),
(13, 'Tamaño innatural', -10,0),
(14, 'Ambidiestro', -30,0),
(15, 'Inhumanidad', -10,0),
(16, 'Zen', -20,25),
(17, 'Respiración acuática', -10,0),
(18, 'Sin inconsciencia', -10,5),
(19, 'Incansable', -20,15),
(20, 'No respira', -10,15),
(21, 'No se alimenta', -10,15),
(22, 'No duerme', -10,15),
(23, 'Inmune a venenos naturales', -20,20),
(24, 'Inmune a enfermedades naturales', -10,20),
(25, 'Inmune a fenómenos climáticos', -10,15),
(26, 'Exención física', -50,20),
(27, 'Inmunidad natural a un elemento Mitad de daño', -10,20),
(28, 'Inmunidad natural a un elemento Inmunidad Completa', -30,25),
(29, 'Inmunidad Psicológica', -20,10),

(30, 'Vicio racial', 10,0),
(31, 'Miembros atrofiados', 20,0),
(32, 'Miedo racial', 10,10),
(33, 'Terror racial', 20,10),
(34, 'Carencia de un sentido', 10,0),
(35, 'Ciego', 20,0),
(36, 'Necesidad física', 10,0),
(37, 'Necesidad extrema', 20,10),
(38, 'Vulnerable a un elemento 50% más de daño', 10,20),
(39, 'Vulnerable a un elemento doble de daño', 20,20),
(40, 'Vulnerable a un tipo de daño', 20,10);









