delimiter $$

drop procedure if exists delete_revista $$

create procedure delete_revista(
    xcod_revista int
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
    delete from revista where cod_revista = xcod_revista;
    select 'Eliminamos revista' as 'RESULT';
    commit;
end $$
delimiter ;

CALL delete_revista(1);

select * from revista