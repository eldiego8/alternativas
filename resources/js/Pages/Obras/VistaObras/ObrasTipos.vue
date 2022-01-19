<template>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-6 py-2">Tipo Obra</th>
                <th class="px-6 py-2">No. Obras</th>
            </tr>
        </thead>
        <tbody v-for="tipo in obras_tipos_num" :key="tipo.id">
            <tr>
               <td class="border px-6 py-2">{{tipo.tipo}}</td>
               <td class="border px-6 py-2">{{tipo.count}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table-auto"> 
        <thead>
            <tr>
                <th class="px-6 py-2">Tipo</th>
                <th class="px-6 py-2">Clave Obra</th>
                <th class="px-6 py-2">Jefe Obra</th>
                <th class="px-6 py-2">Coordinador</th>
                <th class="px-6 py-2">Estado</th>
                <th class="px-6 py-2">Municipio</th>

            </tr>
        </thead>
        <tbody v-for="obra in obras" :key="obra.id">
            <tr>
                <td class="border px-6 py-2">{{obra.tipo}}</td>
                <td class="border px-6 py-2">{{obra.clave_obra}}</td>
                <td class="border px-6 py-2">{{obra.jefe_obra}}</td>
                <td class="border px-6 py-2">{{obra.coordinador}}</td>
                <td class="border px-6 py-2">{{obra.estado}}</td>
                <td class="border px-6 py-2">{{obra.municipio}}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    props:['obras'],
    data(){
        return{
            obras_tipos_num:[],
        }
    },
    methods:{
        obrasTiposCount(){
            axios.get('/obras/count/tipos')
            .then(res => this.obras_tipos_num = res.data)
            .catch(err => console.error(err));
            // request a bd para contar categorias vs obras
        }
    },
    created(){
        this.obrasTiposCount();
    }
}
</script>

<style>

</style>