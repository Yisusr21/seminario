delimiter $$

drop procedure if exists insert_revista $$

create procedure insert_revista(
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
    insert into revista(numero, titulo,fecha_publicacion)
    values (xnumero,xtitulo,xfecha_publicacion);
    select 'Ingramos una revista nueva' as 'RESULT';
    commit;
end $$
delimiter ;

CALL insert_revista(101, 'Ciencia y Tecnología', '2025-06-01');

select * from articulo