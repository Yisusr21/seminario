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

CALL insert_articulo('Este es un articulo de prueba', 200, 300);
CALL insert_articulo('Introducción a la Inteligencia Artificial', 150, 100);
CALL insert_articulo('El auge de las Energías Renovables', 250, 120);
CALL insert_articulo('La revolución de los Autos Autónomos', 300, 200);
CALL insert_articulo('Impacto del Cambio Climático en el Ártico', 220, 180);
CALL insert_articulo('Historia del Desarrollo del Software', 180, 90);

select * from articulo
