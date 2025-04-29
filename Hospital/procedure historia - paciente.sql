Delimiter $$
drop procedure if exists insert_historiaClinica $$
create procedure insert_historiaClinica(
xid_historia int,
xid_intervercion int,
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
    insert into historia_clinica(id_historia,id_intervencion, fecha_intervencion,
    id_unidad, id_medico, id_paciente, id_sintoma, id_tratamiento)
    values (pid_historia, pid_intervencion, pfecha_intervencion, pid_unidad,
    pid_medico, pid_paciente, pid_sintoma, pid_tratamiento);
    commit; -- insert historia clinica
    
    SELECT 'HISTORIA CLINICA GRABADA' AS 'RESULT';
    
    END $$
    
CALL insert_historiaClinica(9, 2, '2025-04-11', 2, 2, 4, 2, 2);

SELECT * FROM HISTORIA_CLINICA WHERE ID_HISTORIA = 1;