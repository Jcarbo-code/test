"use strict"

document.addEventListener('DOMContentLoaded', async () => {
    const API_URL = "api/product/detalle";
    const idproduct = document.querySelector('#title').getAttribute('data-product');
    const isLogged = document.querySelector('#comments').getAttribute('data-isLogged');
    const isAdmin = document.querySelector('#comments').getAttribute('data-isAdmin');

    const form = document.querySelector('#form');


    let appComments = new Vue({
        el: "#appComments",
        data: {
            nombre: "Comentarios",
            comentarios: [],
            isLogged,
            isAdmin,
            mensaje: '',
            orderFecha: "DESC",
            orderBy: 'fecha_creacion',
            orderPuntaje: "DESC"
        },
        methods: {
            eliminarComentario: async function (comentario) {
                await deleteComment(comentario);
            },
            ordenarPuntaje: async function () {
                appComments.orderPuntaje = appComments.orderPuntaje == 'DESC' ? 'ASC' : 'DESC';
                appComments.orderFecha = '';
                appComments.orderBy = 'puntuacion';
                await getCommentsByproduct();
            },
            ordenarAntiguedad: async function () {
                appComments.orderFecha = appComments.orderFecha == 'DESC' ? 'ASC' : 'DESC';
                appComments.orderPuntaje = '';
                appComments.orderBy = 'fecha_creacion';
                await getCommentsByproduct();
            }
        }
    });

    await getCommentsByproduct();

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData(form);
        const comentario = formData.get('comentario');
        const puntaje = formData.get('puntaje');
        const newComment = {
            id_product: idproduct,
            comentario,
            puntuacion: puntaje
        }
        await addComment(newComment);
        await getCommentsByproduct();
        form.reset();
    })




    async function getCommentsByproduct() {
        try {
            let order = appComments.orderBy == 'puntuacion' ? appComments.orderPuntaje : appComments.orderFecha;
            let endpoint = `${API_URL}/${idproduct}?orderBy=${appComments.orderBy}&order=${order}`;
            let res = await fetch(endpoint);
            let comments = await res.json();
            appComments.comentarios = comments;
            appComments.mensaje = '';
        } catch (error) {
            console.log(error);
        }
    }




    async function deleteComment(id_comentario) {
        try {
            let res = await fetch(`${API_URL}/${idproduct}/comments/${id_comentario}`, {
                "method": "DELETE",
            });
            if (res.status === 200) {
                appComments.mensaje = `Eliminado!`;
                await getCommentsByproduct();
            }
        } catch (error) {
            console.log(error);
        }
    }

    async function addComment(comment) {
        try {
            let res = await fetch(`${API_URL}/${idproduct}/comments`, {
                "method": "POST",
                "headers": { "Content-type": "application/json" },
                "body": JSON.stringify(comment),
            })
            if (res.ok) {
                console.log("Se ha agregado con exito");
            }
        } catch (error) {
            console.log(error);
        }
    }


})
