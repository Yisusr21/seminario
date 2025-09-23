async function editarRevista(id, numero, titulo, fecha) {
    document.getElementById("id-revista").value = id;
    document.getElementById("numero-editar").value = numero;
    document.getElementById("titulo-editar").value = titulo;
    document.getElementById("fecha-editar").value = fecha;

    // Abro el modal
    const modal = new bootstrap.Modal(document.getElementById("editarModal"));
    modal.show();
}

document
    .getElementById("guardarCambios")
    .addEventListener("click", async () => {
        const id = document.getElementById("id-revista").value.trim();
        const numero = document.getElementById("numero-editar").value.trim();
        const titulo = document.getElementById("titulo-editar").value.trim();
        const fecha = document.getElementById("fecha-editar").value.trim();

        if (!numero || !titulo || !fecha) {
            Swal.fire({
                title: "¡Atención!",
                text: "Completa todos los campos por favor.", // Texto descriptivo
                icon: "warning", // Icono (opcional)
                confirmButtonText: "Hecho",
            });
            return;
        }

        const resultado = await revista_editar(id, numero, titulo, fecha);

        if (resultado.estado === "success") {
            Swal.fire({
                title: "Revista actualizada",
                icon: "success",
                draggable: true,
            });

            const modal = bootstrap.Modal.getInstance(
                document.getElementById("editarModal")
            );
            modal.hide();
            // refrescamos el print
            revista_print();
        } else {
            alert("no hemos podido actualizar la revista");
        }
    });

async function insertarRevista() {
    const numeroInput = document.getElementById("txtNumero");
    const tituloInput = document.getElementById("txtTitulo");
    const fechaInput = document.getElementById("txtFecha");

    document.getElementById("btn-agg").addEventListener("click", () => {
        const numero = numeroInput.value.trim();
        const titulo = tituloInput.value.trim();
        const fecha = fechaInput.value.trim();

        if (!numero || !titulo || !fecha) {
            Swal.fire({
                title: "¡Atención!",
                text: "Completa todos los campos por favor.", // Texto descriptivo
                icon: "warning", // Icono (opcional)
                confirmButtonText: "Hecho",
            });
            return;
        } else {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Guardaste la nueva revista",
                showConfirmButton: false,
                timer: 1500,
            });
            revista_insert(numero,titulo,fecha) //llamamos a la funcion de la api
            revista_print() //recargamos la pagina
        }
    });
}
document.addEventListener("DOMContentLoaded", insertarRevista); //Esto es para que la funcion se ejecute ni bien cargue el don

async function eliminarRevista(xid) {
    Swal.fire({
        title: "¿Estas seguro? ",
        text: "¿Estas seguro de eliminar la revista?" + xid,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar",
        cancelButtonText: "Cancelar",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Eliminada!",
                text: "La revista ha sido eliminada correctamente",
                icon: "success",
            });
            eliminarApi(xid)
        }
    });
}
