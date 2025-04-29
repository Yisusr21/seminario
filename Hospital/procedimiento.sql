Delimiter $$ 
Drop procedure if exists insert_ventas $$
create procedure insert_ventas(
xid_cliente int, 
xcodigo_articulo varchar(20),
xcantidad DECIMAL(20,2)
)
BEGIN 
	DECLARE VID_ARTICULO INT;
    DECLARE VEXISTECLIENTE INT;
	DECLARE VTOTAL DECIMAL(20,2);
    DECLARE VPRECIO DECIMAL(20,2);
    DECLARE VMENSAJE TEXT;
    
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
		ROLLBACK;
        GET DIAGNOSTICS CONDITION 1 VMENSAJE = MESSAGE_TEXT;
        SELECT VMENSAJE AS 'RESULT';
	END;
    
SELECT ID_ARTICULO,PRECIO
INTO VID_ARTICULO,VPRECIO
FROM ARTICULO
WHERE ARTICULO.CODIGO = CODIGO_ARTICULO;
SET VTOTAL = CANTIDAD * VPRECIO;
/*SELECT COUNT(*) INTO VEXISTECLIENTE
FROM CLIENTE
WHERE cliente.id_cliente = xid_cliente;
IF VEXISTECLIENTE = 0 THEN SELECT 'NO EXISTE CLIENTE' AS 'RESULT';
ELSE*/
	START TRANSACTION;
	INSERT INTO VENTA (ID_CLIENTE, ID_ARTICULO, PRECIO_UNITARIO, CANTIDAD, TOTAL)
	VALUES (ID_CLIENTE, VID_ARTICULO, VPRECIO, CANTIDAD, VTOTAL);
	COMMIT; #Insert_ventas
	SELECT 'VENTAS GRABADAS' AS 'RESULT';
-- END IF;
END$$

CALL insert_ventas(1, 'AWEEEQWWS', 3);
SELECT * FROM VENTA
select * from cliente
select * from articulo


select 
	count()
into 
	vExisteCliente
from 
	cliente
where 
	cliente.id_cliente = id_cliente;

if vEcistecliente = 0 then 
select 'No existe cliente' as 'result';
else
stock procedure
end if;


