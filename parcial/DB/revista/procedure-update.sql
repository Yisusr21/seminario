delimiter $$

drop procedure if exists update_revista $$

create procedure update_revista(
    xcod_revista int,
    xnumero int,
    xtitulo varchar(50),
    xfecha_publicacion date
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
    update revista
    set revista.numero = xnumero,
    revista.titulo = xtitulo,
    revista.fecha_publicacion = xfecha_publicacion
    where cod_revista = xcod_revista;
    select 'Actulizamos revista' as 'RESULT';
    commit;
end $$
delimiter ;

CALL update_revista(3,203,'modificamos call', '2025-07-08');

select * from revista