delimiter $$

drop procedure if exists update_articulo $$

create procedure update_articulo(
    xid_articulo int,
    xtitulo_articulo varchar(50),
    xpagina_inicio int,
    xpagina_fin int
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
    update articulo
    set articulo.titulo_articulo = xtitulo_articulo,
    articulo.pagina_inicio = xpagina_inicio,
    articulo.pagina_fin = xpagina_fin
    where id_articulo = xid_articulo;
    select 'Actulizamos articulo' as 'RESULT';
    commit;
end $$
delimiter ;

CALL update_articulo(3,203,'modificamos call', '2025-07-08');

select * from articulo