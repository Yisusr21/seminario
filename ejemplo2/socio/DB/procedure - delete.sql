Delimiter $$
drop PROCEDURE if EXISTS delete_socio $$
CREATE PROCEDURE delete_socio(
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

    delete from socio
    where id_socio = xid_socio;
    
    COMMIT;

END $$

call delete_socio(4);
select * from socio