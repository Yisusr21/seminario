delimiter $$

drop procedure if exists delete_articulo $$

create procedure delete_articulo(
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
    delete from articulo where id_articulo = xid_articulo;
    select 'Eliminamos articulo' as 'RESULT';
    commit;
end $$
delimiter ;

CALL delete_articulo(1);

select * from articulo