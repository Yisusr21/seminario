-- INSERT de ejemplo
INSERT INTO historia_clinica (id_intervencion, fecha_intervencion, id_unidad, id_medico, id_paciente, id_sintoma, id_tratamiento)
VALUES (1, '2025-04-01', 1, 1, 1, 1, 1);
INSERT INTO historia_clinica (id_intervencion, fecha_intervencion, id_unidad, id_medico, id_paciente, id_sintoma, id_tratamiento)
VALUES (2, '2025-04-11', 2, 2, 4, 2, 2);

-- SELECT para verificar datos
SELECT * FROM historia_clinica;
