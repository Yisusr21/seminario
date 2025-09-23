
const API_BASE = "../backend/api_revista.php/"

async function revista_get() {
    const endpoint = "get";
    const url = API_BASE + endpoint;
    const response = await fetch(url, { method: "POST" });

    if (!response.ok) {
        throw new Error("Fallo la solicitud");
    }

    const resultado = await response.json();
    return resultado.datos;
}

async function revista_print() {
    const tbody = document.getElementById("tabla-revista");
    let datos = await revista_get();

    tbody.innerHTML = "";
    let res = "";

    datos.forEach((revista) => {
        res += `<tr>
                <th scope="row">${revista.cod_revista}</th>
                <td>${revista.numero}</td>
                <td>${revista.titulo_revista}</td>
                <td>${revista.fecha_publicacion}</td>
                <td><button class="btn" onclick="editarRevista(${revista.cod_revista}, ${revista.numero}, '${revista.titulo_revista}', '${revista.fecha_publicacion}')"><i class="bi bi-pencil fs-5 btnw"></i></button></td>
                <td><button class="btn" onclick="eliminarRevista(${revista.cod_revista})"><i class="bi bi-trash3 fs-5 btnd"></i></button></td>
                
        </tr>`;
    });


    tbody.innerHTML = res;

}
document.addEventListener("DOMContentLoaded", revista_print);




async function revista_editar(id, numero, titulo,fecha) {
    const endpoint = "update";
    url = API_BASE + endpoint;

    const response = await fetch(url, {
        method: "POST",
        headers: {"Content-type" : "application/json"},
        body: JSON.stringify({
            cod_revista: id,
            numero: numero,
            new_titulo: titulo,
            fecha_publicacion: fecha
        })
    });

        if (!response.ok) {
        throw new Error("Fallo la solicitud");
    }

    const resultado = await response.json();
    return resultado;
}

async function revista_insert(numero, titulo,fecha) {
    const endpoint = "insert";
    url = API_BASE + endpoint;

    const response = await fetch(url, {
        method: "POST",
        headers: {"Content-type" : "application/json"},
        body: JSON.stringify({
            numero: numero,
            titulo_revista: titulo,
            fecha_publicacion: fecha
        })
    });

        if (!response.ok) {
        throw new Error("Fallo la solicitud");
    }

    const resultado = await response.json();
    return resultado;
}

async function eliminarApi(id) {
    console.log("Eliminamos " + id)
}





// // const tr = document.createElement("tr");
// // //tr.classList.add("")     <-- Aca agregariamos una clase si tuvieramos en TR pero como no tenemos dejamos así

// // //Creamos la columna id
// // const th = document.createElement("th");
// // th.scope = "row";
// // th.textContent = revista.cod_revista;

// // //creamos la columna numero
// // const tdnumero = document.createElement("td");
// // tdnumero.textContent = revista.numero;

// // //creamos la tabla titulo de la revista

// // const tdtitulo = document.createElement("td");
// // tdtitulo.textContent = revista.titulo_revista;

// // //creamos la tabla de fecha de publicación

// // const tdfecha = document.createElement("td");
// // tdfecha.textContent = revista.fecha_publicacion;

// // //creamos el boton de editar

// // const tdeditar = document.createElement("td");
// // const btneditar = document.createElement("button");
// // const btneditari = document.createElement("i");
// // btneditar.className = "btn";
// // btneditari.className = "bi bi-pencil fs-5 btnw";
// // btneditar.appendChild(btneditari); //insertamos el iconoco dentro del boton
// // btneditar.addEventListener("click", () => editarRevista());
// // tdeditar.appendChild(btneditar);

// // //creamos el boton de eliminar

// // const tdeliminar = document.createElement("td");
// // const btneliminar = document.createElement("button");
// // const btneliminari = document.createElement("i");
// // btneliminar.className = "btn";
// // btneliminari.className = "bi bi-trash3 fs-5 btnd";
// // btneliminar.appendChild(btneliminari); //insertamos el iconoco dentro del boton
// // btneliminar.addEventListener("click", () => eliminarRevista(revista.id_revista));
// // tdeliminar.appendChild(btneliminar);

// // //armado de fila

// // tr.append(th,tdnumero,tdtitulo,tdfecha,tdeditar,tdeliminar);
// //tbody.append(tr)
