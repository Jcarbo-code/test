{literal}
<div id="appComments">

    <h2>Comentarios</h2>
    <p v-if="comentarios.length == 0">No hay comentarios</p>

    <div v-if="comentarios.length > 0" style="margin-bottom: 5%;">
        <button class="btn btn-link" v-on:click="ordenarPuntaje()">Ordenar por puntaje &nbsp; <img
                v-if="orderPuntaje == 'DESC'" src="https://img.icons8.com/plumpy/16/000000/up--v1.png" />
            <img v-if="orderPuntaje == 'ASC'" src="https://img.icons8.com/plumpy/16/000000/down--v1.png" /> </button>
        <button class="btn btn-link" v-on:click="ordenarAntiguedad()"> Ordenar por fecha <img
                v-if="orderFecha == 'DESC'" src="https://img.icons8.com/plumpy/16/000000/up--v1.png" />
            <img v-if="orderFecha == 'ASC'" src="https://img.icons8.com/plumpy/16/000000/down--v1.png" />
        </button>
        <ul>
            <li v-for="comentario in comentarios">
                {{comentario.nombre}}, {{comentario.mail}} -
                {{comentario.puntuacion}} -
                {{comentario.comentario}}

                <button class="btn" v-if="isAdmin" v-on:click.prevent="eliminarComentario(comentario.id_comentario)"> <a
                        class="btn btn-danger">Eliminar</a>
                </button>
            </li>

        </ul>
    </div>
    <p id="mensaje">{{mensaje}}</p>
</div>
{/literal}