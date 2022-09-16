<template>
    <template v-if="this.formatos.length > 0">
    <table>
        <thead>
            <tr>
                <th>Nombre Formato</th>
                <th>Descripcion</th>
                <th>Creado en</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="formato in this.formatos" :key="formato.id">
                <tr>
                    <td>{{formato.nombre_formato}}</td>
                    <td>{{formato.descripcion}}</td>
                    <td>{{formato.created_at}}</td>
                    <td>PDF</td>
                </tr>
            </template>
        </tbody>
        </table>
    </template>
    <template v-if="this.formatos.length < 1">
        <p class="subtle-text">Aún no se han creado formatos personalizados.</p>
    </template>
</template>

<script>
export default {
    data(){
        return{
            formatos:[],
        }
    },
    methods:{
        getAllFormats(){
            axios.get('/formatos')
            .then(res => {
                if(!res.data || res.data.length > 0)
                    this.formatos = res.data;
            })
            .catch(err => console.error(err));
        }
    },
    created(){
        this.getAllFormats();
    }

}
</script>

<style>

.subtle-text{
    color:#555;
    padding:8px;
    font-weight:700;
    font-size:18px;
    margin-top:1vh;
}

</style>