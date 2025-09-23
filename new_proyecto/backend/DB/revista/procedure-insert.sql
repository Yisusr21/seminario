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
    commit;
end $$
delimiter ;

CALL insert_revista(101, 'Ciencia y Tecnología', '2025-06-01');
CALL insert_revista(1, 'Tecnología y Futuro', '2023-01-15');
CALL insert_revista(2, 'Ciencia Moderna', '2023-02-20');
CALL insert_revista(3, 'Avances Médicos', '2023-03-10');
CALL insert_revista(4, 'Innovación Empresarial', '2023-04-25');
CALL insert_revista(5, 'Energías Renovables', '2023-05-30');

select * from revista