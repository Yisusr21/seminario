delimiter $$

drop procedure if exists get_articulo $$

create procedure get_articulo(
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
    select *
    from articulo
    where id_articulo = xid_articulo;
    commit;
end $$
delimiter ;

CALL get_articulo(4);

select * from articulo