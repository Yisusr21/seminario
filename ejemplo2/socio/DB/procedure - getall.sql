Delimiter $$
drop PROCEDURE if EXISTS getAll$$
CREATE PROCEDURE getAll(
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

    select * 
    from socio
    COMMIT;

END $$

call getAll();
select * from socio