CREATE DATABASE  IF NOT EXISTS `sevg` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `sevg`;
-- MySQL dump 10.13  Distrib 5.6.24, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: sevg
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

--
-- Table structure for table `caracter_evento`
--

DROP TABLE IF EXISTS `caracter_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caracter_evento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caracter_evento`
--

LOCK TABLES `caracter_evento` WRITE;
/*!40000 ALTER TABLE `caracter_evento` DISABLE KEYS */;
INSERT INTO `caracter_evento` VALUES (1,'publico','activado'),(2,'privado','activado'),(3,'evento con nuo','activado'),(4,'evento por funciones','activado');
/*!40000 ALTER TABLE `caracter_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caracterizacion_publico_participa`
--

DROP TABLE IF EXISTS `caracterizacion_publico_participa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caracterizacion_publico_participa` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caracterizacion_publico_participa`
--

LOCK TABLES `caracterizacion_publico_participa` WRITE;
/*!40000 ALTER TABLE `caracterizacion_publico_participa` DISABLE KEYS */;
INSERT INTO `caracterizacion_publico_participa` VALUES (1,'niños','activado'),(2,'jovenes','activado'),(3,'adultos','activado'),(4,'adulto mayor','activado'),(5,'discapacitado','activado'),(6,'lgbti','activado');
/*!40000 ALTER TABLE `caracterizacion_publico_participa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'coordinador general del evento','activado'),(2,'coordinador equipo (empresa) logistica','activado'),(3,'coordinador de la logistica en el evento','activado'),(4,'coordinador del organismo de socorro en el si','activado'),(5,'coordinador de primeros auxilios o aph','activado'),(6,'coordinador de comunicaciones y/o relaciones ','activado');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_usuario`
--

DROP TABLE IF EXISTS `cuenta_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta_usuario` (
  `Id_Cuenta_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Cuenta_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_usuario`
--

LOCK TABLES `cuenta_usuario` WRITE;
/*!40000 ALTER TABLE `cuenta_usuario` DISABLE KEYS */;
INSERT INTO `cuenta_usuario` VALUES (1,'other@yahoo.com','3887','usuario','activado'),(2,'yo@yahoo.com','000','usuario','activado'),(3,'admin@garza.com','123','administrador','activado'),(4,'other@google.com','123456','usuario','activado'),(5,'luisa@cano.edu.co','177475859','usuario','activado');
/*!40000 ALTER TABLE `cuenta_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_caracterizacion_publico_participa_evento`
--

DROP TABLE IF EXISTS `detalle_caracterizacion_publico_participa_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_caracterizacion_publico_participa_evento` (
  `Id_Evento` int(11) NOT NULL,
  `Id_Caracterizacion_Publico_Participa` int(11) NOT NULL,
  KEY `fk_EVENTO_has_CARACTERIZACION_PUBLICO_PARTICIPA_CARACTERIZA_idx` (`Id_Caracterizacion_Publico_Participa`),
  KEY `fk_EVENTO_has_CARACTERIZACION_PUBLICO_PARTICIPA_EVENTO1_idx` (`Id_Evento`),
  CONSTRAINT `fk_EVENTO_has_CARACTERIZACION_PUBLICO_PARTICIPA_CARACTERIZACI1` FOREIGN KEY (`Id_Caracterizacion_Publico_Participa`) REFERENCES `caracterizacion_publico_participa` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENTO_has_CARACTERIZACION_PUBLICO_PARTICIPA_EVENTO1` FOREIGN KEY (`Id_Evento`) REFERENCES `evento` (`Id_Evento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_caracterizacion_publico_participa_evento`
--

LOCK TABLES `detalle_caracterizacion_publico_participa_evento` WRITE;
/*!40000 ALTER TABLE `detalle_caracterizacion_publico_participa_evento` DISABLE KEYS */;
INSERT INTO `detalle_caracterizacion_publico_participa_evento` VALUES (2,1),(2,4),(2,5),(1,1),(1,2),(1,3),(1,4),(1,5);
/*!40000 ALTER TABLE `detalle_caracterizacion_publico_participa_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_cargo_persona_empresa_evento`
--

DROP TABLE IF EXISTS `detalle_cargo_persona_empresa_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_cargo_persona_empresa_evento` (
  `Id_Cargo` int(11) NOT NULL,
  `Id_Evento` int(11) NOT NULL,
  `Id_Personas_Involucradas` int(11) NOT NULL,
  KEY `fk_CARGOS_has_PERSONAS_INVOLUCRADAS_TELEFONO_CARGOS1_idx` (`Id_Cargo`),
  KEY `fk_CARGOS_has_PERSONAS_INVOLUCRADAS_TELEFONO_EVENTO1_idx` (`Id_Evento`),
  KEY `fk_DETALLE_CARGOS_PERSONAS_INVOLUCRADAS_PERSONAS_INVOLUCRAD_idx` (`Id_Personas_Involucradas`),
  CONSTRAINT `fk_CARGOS_has_PERSONAS_INVOLUCRADAS_TELEFONO_CARGOS1` FOREIGN KEY (`Id_Cargo`) REFERENCES `cargo` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_CARGOS_has_PERSONAS_INVOLUCRADAS_TELEFONO_EVENTO1` FOREIGN KEY (`Id_Evento`) REFERENCES `evento` (`Id_Evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_DETALLE_CARGOS_PERSONAS_INVOLUCRADAS_PERSONAS_INVOLUCRADAS1` FOREIGN KEY (`Id_Personas_Involucradas`) REFERENCES `persona_empresa_involucrada` (`Id_Personas_Involucradas`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_cargo_persona_empresa_evento`
--

LOCK TABLES `detalle_cargo_persona_empresa_evento` WRITE;
/*!40000 ALTER TABLE `detalle_cargo_persona_empresa_evento` DISABLE KEYS */;
INSERT INTO `detalle_cargo_persona_empresa_evento` VALUES (3,1,1);
/*!40000 ALTER TABLE `detalle_cargo_persona_empresa_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_herramienta_evento`
--

DROP TABLE IF EXISTS `detalle_herramienta_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_herramienta_evento` (
  `Id_Evento` int(11) NOT NULL,
  `Id_Herramienta` int(11) NOT NULL,
  KEY `fk_tbl_Detalle_Evento_Utensilios_Evento1_idx` (`Id_Evento`),
  KEY `fk_Detalle_Evento_Utensilios_Utensilios1_idx` (`Id_Herramienta`),
  CONSTRAINT `fk_Detalle_Evento_Utensilios_Utensilios1` FOREIGN KEY (`Id_Herramienta`) REFERENCES `herramienta` (`Id_Herramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_Detalle_Evento_Utensilios_Evento1` FOREIGN KEY (`Id_Evento`) REFERENCES `evento` (`Id_Evento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_herramienta_evento`
--

LOCK TABLES `detalle_herramienta_evento` WRITE;
/*!40000 ALTER TABLE `detalle_herramienta_evento` DISABLE KEYS */;
INSERT INTO `detalle_herramienta_evento` VALUES (2,2),(1,1),(1,2);
/*!40000 ALTER TABLE `detalle_herramienta_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_medicamento_utensilio_evento`
--

DROP TABLE IF EXISTS `detalle_medicamento_utensilio_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_medicamento_utensilio_evento` (
  `Id_Evento` int(11) NOT NULL,
  `Id_Medicamento` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  KEY `fk_Detalle_Eventos_Medicamentos_Evento1_idx` (`Id_Evento`),
  KEY `fk_Detalle_Eventos_Medicamentos_Medicamento1_idx` (`Id_Medicamento`),
  CONSTRAINT `fk_Detalle_Eventos_Medicamentos_Evento1` FOREIGN KEY (`Id_Evento`) REFERENCES `evento` (`Id_Evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Detalle_Eventos_Medicamentos_Medicamento1` FOREIGN KEY (`Id_Medicamento`) REFERENCES `medicamento_utensilio` (`Id_Medicamento`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_medicamento_utensilio_evento`
--

LOCK TABLES `detalle_medicamento_utensilio_evento` WRITE;
/*!40000 ALTER TABLE `detalle_medicamento_utensilio_evento` DISABLE KEYS */;
INSERT INTO `detalle_medicamento_utensilio_evento` VALUES (1,2,3);
/*!40000 ALTER TABLE `detalle_medicamento_utensilio_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_perfil_evento`
--

DROP TABLE IF EXISTS `detalle_perfil_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_perfil_evento` (
  `Id_Evento` int(11) NOT NULL,
  `Id_Perfil` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  KEY `fk_EVENTO_has_Perfiles_Perfiles1_idx` (`Id_Perfil`),
  KEY `fk_EVENTO_has_Perfiles_EVENTO1_idx` (`Id_Evento`),
  CONSTRAINT `fk_EVENTO_has_Perfiles_EVENTO1` FOREIGN KEY (`Id_Evento`) REFERENCES `evento` (`Id_Evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENTO_has_Perfiles_Perfiles1` FOREIGN KEY (`Id_Perfil`) REFERENCES `perfil` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_perfil_evento`
--

LOCK TABLES `detalle_perfil_evento` WRITE;
/*!40000 ALTER TABLE `detalle_perfil_evento` DISABLE KEYS */;
INSERT INTO `detalle_perfil_evento` VALUES (2,1,0),(2,2,0),(2,3,0),(2,4,3),(2,5,2),(1,1,0),(1,2,0),(1,3,0),(1,4,3),(1,5,2);
/*!40000 ALTER TABLE `detalle_perfil_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_ubicacion_asistente_evento`
--

DROP TABLE IF EXISTS `detalle_ubicacion_asistente_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_ubicacion_asistente_evento` (
  `Id_Evento` int(11) NOT NULL,
  `Id_Ubicacion_Asistente` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  KEY `fk_UBICACION_ASISTENTE_has_EVENTO_EVENTO1_idx` (`Id_Evento`),
  KEY `fk_UBICACION_ASISTENTE_has_EVENTO_UBICACION_ASISTENTE1_idx` (`Id_Ubicacion_Asistente`),
  CONSTRAINT `fk_UBICACION_ASISTENTE_has_EVENTO_EVENTO1` FOREIGN KEY (`Id_Evento`) REFERENCES `evento` (`Id_Evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_UBICACION_ASISTENTE_has_EVENTO_UBICACION_ASISTENTE1` FOREIGN KEY (`Id_Ubicacion_Asistente`) REFERENCES `ubicacion_asistente` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ubicacion_asistente_evento`
--

LOCK TABLES `detalle_ubicacion_asistente_evento` WRITE;
/*!40000 ALTER TABLE `detalle_ubicacion_asistente_evento` DISABLE KEYS */;
INSERT INTO `detalle_ubicacion_asistente_evento` VALUES (1,1,1),(1,2,2),(1,3,0),(1,4,0);
/*!40000 ALTER TABLE `detalle_ubicacion_asistente_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_usuario_evento`
--

DROP TABLE IF EXISTS `detalle_usuario_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_usuario_evento` (
  `Id_Usuario` int(11) NOT NULL,
  `Id_Evento` int(11) NOT NULL,
  `Id_Perfil` int(11) NOT NULL COMMENT 'El id perfil es para saber el nombre del perfil que se utilizo para dicho evento, con una consulta con join',
  KEY `fk_Voluntarios_has_Evento_Evento1_idx` (`Id_Evento`),
  KEY `fk_Voluntarios_has_Evento_Voluntarios1_idx` (`Id_Usuario`),
  CONSTRAINT `fk_Voluntarios_has_Evento_Evento1` FOREIGN KEY (`Id_Evento`) REFERENCES `evento` (`Id_Evento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Voluntarios_has_Evento_Voluntarios1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_usuario_evento`
--

LOCK TABLES `detalle_usuario_evento` WRITE;
/*!40000 ALTER TABLE `detalle_usuario_evento` DISABLE KEYS */;
INSERT INTO `detalle_usuario_evento` VALUES (1,1,2);
/*!40000 ALTER TABLE `detalle_usuario_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_usuario_perfil`
--

DROP TABLE IF EXISTS `detalle_usuario_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_usuario_perfil` (
  `Id_Usuario` int(11) NOT NULL,
  `Id_Perfil` int(11) NOT NULL,
  KEY `fk_USUARIO_has_Perfiles_Perfiles1_idx` (`Id_Perfil`),
  KEY `fk_USUARIO_has_Perfiles_USUARIO1_idx` (`Id_Usuario`),
  CONSTRAINT `fk_USUARIO_has_Perfiles_Perfiles1` FOREIGN KEY (`Id_Perfil`) REFERENCES `perfil` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_USUARIO_has_Perfiles_USUARIO1` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`Id_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_usuario_perfil`
--

LOCK TABLES `detalle_usuario_perfil` WRITE;
/*!40000 ALTER TABLE `detalle_usuario_perfil` DISABLE KEYS */;
INSERT INTO `detalle_usuario_perfil` VALUES (2,4),(1,2),(1,3),(1,5),(5,5);
/*!40000 ALTER TABLE `detalle_usuario_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `Id_Evento` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Inicial` date NOT NULL,
  `Fecha_Final` date NOT NULL,
  `Hora_Inicio` time NOT NULL,
  `Hora_Final` time NOT NULL,
  `Capacidad` int(11) NOT NULL,
  `Aforo` int(11) NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Lugar_Evento` int(11) NOT NULL,
  `Id_Caracter_Evento` int(11) NOT NULL,
  `Id_Sistema_Control_Ingreso_Aforo` int(11) NOT NULL,
  `Id_Ingreso_Evento` int(11) NOT NULL,
  `Id_Tipo_Evento` int(11) NOT NULL,
  PRIMARY KEY (`Id_Evento`),
  KEY `fk_EVENTO_LUGAR_EVENTO1_idx` (`Id_Lugar_Evento`),
  KEY `fk_EVENTO_CARACTER_EVENTO1_idx` (`Id_Caracter_Evento`),
  KEY `fk_EVENTO_SISTEMA_CONTROL_INGRESO_AFORO1_idx` (`Id_Sistema_Control_Ingreso_Aforo`),
  KEY `fk_EVENTO_INGRESO_EVENTO1_idx` (`Id_Ingreso_Evento`),
  KEY `fk_EVENTO_TIPO_EVENTO1_idx` (`Id_Tipo_Evento`),
  CONSTRAINT `fk_EVENTO_CARACTER_EVENTO1` FOREIGN KEY (`Id_Caracter_Evento`) REFERENCES `caracter_evento` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENTO_INGRESO_EVENTO1` FOREIGN KEY (`Id_Ingreso_Evento`) REFERENCES `ingreso_evento` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENTO_LUGAR_EVENTO1` FOREIGN KEY (`Id_Lugar_Evento`) REFERENCES `lugar_evento` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENTO_SISTEMA_CONTROL_INGRESO_AFORO1` FOREIGN KEY (`Id_Sistema_Control_Ingreso_Aforo`) REFERENCES `sistema_control_ingreso_aforo` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_EVENTO_TIPO_EVENTO1` FOREIGN KEY (`Id_Tipo_Evento`) REFERENCES `tipo_evento` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
INSERT INTO `evento` VALUES (1,'Concierto la macarena cual otra','2014-09-18','2014-09-18','17:00:00','23:00:00',1000,970,'activado',1,2,2,3,1),(2,'Concierto Madona','2014-09-11','2014-09-11','10:00:00','20:00:00',500,450,'activado',4,3,5,1,10);
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herramienta`
--

DROP TABLE IF EXISTS `herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `herramienta` (
  `Id_Herramienta` int(11) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Herramienta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herramienta`
--

LOCK TABLES `herramienta` WRITE;
/*!40000 ALTER TABLE `herramienta` DISABLE KEYS */;
INSERT INTO `herramienta` VALUES (1,'4356','Alicates','activado'),(2,'7736653','Estetoscopio','activado'),(3,'sdfsadf','modificado','activado'),(4,'2diasliceth','cagada de dos dias','activado'),(5,'hola','eduardotra','activado');
/*!40000 ALTER TABLE `herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingreso_evento`
--

DROP TABLE IF EXISTS `ingreso_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingreso_evento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingreso_evento`
--

LOCK TABLES `ingreso_evento` WRITE;
/*!40000 ALTER TABLE `ingreso_evento` DISABLE KEYS */;
INSERT INTO `ingreso_evento` VALUES (1,'con valor comercial','activado'),(2,'sin valor comercial pero con boleta','activado'),(3,'entrada libre','activado');
/*!40000 ALTER TABLE `ingreso_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugar_evento`
--

DROP TABLE IF EXISTS `lugar_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugar_evento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugar_evento`
--

LOCK TABLES `lugar_evento` WRITE;
/*!40000 ALTER TABLE `lugar_evento` DISABLE KEYS */;
INSERT INTO `lugar_evento` VALUES (1,'plaza mayor centro de convenciones y exposiciones','activado'),(2,'teatro lido','activado'),(3,'teatro metropolitano','activado'),(4,'teatro universidad de medellin','activado'),(5,'teatro pablo tobon uribe','activado'),(6,'teatro al aire carlos vieco cerro nutibara','activado'),(7,'jardin botanico-completo','activado'),(8,'jardin botanico de medellin-suramericana','activado'),(9,'jardin botanico de medellin-orquideorama','activado'),(10,'parque de los deseos','activado'),(11,'parque de los pies descalzos','activado'),(12,'auditorio los fundadores eafit','activado'),(13,'auditorium plaza','activado'),(14,'polideportivo universidad pontificia bolivariana','activado'),(15,'parque de san antonio','activado'),(16,'centro de espetaculos la macarena','activado'),(17,'unidad deportiva atanasio girardot ','activado'),(18,'terminal del sur','activado'),(19,'terminal del norte','activado'),(20,'parque norte-plazoleta de eventos','activado'),(21,'aeropuerto juan pablo II','activado'),(22,'plaza de las esculturas','activado'),(23,'parque de la luz-plaza cisneros ','activado'),(24,'carabobo norte','activado');
/*!40000 ALTER TABLE `lugar_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mantenimiento`
--

DROP TABLE IF EXISTS `mantenimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mantenimiento` (
  `Id_Herramienta_Mantenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Herramienta` int(11) NOT NULL,
  `Fecha_Mantenimiento` date NOT NULL,
  `Proximo_Mantenimiento` date NOT NULL,
  `Detalle` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Herramienta_Mantenimiento`),
  KEY `fk_Mantenimiento_Utensilios1_idx` (`Id_Herramienta`),
  CONSTRAINT `fk_Mantenimiento_Utensilios1` FOREIGN KEY (`Id_Herramienta`) REFERENCES `herramienta` (`Id_Herramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mantenimiento`
--

LOCK TABLES `mantenimiento` WRITE;
/*!40000 ALTER TABLE `mantenimiento` DISABLE KEYS */;
INSERT INTO `mantenimiento` VALUES (1,1,'2014-04-25','2014-04-26','hola ensayo3'),(2,1,'2015-06-30','2015-08-30','ensayo'),(3,1,'2015-06-30','2015-08-30','ensayo');
/*!40000 ALTER TABLE `mantenimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamento_utensilio`
--

DROP TABLE IF EXISTS `medicamento_utensilio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medicamento_utensilio` (
  `Id_Medicamento` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Presentacion` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Lote` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Vencimiento` date NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Medicamento`),
  KEY `fk_MEDICAMENTO_PRESENTACION1_idx` (`Id_Presentacion`),
  CONSTRAINT `fk_MEDICAMENTO_PRESENTACION1` FOREIGN KEY (`Id_Presentacion`) REFERENCES `presentacion` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamento_utensilio`
--

LOCK TABLES `medicamento_utensilio` WRITE;
/*!40000 ALTER TABLE `medicamento_utensilio` DISABLE KEYS */;
INSERT INTO `medicamento_utensilio` VALUES (1,1,'aspirina','38847483','2015-10-02',2,'desactivado'),(2,4,'Robitussin','5678484','2014-12-12',7,'activado'),(3,2,'modificado','modificado','2015-03-12',10,'activado'),(4,1,'ensayo','ensayo','2014-04-18',34,'activado');
/*!40000 ALTER TABLE `medicamento_utensilio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

LOCK TABLES `perfil` WRITE;
/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (1,'ninguno','activado'),(2,'aph','activado'),(3,'enfermero','activado'),(4,'medico','activado'),(5,'conductor','activado'),(6,'vxcvsdfg','activado');
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona_empresa_involucrada`
--

DROP TABLE IF EXISTS `persona_empresa_involucrada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona_empresa_involucrada` (
  `Id_Personas_Involucradas` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(45) CHARACTER SET ucs2 COLLATE ucs2_spanish_ci NOT NULL,
  `Celular` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono_Fijo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Tipo` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Personas_Involucradas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona_empresa_involucrada`
--

LOCK TABLES `persona_empresa_involucrada` WRITE;
/*!40000 ALTER TABLE `persona_empresa_involucrada` DISABLE KEYS */;
INSERT INTO `persona_empresa_involucrada` VALUES (1,'eduard arley gomez muriel','yo@car.com','calle 103 a # 50 c 55 ','3207789736','5214932','persona','activado'),(2,'roman alonzo gomez muriel','loquesea@yahoo.com','calle 103 a # 50 c 55','3002000417','5214932','persona','activado'),(3,'nora enith muriel posso','a@hotmail.com','calle 103 a # 50 c 55 ','3147684870','5214932','persona','activado'),(4,'lacteos antioquia','b@hotmail.com','calle 28 b # 30 f 55','3115054150','5213648','empresa','activado'),(5,'telesentinel','c@hotmail.com','calle 10 v # 49 a 22','3122227911','2367885','empresa','activado'),(6,'city park','d@hotmail.com','centro comercial premiun plaza','3002297915','5220880','empresa','activado'),(7,'modificado','a@hotmail.com','asfjsdf','3453435','24242234','persona','activado');
/*!40000 ALTER TABLE `persona_empresa_involucrada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `presentacion`
--

DROP TABLE IF EXISTS `presentacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `presentacion` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `presentacion`
--

LOCK TABLES `presentacion` WRITE;
/*!40000 ALTER TABLE `presentacion` DISABLE KEYS */;
INSERT INTO `presentacion` VALUES (1,'pastilla','activado'),(2,'ampolla','activado'),(3,'inyeccion','activado'),(4,'jarabe','activado'),(5,'polvo','activado');
/*!40000 ALTER TABLE `presentacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sistema_control_ingreso_aforo`
--

DROP TABLE IF EXISTS `sistema_control_ingreso_aforo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sistema_control_ingreso_aforo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sistema_control_ingreso_aforo`
--

LOCK TABLES `sistema_control_ingreso_aforo` WRITE;
/*!40000 ALTER TABLE `sistema_control_ingreso_aforo` DISABLE KEYS */;
INSERT INTO `sistema_control_ingreso_aforo` VALUES (1,'boletas numeradas y selladas','activado'),(2,'invitaciones impresas','activado'),(3,'conteo de ingreso y salida de personas','activado'),(4,'ingreso sistematizado (electronico)','activado'),(5,'recambio','activado');
/*!40000 ALTER TABLE `sistema_control_ingreso_aforo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_evento`
--

DROP TABLE IF EXISTS `tipo_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_evento` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='				';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_evento`
--

LOCK TABLES `tipo_evento` WRITE;
/*!40000 ALTER TABLE `tipo_evento` DISABLE KEYS */;
INSERT INTO `tipo_evento` VALUES (1,'atracciones mecanicas','activado'),(2,'Religioso','activado'),(3,'institucional','activado'),(4,'academico-seminarios','activado'),(5,'deportivo ','activado'),(6,'feria','activado'),(7,'musical','activado'),(8,'cultural','activado'),(9,'exhibicion','activado'),(10,'pirotecnia','activado'),(11,'politico','activado'),(12,'exposicion','activado'),(13,'asss','activado');
/*!40000 ALTER TABLE `tipo_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion_asistente`
--

DROP TABLE IF EXISTS `ubicacion_asistente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion_asistente` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion_asistente`
--

LOCK TABLES `ubicacion_asistente` WRITE;
/*!40000 ALTER TABLE `ubicacion_asistente` DISABLE KEYS */;
INSERT INTO `ubicacion_asistente` VALUES (1,'graderias','activado'),(2,'silleterias','activado'),(3,'de pie','activado'),(4,'fluye y se desplaza','activado');
/*!40000 ALTER TABLE `ubicacion_asistente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Cuenta_Usuario` int(11) NOT NULL,
  `Identificacion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Celular` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `Barrio` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  KEY `fk_USUARIO_CUENTA_USUARIO1_idx` (`Id_Cuenta_Usuario`),
  CONSTRAINT `fk_USUARIO_CUENTA_USUARIO1` FOREIGN KEY (`Id_Cuenta_Usuario`) REFERENCES `cuenta_usuario` (`Id_Cuenta_Usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,1,'123456','Carlos','Jimenez','Calle 33 #78-67','75781234','8885986888888','El rosario'),(2,2,'4994985777','Dueiner','Lopez','Cr 72 # 76-49','4321290','34532123','San javier'),(3,3,'1034567432','Carlos','Cardona','Calle 32 #45-67','4885889','7757575889','San cristobal'),(4,4,'775788','Felipe','Cardona','Calle 45 #45-67','2879847','3215432211','San javier'),(5,5,'177475859','luisa','cano','calle #32','2345632','321123451','aranjuez');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sevg'
--
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ConsultarEvento`(id INT, nombre_lugar VARCHAR(45), fecha_inicio VARCHAR(45), fecha_fin VARCHAR(45))
BEGIN
SET @query = 'SELECT evento.Id_Evento, evento.Nombre,';
SET @query = CONCAT(@query, 'evento.Fecha_Inicial, evento.Hora_Inicio,');
SET @query = CONCAT(@query, 'evento.Fecha_Final, evento.Hora_Final,');
SET @query = CONCAT(@query, ' lugar_evento.Nombre as lugar, evento.Capacidad, evento.Aforo, evento.Estado');
SET @query = CONCAT(@query, ' FROM evento JOIN lugar_evento ON evento.Id_Lugar_Evento = lugar_evento.Id');

IF( NOT isnull(id) ) THEN
	SET @query = CONCAT(@query, ' WHERE evento.Id_Evento = ', id);
END IF;

IF( NOT isnull(nombre_lugar) ) THEN

	SET @query = CONCAT(@query, ' WHERE evento.Nombre = ', "'", nombre_lugar, "'");
	SET @query = CONCAT(@query, ' OR lugar_evento.Nombre = ', "'", nombre_lugar, "'");

END IF;

IF( NOT isnull(fecha_inicio) ) THEN
	IF(@query LIKE '%WHERE%') THEN
		SET @query = CONCAT(@query, ' OR evento.Fecha_Inicial >= ', "'", fecha_inicio, "'");
	ELSE
		SET @query = CONCAT(@query, ' WHERE evento.Fecha_Inicial >= ', "'", fecha_inicio, "'");
	END IF;

END IF;

IF( NOT isnull(fecha_fin) ) THEN
	IF(@query LIKE '%WHERE%') THEN
		SET @query = CONCAT(@query, ' AND evento.Fecha_Final <= ', "'", fecha_fin, "'");
	ELSE
		SET @query = CONCAT(@query, ' WHERE evento.Fecha_Inicial <= ', "'", fecha_fin, "'");
	END IF;

END IF;

PREPARE stmt1 FROM @query;
EXECUTE stmt1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarHerramienta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ConsultarHerramienta`(
	in p_parametro varchar(45),
	IN eventId INT
)
begin

	IF(NOT ISNULL(eventId)) THEN

		SELECT herramienta.Id_Herramienta,
		herramienta.Nombre, evento.Id_Evento

		FROM herramienta
		JOIN detalle_herramienta_evento
		ON herramienta.Id_Herramienta = detalle_herramienta_evento.Id_Herramienta

		JOIN evento ON evento.Id_Evento = detalle_herramienta_evento.Id_Evento
		WHERE evento.Id_Evento = eventId AND herramienta.Estado = 'activado';

		ELSEIF(NOT ISNULL(p_parametro)) THEN

			SELECT Id_Herramienta,
					Codigo,
					Nombre,
					Estado
			from herramienta
			where LOWER(Nombre) = LOWER(p_parametro)
			or Estado = p_parametro;

		ELSE
			SELECT Id_Herramienta, Codigo, Nombre, Estado
			FROM herramienta;
	END IF;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarHerramienta_` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ConsultarHerramienta_`(
	in p_parametro varchar(45)
)
begin
select Id_Herramienta,
       Nombre,
	   Codigo,
	   Estado
from herramienta
where lower(Nombre) = convert(lower(p_parametro) using utf8) collate utf8_spanish_ci
   or lower(Codigo) = convert(lower(p_parametro) using utf8) collate utf8_spanish_ci;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarMantenimiento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ConsultarMantenimiento`(
	in p_Parametro varchar(45)
)
begin
select m.Id_Herramienta_Mantenimiento,
	   m.Id_Herramienta,
       m.Fecha_Mantenimiento,
       m.Proximo_Mantenimiento,
	   m.Detalle,
	   h.Nombre,
       h.Codigo
from mantenimiento m inner join herramienta h
on m.Id_Herramienta = h.Id_Herramienta
where lower(h.Nombre) = convert(lower(p_Parametro) using utf8) collate utf8_spanish_ci
   or lower(h.Codigo) = convert(lower(p_Parametro) using utf8) collate utf8_spanish_ci;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarMedicamento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ConsultarMedicamento`(
	in p_Parametro varchar(45)
)
begin
select m.Id_Medicamento,
	   m.Id_Presentacion,
	   m.Nombre,
       m.Lote,
       m.Fecha_Vencimiento,
       m.Cantidad,
       m.Estado,
       p.Nombre Nombre_Presentacion
from medicamento_utensilio m inner join presentacion p
on m.Id_Presentacion = p.Id
where (lower(m.Nombre) = convert(lower(p_Parametro) using utf8) collate utf8_spanish_ci
   or lower(m.Lote) = convert(lower(p_Parametro) using utf8) collate utf8_spanish_ci
   or lower(p.Nombre) = convert(lower(p_Parametro) using utf8) collate utf8_spanish_ci)
  and m.Cantidad > 0;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarMedicamentoUtensilio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ConsultarMedicamentoUtensilio`(
	in p_Parametro varchar(45),
	IN event_id INT
)
begin
IF (NOT ISNULL(event_id)) THEN

	SELECT medicamento_utensilio.Id_Medicamento as Id_Medicamento_detalle,
	detalle_medicamento_utensilio_evento.cantidad as cantidad_detalle,
	medicamento_utensilio.Nombre, evento.Id_Evento FROM medicamento_utensilio
	JOIN detalle_medicamento_utensilio_evento
	ON medicamento_utensilio.Id_Medicamento = detalle_medicamento_utensilio_evento.Id_Medicamento
	JOIN evento
	ON evento.Id_Evento = detalle_medicamento_utensilio_evento.Id_Evento
	WHERE evento.Id_Evento = event_id AND medicamento_utensilio.Estado = 'activado'
	ORDER BY medicamento_utensilio.Nombre;

ELSEIF(NOT ISNULL(p_Parametro)) THEN

	SELECT medicamento_utensilio.Id_Medicamento,
	presentacion.Id AS Id_Presentacion,
	presentacion.Nombre AS presentacion,
	medicamento_utensilio.Nombre,
	medicamento_utensilio.Lote,
	medicamento_utensilio.Fecha_Vencimiento,
	medicamento_utensilio.Cantidad,
	medicamento_utensilio.Estado FROM medicamento_utensilio
	JOIN presentacion
	ON presentacion.Id = medicamento_utensilio.Id_Presentacion
	WHERE LOWER(medicamento_utensilio.Nombre) = p_Parametro or
	medicamento_utensilio.Lote = CONVERT(LOWER(p_Parametro) using utf8) collate utf8_spanish_ci
	OR medicamento_utensilio.Estado = p_Parametro
	AND medicamento_utensilio.Cantidad > 0
	ORDER BY medicamento_utensilio.Nombre;
ELSE
	SELECT medicamento_utensilio.Id_Medicamento,
	medicamento_utensilio.Nombre
	FROM medicamento_utensilio
	WHERE medicamento_utensilio.Estado = 'activado'
	ORDER BY medicamento_utensilio.Nombre;

END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarPersonaEmpresa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ConsultarPersonaEmpresa`(
	in p_Parametro varchar(45)
)
begin
select Id_Personas_Involucradas,
	   Nombre,
	   Email,
	   Direccion,
       Celular,
       Telefono_Fijo,
       Tipo,
       Estado
from persona_empresa_involucrada
where lower(Nombre) = convert(lower(p_Parametro) using utf8) collate utf8_spanish_ci
   or lower(Email) = convert(lower(p_Parametro) using utf8) collate utf8_spanish_ci;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ConsultarUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `ConsultarUsuario`(
	in p_parametro VARCHAR(45),
	IN eventId INT
)
begin

	IF ( NOT ISNULL(eventId)) THEN

		SELECT usuario.Id_Usuario, usuario.Nombres, usuario.Apellidos,usuario.Direccion,
		usuario.Identificacion,usuario.Telefono,usuario.Celular,usuario.Barrio,
		perfil.Id AS perfil_id, perfil.Nombre AS perfil_nombre, evento.Id_Evento,
		cuenta_usuario.Estado,cuenta_usuario.Email,cuenta_usuario.Tipo
		FROM usuario
		JOIN detalle_usuario_evento
		ON usuario.Id_Usuario = detalle_usuario_evento.Id_Usuario
		JOIN perfil ON perfil.Id = detalle_usuario_evento.Id_Perfil
		JOIN evento ON evento.Id_Evento = detalle_usuario_evento.Id_Evento
		JOIN cuenta_usuario ON usuario.Id_Cuenta_Usuario = cuenta_usuario.Id_Cuenta_Usuario
		WHERE evento.Id_Evento = eventId
		AND cuenta_usuario.Tipo = 'usuario'
		ORDER BY usuario.Id_Usuario;

	ELSEIF (NOT ISNULL(p_parametro)) THEN

		select u.Id_Usuario,
			   u.Identificacion,
			   u.Nombres,
			   u.Apellidos,
			   u.Direccion,
			   u.Telefono,
			   u.Celular,
			   u.Barrio,
			   c.Email,
			   c.Tipo,
			   c.Estado
		from usuario u inner join cuenta_usuario c
		on u.Id_Cuenta_Usuario = c.Id_Cuenta_Usuario
		where u.identificacion = p_parametro
		   or u.Nombres = p_parametro
		   or u.Apellidos = p_parametro
		   or u.Barrio = p_parametro
		   or c.Email = p_parametro
		   or c.Tipo = p_parametro
		   or c.Estado = p_parametro;
	ELSE
		SELECT * FROM usuario;
	END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EventosMes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `EventosMes`()
begin
select Nombre,
	   Fecha_Inicial,
	   Fecha_Final,
	   concat(concat(Hora_Inicio, '-'), Hora_Final),
       Capacidad,
       Aforo
from evento
where month(Fecha_Inicial) = month(curdate());
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getCargos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `getCargos`(event_id INT)
BEGIN
	IF( NOT ISNULL(event_id) ) THEN

		SET @query = 'SELECT cargo.Id, cargo.Nombre ';
		SET @query = CONCAT(@query, 'FROM cargo ');
		SET @query = CONCAT(@query, 'JOIN detalle_cargo_persona_empresa_evento ');
		SET @query = CONCAT(@query, 'ON cargo.Id = detalle_cargo_persona_empresa_evento.Id_Cargo ');
		SET @query = CONCAT(@query, 'JOIN evento ON evento.Id_Evento = ');
		SET @query = CONCAT(@query, 'detalle_cargo_persona_empresa_evento.Id_Evento ');
		SET @query = CONCAT(@query, 'WHERE evento.Id_Evento = ', event_id);
		SET @query = CONCAT(@query, ' AND cargo.Estado = ', "'", 'activado', "'");
		SET @query = CONCAT(@query, ' ORDER BY cargo.Id');

		PREPARE stmt FROM @query;
		EXECUTE stmt;

	ELSE
		SELECT cargo.Id, cargo.Nombre, Estado FROM cargo
		WHERE Estado = 'activado'
		ORDER BY cargo.Nombre;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getCPQP` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `getCPQP`(event_id INT)
BEGIN
	IF( NOT ISNULL(event_id) ) THEN

		SET @query = 'SELECT caracterizacion_publico_participa.Id, ';
		SET @query = CONCAT(@query, 'caracterizacion_publico_participa.Nombre ');
		SET @query = CONCAT(@query, 'FROM caracterizacion_publico_participa ');
		SET @query = CONCAT(@query, 'JOIN detalle_caracterizacion_publico_participa_evento ');
		SET @query = CONCAT(@query, 'ON caracterizacion_publico_participa.Id = ');
		SET @query = CONCAT(@query, 'detalle_caracterizacion_publico_participa_evento.Id_Caracterizacion_Publico_Participa ');
		SET @query = CONCAT(@query, 'JOIN evento ON evento.Id_Evento = ');
		SET @query = CONCAT(@query, 'detalle_caracterizacion_publico_participa_evento.Id_Evento ');
		SET @query = CONCAT(@query, 'WHERE evento.Id_Evento = ', event_id);

		PREPARE stmt FROM @query;
		EXECUTE stmt;

	ELSE
		SELECT Id, Nombre
		FROM caracterizacion_publico_participa
		WHERE Estado = 'activado';
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getPerfil` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `getPerfil`(param VARCHAR(45), event_id INT)
BEGIN
	IF( NOT ISNULL(event_id) ) THEN

		SET @query = 'SELECT perfil.Id, perfil.Nombre, detalle_perfil_evento.Cantidad ';
		SET @query = CONCAT(@query, 'FROM perfil ');
		SET @query = CONCAT(@query, 'JOIN detalle_perfil_evento ');
		SET @query = CONCAT(@query, 'ON perfil.Id = detalle_perfil_evento.Id_Perfil ');
		SET @query = CONCAT(@query, 'JOIN evento ON evento.Id_Evento = ');
		SET @query = CONCAT(@query, 'detalle_perfil_evento.Id_Evento ');
		SET @query = CONCAT(@query, 'WHERE evento.Id_Evento = ', event_id);
		SET @query = CONCAT(@query, ' AND perfil.Estado = ', "'", 'activado', "'");
		SET @query = CONCAT(@query, ' ORDER BY perfil.Id');

		PREPARE stmt FROM @query;
		EXECUTE stmt;

	ELSEIF (NOT ISNULL(param)) THEN
		SELECT Id, Nombre, Estado
		FROM perfil
		WHERE Estado = 'activado' AND LOWER(Nombre) = LOWER(param);

	ELSE
		SELECT Id, Nombre, Estado
		FROM perfil;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getPerfilesUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `getPerfilesUser`(
	IN userId INT
)
begin
	SELECT perfil.Id, perfil.Nombre FROM perfil
	JOIN detalle_usuario_perfil ON perfil.Id = detalle_usuario_perfil.Id_Perfil
	JOIN usuario ON usuario.Id_Usuario = detalle_usuario_perfil.Id_Usuario
	WHERE usuario.Id_Usuario = userId;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getPerfilUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `getPerfilUser`(
	IN userId INT
)
begin
	SELECT perfil.Id, perfil.Nombre FROM perfil
	JOIN detalle_usuario_perfil ON perfil.Id = detalle_usuario_perfil.Id_Perfil
	JOIN usuario ON usuario.Id_Usuario = detalle_usuario_perfil.Id_Usuario
	WHERE usuario.Id_Usuario = userId;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getPerfil_` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `getPerfil_`(event_id INT)
BEGIN
	IF( NOT ISNULL(event_id) ) THEN

		SET @query = 'SELECT perfil.Id, perfil.Nombre, detalle_perfil_evento.Cantidad ';
		SET @query = CONCAT(@query, 'FROM perfil ');
		SET @query = CONCAT(@query, ' LEFT JOIN detalle_perfil_evento ');
		SET @query = CONCAT(@query, 'ON perfil.Id = detalle_perfil_evento.Id_Perfil ');
		SET @query = CONCAT(@query, ' LEFT JOIN evento ON evento.Id_Evento = ');
		SET @query = CONCAT(@query, 'detalle_perfil_evento.Id_Evento ');
		SET @query = CONCAT(@query, 'AND evento.Id_Evento = ', event_id);
		SET @query = CONCAT(@query, ' WHERE perfil.Estado = ', "'", 'activado', "'");
		SET @query = CONCAT(@query, ' ORDER BY perfil.Id');

		PREPARE stmt FROM @query;
		EXECUTE stmt;

	ELSE
		SELECT Id, Nombre, Estado
		FROM perfil
		WHERE Estado = 'activado';
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getPersonasInvolucradas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `getPersonasInvolucradas`(event_id INT)
BEGIN
	IF( NOT ISNULL(event_id) ) THEN

		SET @query = 'SELECT persona_empresa_involucrada.Id_Personas_Involucradas as Id_persona, ';
		SET @query = CONCAT(@query, 'persona_empresa_involucrada.Nombre, ');
		SET @query = CONCAT(@query, 'cargo.Id AS cargo_id ');
		SET @query = CONCAT(@query, 'FROM persona_empresa_involucrada ');
		SET @query = CONCAT(@query, 'JOIN detalle_cargo_persona_empresa_evento ');
		SET @query = CONCAT(@query, 'ON persona_empresa_involucrada.Id_Personas_Involucradas = ');
		SET @query = CONCAT(@query, 'detalle_cargo_persona_empresa_evento.Id_Personas_Involucradas ');
		SET @query = CONCAT(@query, 'JOIN cargo ON cargo.Id = detalle_cargo_persona_empresa_evento.Id_Cargo ');
		SET @query = CONCAT(@query, 'JOIN evento ON evento.Id_Evento = ');
		SET @query = CONCAT(@query, 'detalle_cargo_persona_empresa_evento.Id_Evento ');
		SET @query = CONCAT(@query, 'WHERE evento.Id_Evento = ', event_id);
		SET @query = CONCAT(@query, ' ORDER BY persona_empresa_involucrada.Id_Personas_Involucradas');

		PREPARE stmt FROM @query;
		EXECUTE stmt;

	ELSE
		SELECT Id_Personas_Involucradas, Nombre, Estado FROM persona_empresa_involucrada
		WHERE Estado = 'activado'
		ORDER BY Id_Personas_Involucradas;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `getUbicacionAsistente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `getUbicacionAsistente`(event_id INT)
BEGIN
	IF( NOT ISNULL(event_id) ) THEN

		SET @query = 'SELECT ubicacion_asistente.Id, ubicacion_asistente.Nombre, ';
		SET @query = CONCAT(@query, 'detalle_ubicacion_asistente_evento.Cantidad ');
		SET @query = CONCAT(@query, 'FROM ubicacion_asistente ');
		SET @query = CONCAT(@query, 'LEFT JOIN detalle_ubicacion_asistente_evento ');
		SET @query = CONCAT(@query, 'ON ubicacion_asistente.Id = ');
		SET @query = CONCAT(@query, 'detalle_ubicacion_asistente_evento.Id_Ubicacion_Asistente ');
		SET @query = CONCAT(@query, 'LEFT JOIN evento ON evento.Id_Evento = ');
		SET @query = CONCAT(@query, 'detalle_ubicacion_asistente_evento.Id_Evento ');
		SET @query = CONCAT(@query, 'AND evento.Id_Evento = ', event_id);

		PREPARE stmt FROM @query;
		EXECUTE stmt;

	ELSE
		SELECT ubicacion_asistente.Id, ubicacion_asistente.Nombre
		FROM ubicacion_asistente
		WHERE Estado = 'activado';
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `HerramientasActivas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `HerramientasActivas`()
begin
select Nombre,
       Codigo
from herramienta
where estado = 'activado';
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarCaracterEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarCaracterEvento`(
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
insert into caracter_evento
						  (Nombre, Estado)
values 					  (p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarCaracterizacionPublicoParticipa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarCaracterizacionPublicoParticipa`(
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
insert into caracterizacion_publico_participa
											(Nombre, Estado)
values 										(p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarCargo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarCargo`(
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
insert into cargo
				(Nombre, Estado)
values 			(p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarCuentaAndUsuario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarCuentaAndUsuario`(
	in p_Email varchar(45),
	in p_Tipo varchar(45),
	in p_Estado varchar(45),

	in p_Identificacion int,
	in p_Nombres varchar(45),
	in p_Apellidos varchar(45),
	in p_Direccion varchar(45),
	in p_Telefono varchar(45),
	in p_Celular varchar(45),
	in p_Barrio varchar(45)
)
begin
insert into cuenta_usuario
						 (Email,
                          Password,
                          Tipo,
						  Estado)
values 					 (p_Email,
                          p_Identificacion,
                          p_Tipo,
						  p_Estado);
begin
	DECLARE p_Id_Cuenta_Usuario INT DEFAULT 0;
	SET     p_Id_Cuenta_Usuario = (SELECT MAX(Id_Cuenta_Usuario)
                                   FROM cuenta_usuario);
insert into usuario
                  (Id_Cuenta_Usuario,
				   Identificacion,
                   Nombres,
                   Apellidos,
                   Direccion,
				   Telefono,
				   Celular,
                   Barrio)
values            (p_Id_Cuenta_Usuario,
				   p_Identificacion,
                   p_Nombres,
                   p_Apellidos,
                   p_Direccion,
				   p_Telefono,
                   p_Celular,
                   p_Barrio);
END;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarHerramienta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarHerramienta`(
	in p_Nombre varchar(45),
	in p_Codigo varchar(45),
	in p_Estado varchar(45)
)
begin
insert into herramienta
					(Nombre, Codigo, Estado)
values				(p_Nombre, p_Codigo, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarHerramienta_` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarHerramienta_`(
	in p_Nombre varchar(45),
	in p_Codigo varchar(45),
	in p_Estado varchar(45)
)
begin
insert into herramienta
					(Nombre, Codigo, Estado)
values				(p_Nombre, p_Codigo, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarIngresoEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarIngresoEvento`(
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
insert into ingreso_evento
						 (Nombre, Estado)
values 					 (p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarLugarEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarLugarEvento`(
	in p_Nombre varchar(100),
	in p_Estado varchar(45)
)
begin
insert into lugar_evento
					   (Nombre, Estado)
values 				   (p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarMantenimiento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarMantenimiento`(
	in p_Id_Herramienta int,
	in p_Fecha_Mantenimiento date,
	in p_Proximo_Mantenimiento date,
	in p_Detalle varchar(200)
)
begin
insert into mantenimiento
						  (Id_Herramienta,
						   Fecha_Mantenimiento,
						   Proximo_Mantenimiento,
						   Detalle)
values
						  (p_Id_Herramienta,
						   p_Fecha_Mantenimiento,
						   p_Proximo_Mantenimiento,
						   p_Detalle);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarMedicamento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarMedicamento`(
	in p_Id_Presentacion int,
	in p_Nombre varchar(45),
	in p_Lote varchar(45),
	in p_Fecha_Vencimiento date,
	in p_Cantidad int,
	in p_Estado varchar(45)
)
begin
insert into medicamento_utensilio
					  (Id_Presentacion,
					   Nombre,
					   Lote,
                       Fecha_Vencimiento,
                       Cantidad,
                       Estado)
values 				  (p_Id_Presentacion,
                       p_Nombre,
                       p_lote,
                       p_Fecha_Vencimiento,
					   p_Cantidad,
                       p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarMedicamentoUtensilio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarMedicamentoUtensilio`(
	in p_Id_Presentacion int,
	in p_Nombre varchar(45),
	in p_Lote varchar(45),
	in p_Fecha_Vencimiento date,
	in p_Cantidad int,
	in p_Estado varchar(45)
)
begin
insert into medicamento_utensilio
					  (Id_Presentacion,
					   Nombre,
					   Lote,
                       Fecha_Vencimiento,
                       Cantidad,
                       Estado)
values 				  (p_Id_Presentacion,
                       p_Nombre,
                       p_lote,
                       p_Fecha_Vencimiento,
                       p_Cantidad,
                       p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarPerfil` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarPerfil`(
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
insert into perfil
				 (Nombre, Estado)
values 			 (p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarPersonaEmpresa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarPersonaEmpresa`(
	in p_Nombre varchar(45),
	in p_Email varchar(45),
	in p_Direccion varchar(45),
	in p_Celular varchar(45),
	in p_Telefono_Fijo varchar(45),
	in p_Tipo varchar(45),
	in p_Estado varchar(45)
)
begin
insert into persona_empresa_involucrada
									  (Nombre,
									   Email,
									   Direccion,
									   Celular,
                                       Telefono_Fijo,
                                       Tipo,
									   Estado)
values 								  (p_Nombre,
									   p_Email,
									   p_Direccion,
                                       p_Celular,
                                       p_Telefono_Fijo,
                                       p_Tipo,
                                       p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarPersonaEmpresaInvolucrada` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarPersonaEmpresaInvolucrada`(
	in p_Nombre varchar(45),
	in p_Direccion varchar(45),
	in p_Celular varchar(45),
	in p_Telefono_Fijo varchar(45),
	in p_Tipo varchar(45),
	in p_Estado varchar(45)
)
begin
insert into persona_empresa_involucrada
									  (Nombre,
									   Direccion,
									   Celular,
                                       Telefono_Fijo,
                                       Tipo,
									   Estado)
values 								  (p_Nombre,
									   p_Direccion,
                                       p_Celular,
                                       p_Telefono_Fijo,
                                       p_Tipo,
                                       p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarPresentacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarPresentacion`(
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
insert into presentacion
				       (Nombre, Estado)
values                 (p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarSistemaControlIngresoAforo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarSistemaControlIngresoAforo`(
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
insert into sistema_control_ingreso_aforo
										 (Nombre, Estado)
values 									 (p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarTipoEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarTipoEvento`(
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
insert into tipo_evento
				      (Nombre, Estado)
values                (p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarUbicacionAsistente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarUbicacionAsistente`(
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
insert into ubicacion_asistente
							  (Nombre, Estado)
values 						  (p_Nombre, p_Estado);
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `InsertarUpdateEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `InsertarUpdateEvento`(
	in p_event_id INT,
	in p_Nombre varchar(45),
	in p_Fecha_Inicial date,
	in p_Fecha_Final date,
	in p_Hora_Inicio time,
	in p_Hora_Final time,
	in p_Capacidad int,
	in p_Aforo int,
	in p_Estado varchar(45),
	in p_Id_Lugar_Evento int,
	in p_Id_Caracter_Evento int,
	in p_Id_Sistema_Control_Ingreso_Aforo int,
	in p_Id_Ingreso_Evento int,
	in p_Id_Tipo_Evento int
)
begin

IF( NOT ISNULL(p_event_id) ) THEN

	UPDATE evento
	SET Nombre = p_Nombre,
	Fecha_Inicial = p_Fecha_Inicial,
	Fecha_Final = p_Fecha_Final,
	Hora_Inicio = p_Hora_Inicio,
	Hora_Final = p_Hora_Final,
	Capacidad = p_Capacidad,
	Aforo = p_Aforo,
	Estado = p_Estado,
	Id_Lugar_Evento = p_Id_Lugar_Evento,
	Id_Caracter_Evento = p_Id_Caracter_Evento,
	Id_Sistema_Control_Ingreso_Aforo = p_Id_Sistema_Control_Ingreso_Aforo,
	Id_Ingreso_Evento = p_Id_Ingreso_Evento,
	Id_Tipo_Evento = p_Id_Tipo_Evento
	WHERE Id_Evento = p_event_id;

	DELETE FROM detalle_perfil_evento WHERE Id_Evento = p_event_id;
	DELETE FROM detalle_ubicacion_asistente_evento WHERE Id_Evento = p_event_id;
	DELETE FROM detalle_cargo_persona_empresa_evento WHERE Id_Evento = p_event_id;
	DELETE FROM detalle_caracterizacion_publico_participa_evento WHERE Id_Evento = p_event_id;

ELSE

insert into evento
			(Nombre,
			 Fecha_Inicial,
			 Fecha_Final,
			 Hora_Inicio,
			 Hora_Final,
			 Capacidad,
			 Aforo,
			 Estado,
             Id_Lugar_Evento,
             Id_Caracter_Evento,
			 Id_Sistema_Control_Ingreso_Aforo,
             Id_Ingreso_Evento,
             Id_Tipo_Evento)
values      (p_Nombre,
			 p_Fecha_Inicial,
			 p_Fecha_Final,
			 p_Hora_Inicio,
			 p_Hora_Final,
			 p_Capacidad,
			 p_Aforo,
			 p_Estado,
			 p_Id_Lugar_Evento,
			 p_Id_Caracter_Evento,
			 p_Id_Sistema_Control_Ingreso_Aforo,
			 p_Id_Ingreso_Evento,
			 p_Id_Tipo_Evento);


END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertDetailHerramientaEvent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `insertDetailHerramientaEvent`(eventId INT, herramientaId INT)
BEGIN
		INSERT INTO detalle_herramienta_evento(Id_Evento, Id_Herramienta)
		VALUES(eventId, herramientaId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertDetailMedUtenEvent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `insertDetailMedUtenEvent`(eventId INT, medUtenId INT, amount INT)
BEGIN

	SET @count = (SELECT COUNT(medicamento_utensilio.Id_Medicamento) AS count
	FROM medicamento_utensilio
	JOIN detalle_medicamento_utensilio_evento
	ON medicamento_utensilio.Id_Medicamento = detalle_medicamento_utensilio_evento.Id_Medicamento
	JOIN evento ON
	evento.Id_Evento = detalle_medicamento_utensilio_evento.Id_Evento
	WHERE evento.Id_Evento = eventId AND medicamento_utensilio.Id_Medicamento = medUtenId);

	IF(@count = 0) THEN

		UPDATE medicamento_utensilio
		SET Cantidad = Cantidad - amount
		WHERE Id_Medicamento = medUtenId;

		INSERT INTO detalle_medicamento_utensilio_evento(Id_Evento, Id_Medicamento, cantidad)
		VALUES(eventId, medUtenId, amount);

	ELSE

		SET @oldAmount = (SELECT cantidad
		FROM detalle_medicamento_utensilio_evento
		WHERE Id_Evento = eventId AND Id_Medicamento = medUtenId);

		UPDATE medicamento_utensilio
		SET Cantidad = Cantidad + @oldAmount
		WHERE Id_Medicamento = medUtenId;

		UPDATE medicamento_utensilio
		SET Cantidad = Cantidad - amount
		WHERE Id_Medicamento = medUtenId;

		UPDATE detalle_medicamento_utensilio_evento
		SET cantidad = amount
		WHERE Id_Evento = eventId AND Id_Medicamento = medUtenId;

	END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertDetailPerEmpEvent` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `insertDetailPerEmpEvent`(eventId INT, personaEmpresaId INT, cargoId INT)
BEGIN
		INSERT INTO detalle_cargo_persona_empresa_evento
		(Id_Evento, Id_Personas_Involucradas, Id_Cargo)
		VALUES(eventId, personaEmpresaId, cargoId);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `insertDetailVoluntaPer` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `insertDetailVoluntaPer`(eventId INT, voluntario_id INT, perfil_id INT)
BEGIN
		INSERT INTO detalle_usuario_evento
		(Id_Evento, Id_Usuario, Id_Perfil)
		VALUES(eventId, voluntario_id, perfil_id);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ListarMedicamentos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ListarMedicamentos`()
begin
select * from medicamento;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MantenimientosMes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `MantenimientosMes`()
begin
	select Nombre,
		   Codigo,
		   Proximo_Mantenimiento
	from herramienta h inner join mantenimiento m
	on h.Id_Herramienta = m.Id_Herramienta
	where month(Proximo_Mantenimiento) = month(curdate());
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MedicamentosUtensiliosActivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `MedicamentosUtensiliosActivos`()
begin
select mu.Nombre,
       p.Nombre presentacion,
       Lote,
       Fecha_Vencimiento,
       Cantidad
from medicamento_utensilio mu inner join presentacion p
on mu.Id_Presentacion=p.Id
where mu.estado = 'activado';
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MedicaUtensiVencerMes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `MedicaUtensiVencerMes`()
begin
select mu.Nombre,
       p.Nombre Presentacion,
       Lote,
       Cantidad,
       Fecha_Vencimiento
from medicamento_utensilio mu inner join presentacion p
on mu.Id_Presentacion = p.Id
where month(Fecha_Vencimiento) = month(curdate());
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarCaracterEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarCaracterEvento`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
update caracter_evento
set Nombre = p_Nombre,
    Estado = p_Estado
where Id = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarCaracterizacionPublicoParticipa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarCaracterizacionPublicoParticipa`(
	p_Id int,
	p_Nombre varchar(45),
	p_Estado varchar(45)
)
begin
update caracterizacion_publico_participa
set Nombre = p_Nombre,
	Estado = p_Estado
where Id = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarCargo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarCargo`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
update cargo
set Nombre = p_Nombre,
	Estado = p_Estado
where Id = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarHerramienta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarHerramienta`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Codigo varchar(45),
	in p_Estado varchar(45)
)
begin
update herramienta
   set Nombre = p_Nombre,
       Codigo = p_Codigo,
	   Estado = p_Estado
where Id_Herramienta = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarHerramienta_` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarHerramienta_`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Codigo varchar(45),
	in p_Estado varchar(45)
)
begin
update herramienta
   set Nombre = p_Nombre,
       Codigo = p_Codigo,
	   Estado = p_Estado
where Id_Herramienta = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarIngresoEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarIngresoEvento`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
update ingreso_evento
set Nombre = p_Nombre,
	Estado = p_Estado
where Id = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarLugarEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarLugarEvento`(
	in p_Id int,
	in p_Nombre varchar(100),
	in p_Estado varchar(45)
)
begin
update lugar_evento
set Nombre = p_Nombre,
	Estado = p_Estado
where Id = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarMantenimiento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarMantenimiento`(
	in p_Id int,
	in p_Id_Herramienta int,
	in p_Fecha_Mantenimiento date,
	in p_Proximo_Mantenimiento date,
	in p_Detalle varchar(200)
)
begin
update mantenimiento
   set Id_Herramienta = p_Id_Herramienta,
       Fecha_Mantenimiento = p_Fecha_Mantenimiento,
	   Proximo_Mantenimiento = p_Proximo_Mantenimiento,
	   Detalle = p_Detalle
where Id_Herramienta_Mantenimiento = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarMedicamento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarMedicamento`(
	in p_id_medicamento int,
	in p_id_presentacion int,
	in p_nombre varchar(45),
	in p_lote varchar(45),
	in p_fecha_vencimiento date,
	in p_cantidad int,
	in p_estado varchar(45)
)
begin
update medicamento_utensilio
   set Id_Presentacion = p_id_presentacion,
       Nombre = p_nombre,
       Lote = p_lote,
       Fecha_Vencimiento = p_fecha_vencimiento,
	   Cantidad = p_cantidad,
	   Estado = p_estado
where Id_Medicamento = p_id_medicamento;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarPerfil` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarPerfil`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
update perfil
set Nombre = p_Nombre,
	Estado = p_Estado
where Id = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarPersonaEmpresa` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarPersonaEmpresa`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Email varchar(45),
	in p_Direccion varchar(45),
	in p_Celular varchar(45),
	in p_Telefono_Fijo varchar(45),
	in p_Tipo varchar(45),
	in p_Estado varchar(45)
)
begin
update persona_empresa_involucrada
set Nombre = p_Nombre,
	Email = p_Email,
	Direccion = p_Direccion,
	Celular = p_Celular,
	Telefono_Fijo = p_Telefono_Fijo,
	Tipo = p_Tipo,
	Estado = p_Estado
where Id_Personas_Involucradas = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarPersonaEmpresaInvolucrada` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarPersonaEmpresaInvolucrada`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Direccion varchar(45),
	in p_Celular varchar(45),
	in p_Telefono_Fijo varchar(45),
	in p_Tipo varchar(45),
	in p_Estado varchar(45)
)
begin
update persona_empresa_involucrada
set Nombre = p_Nombre,
	Direccion = p_Direccion,
	Celular = p_Celular,
	Telefono_Fijo = p_Telefono_Fijo,
	Tipo = p_Tipo,
	Estado = p_Estado
where Id_Personas_Involucradas = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarSistemaControlIngresoAforo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarSistemaControlIngresoAforo`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
update sistema_control_ingreso_aforo
set Nombre = p_Nombre,
	Estado = p_Estado
where Id = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarTipoEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarTipoEvento`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
	update tipo_evento
	set Nombre = p_Nombre,
		Estado = p_Estado
	where Id = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarUbicacionAsistente` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarUbicacionAsistente`(
	in p_Id int,
	in p_Nombre varchar(45),
	in p_Estado varchar(45)
)
begin
update ubicacion_asistente
set Nombre = p_Nombre,
	Estado = p_Estado
where Id = p_Id;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ModificarUsuarios` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `ModificarUsuarios`(
	in p_Id_Usuario int,
	in p_Email varchar(45),
	in p_Tipo varchar(45),
	in p_Estado varchar(45),

	in p_Identificacion int,
	in p_Nombres varchar(45),
	in p_Apellidos varchar(45),
	in p_Direccion varchar(45),
	in p_Telefono varchar(45),
	in p_Celular varchar(45),
	in p_Barrio varchar(45)
)
begin
	update cuenta_usuario
	   set Email = p_Email,
		   Tipo = p_Tipo,
		   Estado = p_Estado
	 where Id_Cuenta_Usuario = p_Id_Usuario;

    update usuario
	   set Identificacion = p_Identificacion,
           Nombres = p_Nombres,
           Apellidos = p_Apellidos,
           Direccion = p_Direccion,
           Telefono = p_Telefono,
		   Celular = p_Celular,
           Barrio = p_Barrio
	 where Id_Usuario = p_Id_Usuario;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PersonaEmpresaActiva` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `PersonaEmpresaActiva`()
begin
select Nombre,
       Direccion,
       Celular,
       Telefono_Fijo,
       Tipo
from persona_empresa_involucrada
where Estado = 'activado'
order by Tipo;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectCaracterEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `SelectCaracterEvento`(event_id INT)
begin
if( not isnull(event_id) ) THEN

	set @query = 'SELECT caracter_evento.Id, caracter_evento.Nombre ';
	set @query = CONCAT(@query, 'FROM caracter_evento JOIN evento ');
	set @query = concat(@query , 'ON caracter_evento.Id = evento.Id_Caracter_Evento ');
	set @query = concat(@query, 'WHERE evento.Id_Evento = ', event_id);
	PREPARE stmt1 FROM @query;
	EXECUTE stmt1;

ELSE
	select Id, Nombre, Estado from caracter_evento
	where Estado = 'activado';
END if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectHerramienta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `SelectHerramienta`()
begin
select * from herramienta;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectIngresoEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `SelectIngresoEvento`(event_id INT)
begin

IF( NOT ISNULL(event_id) ) THEN

	SET @query = 'SELECT ingreso_evento.Id, ingreso_evento.Nombre FROM  ingreso_evento ';
	SET @query = CONCAT(@query, 'JOIN evento ON ingreso_evento.Id = evento.Id_Ingreso_Evento ');
	SET @query = CONCAT(@query, 'WHERE evento.Id_Evento = ', event_id);

	PREPARE stmt FROM @query;
	EXECUTE stmt;

ELSE
	SELECT Id, Nombre, Estado  FROM ingreso_evento
	WHERE Estado = 'Activado'
	ORDER BY Nombre;

END IF;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectLugarEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `SelectLugarEvento`(event_id INT)
begin

IF( NOT ISNULL(event_id) ) THEN

	SET @query = 'SELECT lugar_evento.Id, lugar_evento.Nombre FROM lugar_evento ';
	SET @query = CONCAT(@query, 'JOIN evento ON lugar_evento.Id = evento.Id_Lugar_Evento ');
	SET @query = CONCAT(@query, 'WHERE evento.Id_Evento = ', event_id);

	PREPARE stmt FROM @query;
	EXECUTE stmt;

ELSE
	SELECT Id, Nombre, Estado FROM lugar_evento
	WHERE Estado = 'Activado'
	ORDER BY Nombre;
END IF;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectPresentacion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `SelectPresentacion`()
begin
select * from presentacion;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectSistemaControlEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `SelectSistemaControlEvento`(event_id INT)
begin

IF( NOT ISNULL(event_id) ) THEN

	SET @query = 'SELECT sistema_control_ingreso_aforo.Id, sistema_control_ingreso_aforo.Nombre ';
	SET @query = CONCAT(@query, 'FROM sistema_control_ingreso_aforo ');
	SET @query = CONCAT(@query, 'JOIN evento ON sistema_control_ingreso_aforo.Id = ');
	SET @query = CONCAT(@query , 'evento.Id_Sistema_Control_Ingreso_Aforo ');
	SET @query = CONCAT(@query, 'WHERE evento.Id_Evento = ', event_id);

	PREPARE stmt FROM @query;
	EXECUTE stmt;

ELSE
	SELECT Id, Nombre, Estado FROM sistema_control_ingreso_aforo
	WHERE LOWER(Estado) = 'activado'
	ORDER BY Nombre;
END IF;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SelectTipoEvento` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `SelectTipoEvento`(event_id INT)
begin
IF( NOT ISNULL(event_id) ) THEN

	SET @query = 'SELECT tipo_evento.Id, tipo_evento.Nombre FROM tipo_evento ';
	SET @query = CONCAT(@query, 'JOIN evento ON tipo_evento.Id = evento.Id_Tipo_Evento ');
	SET @query = CONCAT(@query, 'WHERE evento.Id_Evento = ', event_id);

	PREPARE stmt FROM @query;
	EXECUTE stmt;

ELSE
	SELECT Id, Nombre, Estado FROM tipo_evento
	WHERE LOWER(Estado) = 'activado'
	ORDER BY Nombre;
END IF;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `UsuariosActivos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
CREATE PROCEDURE `UsuariosActivos`()
begin
select Identificacion,
       concat(concat(Nombres, ' '), Apellidos),
	   telefono,
	   celular,
	   c.Email
from usuario u inner join cuenta_usuario c
on u.Id_Cuenta_Usuario=c.Id_Cuenta_Usuario
where estado='activado';
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-13 13:19:10
