delimiter $$

drop procedure if exists delete_revista_articulo $$

create procedure delete_revista_articulo(
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
    delete from revista_articulo 
    where cod_revista = xcod_revista 
    and numero = xnumero and id_articulo = xid_articulo;
    commit;
end $$
delimiter ;

CALL delete_revista_articulo(1,304,3);

select * from revista_articulo