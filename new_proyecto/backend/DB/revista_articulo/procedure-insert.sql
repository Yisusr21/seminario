delimiter $$

drop procedure if exists insert_revista_articulo $$

create procedure insert_revista_articulo(
    xcod_revista int,
    xnumero int,
    xid_articulo int
)begin
    declare mensaje text;
    declare exit handler for sqlexception
    begin
        rollback;
        get diagnostics condition 1 mensaje = MESSAGE_TEXT;
        select mensaje as 'RESULT';
    end;
    start transaction;
    insert into revista_articulo(cod_revista,numero,id_articulo)
    values (xcod_revista, xnumero, xid_articulo);
    commit;
end $$
delimiter ;


