delimiter $$

drop procedure if exists update_revista_articulo $$

create procedure update_revista_articulo(
    xcod_revista int,
    xnumero int,
    xid_articulo int
)
begin
    declare mensaje text;
    declare exit handler for sqlexception
    begin
        rollback;
        get diagnostics condition 1 mensaje = MESSAGE_TEXT;
        select mensaje as 'RESULT';
    end;
    start transaction;
    update revista_articulo 
    set id_articulo = xid_articulo
    where cod_revista = xcod_revista and numero = xnumero;
    commit;
end $$
delimiter ;

CALL update_revista_articulo(1,304,20);

select * from revista_articulo