Delimiter $$
drop procedure if exists insert_historiaClinica $$
create procedure insert_historiaClinica(
xid_intervencion int,
xfecha_intervencion date,
xid_unidad int, 
xid_medico int, 
xid_paciente int,
xid_sintoma int, 
xid_tratamiento int
)
begin
	DECLARE PID_PACIENTE INT;
    DECLARE PDNI INT;
    DECLARE PNOMBRE VARCHAR(20);
    DECLARE PAPELLIDO VARCHAR(20);
    DECLARE PDOMICILIO VARCHAR(20);
    DECLARE PFECHA_NACIMIENTO DATE;
    DECLARE PID_OBRA_SOCIAL INT;
    DECLARE PID_PLAN INT;
    DECLARE PMENSAJE TEXT;
    
    DECLARE EXIT HANDLER FOR sqlexception
	BEGIN 
		ROLLBACK;
		GET diagnostics CONDITION 1 PMENSAJE = MESSAGE_TEXT;
		SELECT PMENSAJE AS 'RESULT';
    END;
    SELECT ID_PACIENTE, NOMBRE, APELLIDO, DOMICILIO, FECHA_NACIMIENTO,ID_OBRA_SOCIAL,ID_PLAN 
    INTO PID_PACIENTE, PNOMBRE, PAPELLIDO, PDOMICILIO, PFECHA_NACIMIENTO, PID_OBRA_SOCIAL, PID_PLAN
    FROM PACIENTE
    WHERE PACIENTE.ID_PACIENTE = xid_paciente;
	
    start transaction;
    insert into historia_clinica(id_intervencion, fecha_intervencion,
    id_unidad, id_medico, id_paciente, id_sintoma, id_tratamiento)
    values (xid_intervencion, xfecha_intervencion, xid_unidad,
    xid_medico, xid_paciente, xid_sintoma, xid_tratamiento);
    commit; -- insert historia clinica
    
    SELECT 'HISTORIA CLINICA GRABADA' AS 'RESULT';
    
    END $$
    
CALL insert_historiaClinica(3, '2025-04-11', 1, 1, 4, 1, 1);

SELECT * FROM HISTORIA_CLINICA;
ALTER TABLE historia_clinica AUTO_INCREMENT = 1;
select * from historia_clinica