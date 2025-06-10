delimiter $$

drop procedure if exists get_revista $$

create procedure get_revista(
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
    select *
    from revista
    where cod_revista = xcod_revista;
    commit;
end $$
delimiter ;

CALL get_revista(4);

select * from revista