delimiter $$

drop procedure if exists insert_articulo $$

create procedure insert_articulo(
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
    insert into articulo(titulo_articulo,pagina_inicio,pagina_fin)
    values (xtitulo_articulo,xpagina_inicio,xpagina_fin);
    commit;
end $$
delimiter ;

CALL insert_articulo('Buenas noches cachorrita', 200, 300);

select * from articulo