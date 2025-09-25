async function editarRevista(id, numero, titulo, fecha) {
    document.getElementById("id-revista").value = id;
    document.getElementById("numero-editar").value = numero;
    document.getElementById("titulo-editar").value = titulo;
    document.getElementById("fecha-editar").value = fecha;

    // Abro el modal
    const modal = new bootstrap.Modal(document.getElementById("editarModal"));
    modal.show();
}

    document.getElementById("guardarCambios").addEventListener("click", async () => {
        const id = document.getElementById("id-revista").value.trim();
        const numero = document.getElementById("numero-editar").value.trim();
        const titulo = document.getElementById("titulo-editar").value.trim();
        const fecha = document.getElementById("fecha-editar").value.trim();

        if (!numero || !titulo || !fecha) {
            Swal.fire({
                title: "¡Atención!",
                text: "Completa todos los campos por favor.",
                icon: "warning",
                confirmButtonText: "Hecho",
            });
            return;
        }

        try {
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
            alert("no hemos podido actualizar la revista");}}
        catch (error){
            console.error("Ocurrio un error",error);
            Swal.fire("Error en la conexión", "Intenta nuevamente", "error");
        }
    });

document.getElementById("btn-agg").addEventListener("click", insertarRevista);

async function insertarRevista() {
    const xnumero = document.getElementById("txtNumero");
    const xtitulo = document.getElementById("txtTitulo");
    const xfecha = document.getElementById("txtFecha");

    const numero = xnumero.value.trim();
    const titulo = xtitulo.value.trim();
    const fecha = xfecha.value.trim();

    if (!numero || !titulo || !fecha) {
            Swal.fire({
                title: "¡Atención!",
                text: "Completa todos los campos por favor.",
                icon: "warning", 
                confirmButtonText: "Hecho",
            });
        }
    else{
        try {
        
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Guardaste la nueva revista",
            showConfirmButton: false,
            timer: 1500,
        });

        xnumero.value = "";
        xtitulo.value = "";
        xfecha.value = ""; 
        await revista_insert(numero, titulo, fecha);
        revista_print();
    } catch (error) {
        console.error("Error al insertar la revista:", error);
        Swal.fire("Error en la conexión", "Intenta nuevamente", "error");
    }}
}

async function eliminarRevista(xid) {
    try{
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
            eliminarApi(xid);
        }
    });
    }
    catch (error){
        console.error("Error al borrar la revista", error)
        Swal.fire("Error en la conexión", "Intenta nuevamente", "error");
    }
}
