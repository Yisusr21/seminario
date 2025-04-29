-- INSERT de ejemplo
INSERT INTO paciente (dni, nombre, apellido, domicilio, fecha_nacimiento, id_obra_social, id_plan)
VALUES (12345678, 'Juan', 'Pérez', 'Calle Ficticia 123', '1990-05-15', 1, 1);
-- Insertar primer paciente
INSERT INTO paciente (dni, nombre, apellido, domicilio, fecha_nacimiento, id_obra_social, id_plan)
VALUES (22334455, 'Carlos', 'Gómez', 'Calle Siempre Viva 456', '1985-03-12', 1, 1);

-- Insertar segundo paciente
INSERT INTO paciente (dni, nombre, apellido, domicilio, fecha_nacimiento, id_obra_social, id_plan)
VALUES (33445566, 'Ana', 'Martínez', 'Avenida Libertador 789', '1992-07-22', 1, 1);

-- Insertar tercer paciente
INSERT INTO paciente (dni, nombre, apellido, domicilio, fecha_nacimiento, id_obra_social, id_plan)
VALUES (44556677, 'Luis', 'Rodríguez', 'Calle Falsa 987', '1988-11-30', 1, 1);


-- SELECT para verificar datos
SELECT * FROM paciente;
