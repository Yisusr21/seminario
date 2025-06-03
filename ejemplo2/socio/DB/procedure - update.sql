Delimiter $$
drop PROCEDURE if EXISTS update_socio $$
CREATE PROCEDURE update_socio(
    xnombre VARCHAR(20),
    xid_socio int
)
BEGIN
    DECLARE MENSAJE TEXT;
    DECLARE EXIT HANDLER FOR sqlexception
    BEGIN                                                     
        ROLLBACK;                        
        GET DIAGNOSTICS CONDITION 1 MENSAJE = MESSAGE_TEXT;
        SELECT MENSAJE AS 'RESULT';
    END;

    START TRANSACTION;
    
    update socio 
    set socio.nombre = xnombre
    where id_socio = xid_socio;   
    COMMIT;
END $$

call update_socio('Prueba socio', 4);
select * from socio