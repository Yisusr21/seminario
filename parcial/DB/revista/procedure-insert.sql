delimiter $$

drop procedure if exists insert_revista $$

create procedure insert_revista(
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
    insert into revista(numero, titulo_revista,fecha_publicacion)
    values (xnumero,xtitulo_revista,xfecha_publicacion);
    select 'Ingramos una revista nueva' as 'RESULT';
    commit;
end $$
delimiter ;

CALL insert_revista(101, 'Ciencia y Tecnología', '2025-06-01');

delete from revista;
alter table revista AUTO_INCREMENT = 1;


select * from revista