Delimiter $$
drop PROCEDURE if EXISTS insert_clienteNuevo $$
CREATE PROCEDURE insert_clienteNuevo(
    xnombre VARCHAR(20)
)
BEGIN
    DECLARE MENSAJE TEXT;
    DECLARE EXIT HANDLER FOR sqlexception
    BEGIN                                                          --Codigo de rollback
        ROLLBACK;                        
        GET DIAGNOSTICS CONDITION 1 MENSAJE = MENSSAGE_TEXT;
        SELECT MENSAJE AS 'RESULT';
    END;

    START TRANSACTION;

    insert into socio(nombre)
    VALUES(xnombre);
    
    COMMIT;
END $$

call insert_clienteNuevo('Procedure agrego');
select * from socio