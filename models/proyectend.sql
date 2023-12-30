CREATE DATABASE proyectend;
USE proyectend;

-- TABLA PERSONAS ----------------------------------
CREATE TABLE personas
(
	idpersona 		INT AUTO_INCREMENT 			PRIMARY KEY,
	apellidos		VARCHAR(50)						NOT NULL,
	nombres 			VARCHAR(60)						NOT NULL,
	tipodocumento CHAR(1)   NOT NULL DEFAULT 'D',
	nrodocumento  CHAR(8)   NOT NULL,
	direccion		VARCHAR(70)						NOT NULL,
	telefono			CHAR(9)							 NULL,
	inactive_at 		DATE						  NOT NULL,
	CONSTRAINT uk_nrodocumento_est UNIQUE (tipodocumento, nrodocumento)
)ENGINE = INNODB;

INSERT INTO personas(apellidos, nombres, tipodocumento, nrodocumento, direccion, telefono)
	VALUES('Del Olmo Sanchez','Carla Emma','C', '75395148','Calle Montornes',''),
			('Saavedra Del Olmo','Marc Manuel', 'D', '78451296','','985563207')
			
			INSERT INTO personas(apellidos, nombres, tipodocumento, nrodocumento, direccion, telefono)
	VALUES('Del Olmo Sa','Carlama','C', '75395111','Calle MontoDAS','')
			
			
			SELECT * FROM personas;
			
DELIMITER $$

CREATE PROCEDURE ListarPersonas()
BEGIN
    SELECT * FROM personas WHERE inactive_at = '0000-00-00';
END $$

CALL ListarPersonas();



ALTER TABLE personas
DROP COLUMN inactive_at;


ALTER TABLE personas
ADD COLUMN inactive_at DATE NULL;

ALTER TABLE personas
MODIFY COLUMN inactive_at DATE NOT NULL;


DELIMITER $$

CREATE PROCEDURE spu_registrar_personas(
    IN _apellidos VARCHAR(50),
    IN _nombres VARCHAR(60),
    IN _tipodocumento CHAR(1),
    IN _nrodocumento CHAR(8),
    IN _direccion VARCHAR(70),
    IN _telefono CHAR(9)
)
BEGIN
    INSERT INTO personas(apellidos, nombres, tipodocumento, nrodocumento, direccion, telefono)
    VALUES (_apellidos, _nombres, _tipodocumento, _nrodocumento, _direccion, _telefono);
END $$

CALL spu_registrar_personas('Martinez', 'Arturo', 'C', '87654568', 'calle benavides', '986777872');
CALL spu_registrar_personas('Martina', 'Arturita', 'D', '87654421', 'calle bena', '986777822');

SELECT * FROM personas







DELIMITER $$

CREATE PROCEDURE spu_eliminar_personas(IN p_idpersona INT)
BEGIN
    UPDATE personas SET inactive_at = NOW() WHERE idpersona = p_idpersona;
END $$

CALL spu_eliminar_personas(3);




DELIMITER $$
CREATE PROCEDURE GetPersona(IN p_idpersona INT)
BEGIN
    SELECT * FROM personas WHERE idpersona = p_idpersona;
END $$

CALL GetPersona(2);


DELIMITER $$

CREATE PROCEDURE spu_actualizar_personas(
    IN _idpersona       INT,
    IN _apellidos       VARCHAR(50),
    IN _nombres         VARCHAR(60),
    IN _tipodocumento   CHAR(1),
    IN _nrodocumento    CHAR(8),
    IN _direccion       VARCHAR(70),
    IN _telefono        CHAR(9)
)
BEGIN 
    UPDATE personas 
    SET 
        apellidos = _apellidos,
        nombres = _nombres,
        tipodocumento = _tipodocumento,
        nrodocumento = _nrodocumento,
        direccion = _direccion,
        telefono = _telefono
    WHERE
        idpersona = _idpersona;
END $$


CALL spu_actualizar_personas(2, 'Lópa mastodonte', 'María alegria', 'C', '87454400', 'Calle Principal', '988778912');



SELECT * FROM personas

			
-- TABLA SERVICIOS--------------------------------

CREATE TABLE servicios
(
idservicio 			INT AUTO_INCREMENT 			PRIMARY KEY,
servicio	 			VARCHAR(30)						NOT NULL,
create_at			DATETIME 						NOT NULL DEFAULT NOW(),
update_at 			DATETIME 						NOT NULL,
inactive_at			DATETIME 						NOT NULL
)ENGINE = INNODB;

INSERT INTO servicios(servicio) 
	VALUES 	('Publicidad'),
				('Reportaje')
			SELECT * FROM servicios;	
-- TABLA EMPRESAS-------------------------------:-

CREATE TABLE empresas
(
idempresa 			INT AUTO_INCREMENT 			PRIMARY KEY,
razonsocial 		VARCHAR(50)						NOT NULL,
ruc					CHAR(11)							NOT NULL,
direccion 			VARCHAR(60)						NOT NULL,
create_at			DATETIME							NOT NULL DEFAULT NOW(),
update_at 			DATETIME 						NOT NULL,
inactive_at 		DATE						NOT NULL,
CONSTRAINT uk_ruc_ru UNIQUE (ruc)
)ENGINE = INNODB;

INSERT INTO empresas (razonsocial, ruc, direccion) VALUES 
				('Restaurante "Los Patitos" ','15975395141','Calle San Francisco 952'),
				('Restaurante Lorena ','89562374155','Call San Juan 967'),
				('Restaurante "De Florcita" ','78451296329','Calle Juan XXIII 110')
				
				INSERT INTO empresas (razonsocial, ruc, direccion) VALUES 
				('Restaurante "LoSDAPatitos" ','15975395111','Calle San FrancSDco 952')
SELECT * FROM empresas;

DELIMITER $$

CREATE PROCEDURE ListarEmpresas()
BEGIN
    SELECT * FROM empresas WHERE inactive_at = '0000-00-00';
END $$

CALL ListarEmpresas();



DELIMITER $$

CREATE PROCEDURE spu_registrar_empresas(
    IN _razonsocial VARCHAR(50),
    IN _ruc CHAR(11),
    IN _direccion VARCHAR(60)
)
BEGIN
    INSERT INTO empresas(razonsocial, ruc, direccion)
    VALUES (_razonsocial, _ruc, _direccion);
END $$

CALL spu_registrar_empresas('tienda alamedaasd', '875859584342', 'calle fermin tanguisasd');

SELECT * FROM empresas



DELIMITER $$

CREATE PROCEDURE spu_eliminar_empresas(IN p_idempresa INT)
BEGIN
    UPDATE empresas SET inactive_at = NOW() WHERE idempresa = p_idempresa;
END $$

CALL spu_eliminar_empresas(4);


DELIMITER $$
CREATE PROCEDURE GetEmpresa(IN p_idempresa INT)
BEGIN
    SELECT * FROM empresas WHERE idempresa = p_idempresa;
END $$

CALL GetEmpresa(1);


DELIMITER $$

CREATE PROCEDURE spu_actualizar_empresas(
    IN _idempresa       INT,
    IN _razonsocial       VARCHAR(50),
    IN _ruc         CHAR(11),
    IN _direccion   VARCHAR(60)
)
BEGIN 
    UPDATE empresas
    SET 
        razonsocial = _razonsocial,
        ruc = _ruc,
        direccion = _direccion
    WHERE
        idempresa = _idempresa;
END $$

CALL spu_actualizar_empresas(2, 'Restaurante Lorena', '20976688767', 'Calle San Juan 977');

SELECT * FROM empresas


DELIMITER $$

CREATE PROCEDURE ObtenerPersonas()
BEGIN
    SELECT p.idpersona, CONCAT(p.apellidos, ', ', p.nombres) AS nombre
    FROM personas p
    WHERE p.inactive_at = '0000-00-00';
END $$

CALL ObtenerPersonas();

SELECT * FROM personas;


DELIMITER $$

CREATE PROCEDURE ObtenerEmpresas()
BEGIN
    SELECT e.idempresa, e.razonsocial AS nombre_empresa
    FROM empresas e
    WHERE e.inactive_at = '0000-00-00';
END $$

CALL ObtenerEmpresas();



DELIMITER $$

CREATE PROCEDURE ObtenerEmpresasPorPersona(IN p_idpersona INT)
BEGIN
    SELECT de.iddetalle, p.idpersona, p.apellidos, p.nombres, e.idempresa, e.razonsocial AS nombre_empresa
    FROM personas p
    INNER JOIN detalledeempresa de ON p.idpersona = de.idpersona
    INNER JOIN empresas e ON de.idempresa = e.idempresa
    WHERE p.idpersona = p_idpersona AND de.inactive_at = '0000-00-00';
END $$

CALL ObtenerEmpresasPorPersona(2);














CREATE TABLE detalledeempresa
(
iddetalle INT AUTO_INCREMENT PRIMARY KEY,
idpersona INT                       NULL,
idempresa INT                       NULL,
inactive_at 		DATE						NOT NULL,
CONSTRAINT fk_idpersona_perso FOREIGN KEY(idpersona) REFERENCES personas(idpersona),
CONSTRAINT fk_idempresa_empr  FOREIGN KEY(idempresa) REFERENCES empresas(idempresa)
)ENGINE=INNODB;

INSERT INTO detalledeempresa (idpersona, idempresa) VALUES (1, 1);
INSERT INTO detalledeempresa (idpersona, idempresa) VALUES (1, 3);
INSERT INTO detalledeempresa (idpersona, idempresa) VALUES (3, 3);
INSERT INTO detalledeempresa (idpersona, idempresa) VALUES (4, 6);
INSERT INTO detalledeempresa (idpersona, idempresa) VALUES (5, 5);

SELECT * FROM detalledeempresa

DELIMITER $$

CREATE PROCEDURE ListarDetalledeEmpresa()
BEGIN
    SELECT d.iddetalle, CONCAT(p.nombres, ' ', p.apellidos) AS nombre_persona, e.razonsocial AS nombre_empresa
    FROM detalledeempresa d
    LEFT JOIN personas p ON d.idpersona = p.idpersona
    LEFT JOIN empresas e ON d.idempresa = e.idempresa
    WHERE d.inactive_at = '0000-00-00';
END $$




DELIMITER $$

CREATE PROCEDURE registrardetalledeempresa(
    IN _idpersona INT,
    IN _idempresa INT
)
BEGIN
    INSERT INTO detalledeempresa(idpersona, idempresa)
    VALUES (_idpersona, _idempresa);
END $$

CALL registrardetalledeempresa(3, 5);



DELIMITER $$

CREATE PROCEDURE EliminarDetalledeEmpresa(IN p_iddetalle INT)
BEGIN
    UPDATE detalledeempresa SET inactive_at = NOW() WHERE iddetalle = p_iddetalle;
END $$

CALL EliminarDetalledeEmpresa(3);










-- TABLA USUARIOS--------------------------------

CREATE TABLE usuarios
(
idusuario 			INT AUTO_INCREMENT 			PRIMARY KEY,
nombreusuario 			VARCHAR(50)						NOT NULL,
claveacceso 		VARCHAR(90)						NOT NULL,
nivelacceso 		CHAR(20)							NOT NULL,
create_at 			DATETIME 						NOT NULL DEFAULT NOW(),
update_at 			DATETIME 						NOT NULL,
inactive_at 		DATETIME 						NOT NULL,

CONSTRAINT uk_nombreusuario_usu UNIQUE(nombreusuario)
)ENGINE = INNODB;

INSERT INTO usuarios(nombreusuario, claveacceso, nivelacceso) VALUES
							('BudaGautama', '123456', 'PER'),
							('Carlaaa01','123456', 'ADM')
UPDATE usuarios
SET nombreusuario = 'BudaGautama'
WHERE idusuario = 1;

UPDATE usuarios SET nivelacceso = 'Administrador' WHERE idusuario = 2;
		
							
							UPDATE usuarios SET
       claveacceso = '$2y$10$EauxzNplzGb1A4I4jjtXAeo/fMlk3Zvm4dp70TDBBX29Tt51tZyBG' WHERE idusuario = 6;
       
ALTER TABLE usuarios
ADD COLUMN imagenperfil VARCHAR (200);			
			
SELECT * FROM usuarios;





DELIMITER $$
CREATE PROCEDURE spu_usuarios_login(IN _nombreusuario VARCHAR(50))
BEGIN
    SELECT idusuario, nombreusuario, claveacceso, nivelacceso
    FROM usuarios
    WHERE nombreusuario = _nombreusuario;
END $$

         
         CALL spu_usuarios_login('dasd');
         

DELIMITER $$

CREATE PROCEDURE CrearUsuario(
    IN p_nombreusuario VARCHAR(50),
    IN p_claveacceso VARCHAR(90),
    IN p_nivelacceso CHAR(20)
)
BEGIN
    DECLARE v_usuario_existente INT;

    -- Verificar si el nombre de usuario ya existe
    SELECT COUNT(*) INTO v_usuario_existente
    FROM usuarios
    WHERE nombreusuario = p_nombreusuario;

    -- Si el usuario no existe, insertarlo
    IF v_usuario_existente = 0 THEN
        INSERT INTO usuarios (nombreusuario, claveacceso, nivelacceso)
        VALUES (p_nombreusuario, p_claveacceso, p_nivelacceso);

        SELECT 'Usuario creado exitosamente' AS mensaje;
    ELSE
        SELECT 'El nombre de usuario ya está en uso. Por favor, elija otro.' AS mensaje;
    END IF;
END $$
        
      CALL CrearUsuario('daf', '123456', 'Administrador');
  
         











DELIMITER $$
CREATE PROCEDURE spu_usuarios_actualizar_clave(
    IN _idusuario INT,
    IN _nombreusuario VARCHAR(50),
    IN _nuevaClave VARCHAR(90)
)
BEGIN
    -- Actualizar solo nombre de usuario
    UPDATE usuarios
    SET nombreusuario = _nombreusuario
    WHERE idusuario = _idusuario;

    -- Actualizar la contraseña si se proporciona
    IF _nuevaClave IS NOT NULL THEN
        UPDATE usuarios
        SET claveacceso = _nuevaClave
        WHERE idusuario = _idusuario;
    END IF;
END $$




SELECT * FROM USUARIOS
CALL spu_usuarios_actualizar_clave(2, 'Carlaaa01', '$2y$10$EauxzNplzGb1A4I4jjtXAeo/fMlk3Zvm4dp70TDBBX29Tt51tZyBG');
CALL spu_usuarios_actualizar_clave(1, '$2y$10$EauxzNplzGb1A4I4jjtXAeo/fMlk3Zvm4dp70TDBBX29Tt51tZyBG', 'nueva_contraseña');






-- Ahora, puedes llamar al procedimiento almacenado con un ejemplo
CALL spu_usuarios_actualizar_clave(1, '123456', 'nueva_contraseña');













						
-- TABLA CONTRATOS--------------------------------

CREATE TABLE contratos
(
idcontrato 		INT AUTO_INCREMENT 			PRIMARY KEY,
idusuario			INT 								NOT NULL,
iddetalle                       INT                                                             NOT NULL,
idservicio 			INT 								NOT NULL,
idplan                          INT                                                             NOT NULL,
fechainicio 		DATE 						NOT NULL,
fechafin				DATE 						NOT NULL,
observaciones 		VARCHAR(60)						 NULL,
restriccionpublicidad VARCHAR(30) NOT NULL, -- Nuevo campo para la restricción de publicidad

CONSTRAINT fk_idusuario_usu FOREIGN KEY(idusuario) REFERENCES usuarios(idusuario),
CONSTRAINT fk_iddetalle_deta FOREIGN KEY(iddetalle) REFERENCES detalledeempresa(iddetalle),
CONSTRAINT fk_idservicio_servi FOREIGN KEY(idservicio) REFERENCES servicios(idservicio),
CONSTRAINT fk_idplan_plan FOREIGN KEY(idplan) REFERENCES planes(idplan)
)ENGINE = INNODB;

INSERT INTO contratos(idusuario, iddetalle, idservicio, idplan, fechainicio, fechafin, observaciones, restriccionpublicidad) VALUES
				(1,1,1,2,'2023-10-02','2023-10-22','Restaurante dedicada a la atesanal', 'PUBLICO');
				
		INSERT INTO contratos(idusuario, iddetalle, idservicio, idplan, fechainicio, fechafin, observaciones) VALUES
				(1,NULL,2,1,'2023-10-02','2023-10-22','Restaurante  a la atesanal');	
				
				
INSERT INTO contratos(idusuario, iddetalle, idservicio, idplan, fechainicio, fechafin, observaciones) VALUES
    (1, NULL, 1, 2, '2023-10-02', '2023-10-22', 'Restaurante dedicado a la artesanal');
				SELECT iddetalle FROM detalledeempresa WHERE idpersona = 1 AND idempresa = 2;
						
		

-- Verificar los contratos
				SELECT * FROM contratos
				
ALTER TABLE contratos MODIFY COLUMN iddetalle INT NULL;



	
DELIMITER $$
CREATE PROCEDURE ObtenerPlanes()
BEGIN
    SELECT idplan, nombreplan AS plane
    FROM planes;
END $$

CALL ObtenerPlanes();	
	
	
				
DELIMITER $$

CREATE PROCEDURE ListarContratos()
BEGIN
    SELECT 
        C.idcontrato,
        U.nombreusuario AS usuario,
        CONCAT(P.apellidos, ', ', P.nombres) AS persona,
        E.razonsocial AS empresa,
        S.servicio AS servicio,
        PL.nombreplan AS plan,
        PL.precio AS precio,
        PL.duracionspot AS duracionspot,
        C.fechainicio,
        C.fechafin,
        C.observaciones,
        C.restriccionpublicidad,
        DE.idpersona,
        DE.idempresa
    FROM contratos C
    INNER JOIN usuarios U ON C.idusuario = U.idusuario
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas P ON DE.idpersona = P.idpersona
    INNER JOIN empresas E ON DE.idempresa = E.idempresa
    INNER JOIN servicios S ON C.idservicio = S.idservicio
    INNER JOIN planes PL ON C.idplan = PL.idplan;
END $$









CALL ListarContratos();

SELECT* FROM detallecontratos WHERE idcontrato = 2;
				
	


	
	
DELIMITER $$

CREATE PROCEDURE ListarContratosR(IN idcontrato INT)
BEGIN
    SELECT 
        C.idcontrato,
        U.nombreusuario AS usuario,
        CONCAT(P.apellidos, ', ', P.nombres) AS persona,
        CASE 
            WHEN E.razonsocial = 'NO TIENE' THEN '______'
            ELSE E.razonsocial
        END AS empresa,
        S.servicio AS servicio,
        PL.nombreplan AS plan,
        PL.precio AS precio,
        PL.duracionspot AS duracionspot,
        PL.cantanunciosdia,
        C.fechainicio,
        C.fechafin,
        C.observaciones,
        C.restriccionpublicidad,
        P.nrodocumento,
        DE.idpersona,
        DE.idempresa
    FROM contratos C
    INNER JOIN usuarios U ON C.idusuario = U.idusuario
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas P ON DE.idpersona = P.idpersona
    INNER JOIN empresas E ON DE.idempresa = E.idempresa
    INNER JOIN servicios S ON C.idservicio = S.idservicio
    INNER JOIN planes PL ON C.idplan = PL.idplan
    WHERE C.idcontrato = idcontrato;
END $$

CALL ListarContratosR(1)
	
	
	
	
				

DELIMITER $$

CREATE PROCEDURE RegistrarContrato(
    IN p_usuario INT,
    IN p_detalle INT,
    IN p_servicio INT,
    IN p_plan INT,
    IN p_fechainicio DATE,
    IN p_fechafin DATE,
    IN p_observaciones VARCHAR(60),
    IN p_restriccionpublicidad VARCHAR(30)
)
BEGIN
    INSERT INTO contratos (idusuario, iddetalle, idservicio, idplan, fechainicio, fechafin, observaciones, restriccionpublicidad)
    VALUES (p_usuario, p_detalle, p_servicio, p_plan, p_fechainicio, p_fechafin, p_observaciones, p_restriccionpublicidad);
END $$




CALL RegistrarContrato(1, 1, 1, 2, '2023-10-30 10:00:00', '2023-10-30 11:00:00', 'Observaciones del contrato');




DELIMITER $$ 
CREATE PROCEDURE EliminarContrato(IN p_idcontrato INT)
BEGIN
    DELETE FROM contratos WHERE idcontrato = p_idcontrato;
END $$

CALL EliminarContrato(12);


DELIMITER $$

CREATE PROCEDURE GetContrato(IN p_idcontrato INT)
BEGIN
    SELECT 
        C.*,
        CONCAT(P.apellidos, ', ', P.nombres) AS nombre_persona,
        E.razonsocial AS nombre_empresa
    FROM contratos C
    INNER JOIN usuarios U ON C.idusuario = U.idusuario
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas P ON DE.idpersona = P.idpersona
    INNER JOIN empresas E ON DE.idempresa = E.idempresa
    WHERE C.idcontrato = p_idcontrato;
END $$



CALL GetContrato(1);





DELIMITER $$

CREATE PROCEDURE ActualizarContrato(
    IN p_idcontrato INT,
    IN p_idusuario INT,
    IN p_idservicio INT,
    IN p_idplan INT,
    IN p_fechainicio DATE,
    IN p_fechafin DATE,
    IN p_observaciones VARCHAR(60),
    IN p_restriccionpublicidad VARCHAR(30)
)
BEGIN
    UPDATE contratos
    SET
        idusuario = p_idusuario,
        idservicio = p_idservicio,
        idplan = p_idplan,
        fechainicio = p_fechainicio,
        fechafin = p_fechafin,
        observaciones = p_observaciones,
        restriccionpublicidad = p_restriccionpublicidad
    WHERE
        idcontrato = p_idcontrato;
END $$




CALL ActualizarContrato (1, 1, 2, 1, '2022-11-20', '2023-02-15', 'panaderia nestar');


				

				
				
CREATE TABLE detallecontratos (
    iddetallecontrato INT AUTO_INCREMENT PRIMARY KEY, 
    idcontrato INT NOT NULL, 
    dia             VARCHAR(20) NOT NULL,
    idplan VARCHAR(20) NOT NULL, -- Cambiar el tipo de dato a DECIMAL(10, 2)
    horainicio TIME,
    fecha DATE,
    observaciones VARCHAR(80),
    CONSTRAINT fk_idcontrato_detcom FOREIGN KEY(idcontrato) REFERENCES contratos(idcontrato)
) ENGINE=INNODB;
		
INSERT INTO detallecontratos (idcontrato, dia, duracion, horainicio, fecha, observaciones, restriccionpublicidad) 
VALUES (1, 'Lunes', '00:10:00', '08:00:00', '2023-10-30', 'Observaciones para el primer contrato', 'Publicidad solo para adultos'),
       (1, 'Martes', '00:20:00', '20:00:00', '2023-11-01', 'Observaciones para el segundo contrato', 'Publicidad para todo público');
       
INSERT INTO detallecontratos (idcontrato, dia, duracion, horainicio, fecha, observaciones) 
VALUES  (2, 'Miércoles', '00:10:00', '08:00:00', '2023-10-30', 'Observaciones para el primer contrato'),
    (2, 'Jueves', '00:20:00', '20:00:00', '2023-11-01', 'Observaciones para el segundo contrato');
		
SELECT * FROM detallecontratos;
			

DELIMITER $$

CREATE PROCEDURE ListarDetalleContratos(IN p_contrato INT)
BEGIN
    SELECT 
        D.iddetallecontrato,
      CONCAT(Per.apellidos, ', ', Per.nombres) AS persona,
        Emp.razonsocial AS empresa,
        D.dia,
        D.idplan,
        D.horainicio,
        D.fecha,
        D.observaciones
    FROM detallecontratos D
       INNER JOIN contratos C ON D.idcontrato = C.idcontrato
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas Per ON DE.idpersona = Per.idpersona
    INNER JOIN empresas Emp ON DE.idempresa = Emp.idempresa
    WHERE D.idcontrato = p_contrato;
END $$


CALL ListarDetalleContratos(1);	

				
DELIMITER $$

CREATE PROCEDURE EliminarDetalleContrato(IN p_iddetallecontrato INT)
BEGIN
    DELETE FROM detallecontratos WHERE iddetallecontrato = p_iddetallecontrato;
END $$




CALL EliminarDetalleContrato(4);	
		
		
		
		
		
		
		
DELIMITER $$

CREATE PROCEDURE RegistrarDetalleContrato(
    IN p_contrato INT,
    IN p_dia VARCHAR(20),
    IN p_horainicio TIME,
    IN p_fecha DATE,
    IN p_observaciones VARCHAR(80)
)
BEGIN
DECLARE p_duracionspot_plan VARCHAR(20);

    -- Obtener el precio del plan del contrato
    SET p_duracionspot_plan = (SELECT duracionspot FROM planes
                         WHERE idplan = (SELECT idplan FROM contratos WHERE idcontrato = p_contrato));

    INSERT INTO detallecontratos (idcontrato, dia, idplan, horainicio, fecha, observaciones)
    VALUES (p_contrato, p_dia, p_duracionspot_plan, p_horainicio, p_fecha, p_observaciones);
END $$

CALL RegistrarDetalleContrato(1, 'Martes', '09:00:00', '2023-11-07', 'Observaciones para otro contrato', 'Publicidad para todo público');

SELECT * FROM detallecontratos



DELIMITER $$
CREATE PROCEDURE GetDetalleContrato(IN p_iddetallecontrato INT)
BEGIN
    SELECT * FROM detallecontratos WHERE iddetallecontrato = p_iddetallecontrato;
END $$
CALL GetDetalleContrato(2);










DELIMITER $$
CREATE PROCEDURE ActualizarDetalleContrato(
    IN p_iddetallecontrato INT,
    IN p_idcontrato INT,
    IN p_dia VARCHAR(20),
    IN p_idplan VARCHAR(20), -- Cambiado de p_duracion a p_idplan
    IN p_horainicio TIME,
    IN p_fecha DATE,
    IN p_observaciones VARCHAR(80)
    
)
BEGIN
    UPDATE detallecontratos
    SET
        idcontrato = p_idcontrato,
        dia = p_dia,
        idplan = p_idplan, -- Cambiado de duracion a idplan
        horainicio = p_horainicio,
        fecha = p_fecha,
        observaciones = p_observaciones
    WHERE
        iddetallecontrato = p_iddetallecontrato;
END $$


CALL ActualizarDetalleContrato(2, 1, 'Martes', '40 segundos', '22:00:00', '2023-11-01', 'observaciones del segundo contrato', 'solo adultos');

	
			



				
CREATE TABLE planes (
idplan INT AUTO_INCREMENT PRIMARY KEY,
nombreplan    VARCHAR(50)   NOT NULL,
precio     DECIMAL(10, 2)    NOT NULL,
duracionspot VARCHAR (20) NOT NULL,
duracionplan   VARCHAR(20) NOT NULL,
cantanunciosdia  INT NOT NULL,
descripcion   VARCHAR(80)
)ENGINE = INNODB;


INSERT INTO planes (nombreplan, precio, duracionspot, duracionplan, cantanunciosdia, descripcion) 
VALUES 
    ('Plan Básico', 500, '50 segundos', '30 dias', 10, 'Plan básico con anuncios estándar'),
    ('Plan Estándar', 800, '50 segundos', '30 dias', 15, 'Plan estándar con anuncios premium'),
    ('Plan Premium', 1200, '50 segundos', '60 dias', 20, 'Plan premium con anuncios de alta calidad');
    
    INSERT INTO planes (nombreplan, precio, duracionplan, cantanunciosdia, descripcion) 
VALUES
    ('Plan Premium', 1200, '90dias', 20, 'Plan premium con anuncios de alta calidad');
    
     INSERT INTO planes (nombreplan, precio, duracionplan, cantanunciosdia, descripcion) 
VALUES
    ('Plan Estándar', 650, '30 dias', 10, 'Plan estándar con anuncios');


			SELECT * FROM personas;
			
			
DELIMITER $$
CREATE PROCEDURE ListarPlanes()
BEGIN
    SELECT * FROM planes;
END $$		

CALL ListarPlanes();
		
		
		
DELIMITER $$
CREATE PROCEDURE spu_registrar_planes(
    IN _nombreplan VARCHAR(50),
    IN _precio DECIMAL(10, 2),
    IN _duracionspot VARCHAR(20),
    IN _duracionplan VARCHAR(20),
    IN _cantanunciosdia INT,
    IN _descripcion VARCHAR(80)
)
BEGIN
    INSERT INTO planes(nombreplan, precio, duracionspot, duracionplan, cantanunciosdia, descripcion)
    VALUES (_nombreplan, _precio, _duracionspot, _duracionplan, _cantanunciosdia, _descripcion);
END $$


		
DELIMITER $$

CREATE PROCEDURE EliminarPlan(IN p_idplan INT)
BEGIN
    DELETE FROM planes WHERE idplan = p_idplan;
END $$

CALL EliminarPlan(2);	



DELIMITER $$
CREATE PROCEDURE GetPlan(IN p_idplan INT)
BEGIN
    SELECT * FROM planes WHERE idplan = p_idplan;
END $$

CALL GetPlan(1);

DELIMITER $$

CREATE PROCEDURE spu_actualizar_planes(
    IN _idplan       INT,
    IN _nombreplan       VARCHAR(50),
    IN _precio         DECIMAL(10, 2),
    IN _duracionspot   VARCHAR(20),
    IN _duracionplan    VARCHAR(20),
    IN _cantanunciosdia       INT,
    IN _descripcion        VARCHAR(80)
)
BEGIN 
    UPDATE planes 
    SET 
        nombreplan = _nombreplan,
        precio = _precio,
        duracionspot = _duracionspot,
        duracionplan = _duracionplan,
        cantanunciosdia = _cantanunciosdia,
        descripcion = _descripcion
    WHERE
        idplan = _idplan;
END $$

CALL spu_actualizar_planes(3, 'Plan Premiun', 1200, '50 segundos', '60 dias', 20, 'Plan premiun con anuncios de alta calidad');


CREATE TABLE pagoscontrato (
    idpago INT AUTO_INCREMENT PRIMARY KEY,
    idcontrato INT NOT NULL,
    tipopago VARCHAR(20) NOT NULL,
    idplan DECIMAL(10, 2) NOT NULL, -- Cambiar el tipo de dato a DECIMAL(10, 2)
    monto DECIMAL(10, 2) NOT NULL,
    amortizacion DECIMAL(10, 2) NOT NULL,
    saldo DECIMAL(10, 2) NOT NULL,
    fechapago DATE NOT NULL,
    descripcion VARCHAR(60) NULL,
    estado VARCHAR(15) NOT NULL,
    CONSTRAINT fk_idcontrato_pago FOREIGN KEY(idcontrato) REFERENCES contratos(idcontrato)
) ENGINE=INNODB;

ALTER TABLE pagoscontrato
MODIFY COLUMN tipopago VARCHAR(40) NOT NULL;


SELECT * FROM pagoscontrato;
DELIMITER $$

CREATE PROCEDURE ListarPagosContrato(IN p_contrato INT)
BEGIN
    SELECT 
        P.idpago,
        CONCAT(Per.apellidos, ', ', Per.nombres) AS persona,
        Emp.razonsocial AS empresa,
        P.tipopago,
        P.idplan,
        P.monto,
        P.amortizacion,
        P.saldo,
        P.fechapago,
        P.descripcion,
        P.estado
    FROM pagoscontrato P
    INNER JOIN contratos C ON P.idcontrato = C.idcontrato
    INNER JOIN detalledeempresa DE ON C.iddetalle = DE.iddetalle
    INNER JOIN personas Per ON DE.idpersona = Per.idpersona
    INNER JOIN empresas Emp ON DE.idempresa = Emp.idempresa
    WHERE P.idcontrato = p_contrato;
END $$

CALL ListarPagosContrato(1);










DELIMITER $$

CREATE PROCEDURE RegistrarPagoContrato(
    IN p_contrato INT,
    IN p_tipopago VARCHAR(40),
    IN p_monto DECIMAL(10, 2),
    IN p_descripcion VARCHAR(60),
    IN p_estado VARCHAR(15)
)
BEGIN
    DECLARE p_precio_plan DECIMAL(10, 2);
    DECLARE p_amortizacion DECIMAL(10, 2);
    DECLARE p_saldo DECIMAL(10, 2);
    DECLARE p_error BOOLEAN DEFAULT FALSE;

    -- Obtener el precio del plan del contrato
    SET p_precio_plan = (SELECT precio FROM planes
                         WHERE idplan = (SELECT idplan FROM contratos WHERE idcontrato = p_contrato));

    -- Calcular la amortización acumulativa
    SET p_amortizacion = (SELECT COALESCE(SUM(monto), 0) FROM pagoscontrato WHERE idcontrato = p_contrato);
    
    -- Inicializar el saldo con la resta del precio del plan y la amortización
    SET p_saldo = p_precio_plan - (p_amortizacion + p_monto);
    
   

    -- Verificar si el monto del nuevo pago supera la deuda restante
    IF p_saldo < 0 THEN
    SET p_error = TRUE;
    ELSE
      
    -- Establecer el estado
    IF p_saldo > 0 THEN
        SET p_estado = 'Pendiente';
    ELSE
        SET p_estado = 'Completado';
    END IF;


    -- Insertar el nuevo pago con la fecha actual usando CURDATE()
    INSERT INTO pagoscontrato (idcontrato, tipopago, idplan, monto, amortizacion, saldo, fechapago, descripcion, estado)
    VALUES (p_contrato, p_tipopago, p_precio_plan, p_monto, p_amortizacion + p_monto, p_saldo, CURDATE(), p_descripcion, p_estado);
     END IF;
END $$

CALL RegistrarPagoContrato(1, 'tarjeta de credito', 5.00, 'total el monto pagado al 100%', '');


DELIMITER $$
CREATE PROCEDURE GetPagosContrato(IN p_idpago INT)
BEGIN
    SELECT * FROM pagoscontrato WHERE idpago = p_idpago;
END $$
CALL GetPagosContrato(1);







-- este actualizar he ejecutado
DELIMITER $$

CREATE PROCEDURE ActualizarPagosContrato(
    IN p_idpago INT,
    IN p_tipopago VARCHAR(40),
    IN p_monto DECIMAL(10, 2),
    IN p_descripcion VARCHAR(60),
    IN p_estado VARCHAR(15)
)
BEGIN
    DECLARE p_precio_plan DECIMAL(10, 2);
    DECLARE p_amortizacion DECIMAL(10, 2);
    DECLARE p_saldo DECIMAL(10, 2);
    DECLARE p_error BOOLEAN DEFAULT FALSE;

    -- Obtener el precio del plan del contrato
    SELECT precio INTO p_precio_plan FROM planes
    WHERE idplan = (SELECT idplan FROM contratos WHERE idcontrato = (SELECT idcontrato FROM pagoscontrato WHERE idpago = p_idpago));

    -- Calcular la amortización acumulativa excluyendo el monto actual
    SELECT COALESCE(SUM(monto), 0) INTO p_amortizacion FROM pagoscontrato 
    WHERE idcontrato = (SELECT idcontrato FROM pagoscontrato WHERE idpago = p_idpago) AND idpago <> p_idpago;

    -- Calcular el saldo con la resta del precio del plan, la amortización y el nuevo monto
    SET p_saldo = p_precio_plan - (p_amortizacion + p_monto);

    -- Verificar si el monto del nuevo pago supera la deuda restante
    IF p_saldo < 0 THEN
        SET p_error = TRUE;
    ELSE
        SET p_error = FALSE;

        -- Establecer el estado
        IF p_saldo > 0 THEN
            SET p_estado = 'Pendiente';
        ELSE
            SET p_estado = 'Completado';
        END IF;

        -- Actualizar el pago con los nuevos valores
        UPDATE pagoscontrato
        SET 
            tipopago = p_tipopago,
            idplan = p_precio_plan,
            monto = p_monto,
            amortizacion = p_amortizacion + p_monto,
            saldo = p_saldo,
            descripcion = p_descripcion,
            estado = p_estado
        WHERE idpago = p_idpago;
    END IF;
END $$

CALL ActualizarPagosContrato(5, 'TipoPagoActualizado', 150.50, 'Descripción Actualizada', '');
























CALL ActualizarPagosContrato(61, 1, 'tarjeta de credito', 1200, 'total el monto pagado al 100%', '');


-- Llamado al procedimiento ActualizarPagoContrato
CALL ActualizarPagosContrato(45, 'TipoPagoActualizado', 150.50, 'Descripción Actualizada', '');







-- Llamada de ejemplo al procedimiento
CALL RegistrarPagoContrato(1, 'tarjeta de credito', 50.00, 'total el monto pagado al 100%', '');
CALL RegistrarPagoContrato(3, 'tarjeta de credito', 1200.00, 600.00, 600.00, '2023-10-25', 'total el monto pagado al 100%', '');


INSERT INTO pagoscontrato (idcontrato, tipopago, idplan, monto, amortizacion, saldo, fechapago, descripcion, estado) 
VALUES
    (2, 'yape', 1200.00, 2, 600.00, 600.00, '2023-10-25', 'cuota inicial 50%', 'pendiente'),
    (2, 'efectivo', 1200.00, 300.00, 900.00, 300.00, '2023-10-26', 'abonado', 'pendiente'),	
    (2, 'efectivo', 1200.00, 300.00, 1200.00, 0.00, '2023-10-27', 'ultimo pago', 'completado');	
		
		SELECT * FROM pagoscontrato;







		
	
DELIMITER $$

CREATE PROCEDURE EliminarPagoContrato(IN p_idpago INT)
BEGIN
    DELETE FROM pagoscontrato WHERE idpago = p_idpago;
END $$

CALL EliminarPagoContrato(4);
CALL EliminarPagoContrato(52);
CALL EliminarPagoContrato(48);
CALL EliminarPagoContrato(22);

SELECT * FROM detalledeempresa;












SELECT * FROM contratos
SELECT * FROM detalledeempresa
