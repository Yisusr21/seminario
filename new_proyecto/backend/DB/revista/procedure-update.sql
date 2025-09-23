delimiter $$

drop procedure if exists update_revista $$

create procedure update_revista(
    xcod_revista int,
    xnumero int,
    xtitulo_revista varchar(50),
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
    revista.titulo_revista = xtitulo_revista,
    revista.fecha_publicacion = xfecha_publicacion
    where cod_revista = xcod_revista;
    commit;
end $$
delimiter ;

CALL update_revista(1,203,'modificamos calleee', '2025-07-08');

select * from revista