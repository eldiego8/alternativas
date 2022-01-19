<template>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-6 py-2">Categoría</th>
                <th class="px-6 py-2">No. Obras</th>
            </tr>
        </thead>
        <tbody v-for="cat in obras_cats_num" :key="cat.id">
            <tr>
               <td class="border px-6 py-2">{{cat.categoria}}</td>
               <td class="border px-6 py-2">{{cat.count}}</td>
            </tr>
        </tbody>
    </table>
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-6 py-2">Categoría</th>
                <th class="px-6 py-2">Clave Obra</th>
                <th class="px-6 py-2">Jefe Obra</th>
                <th class="px-6 py-2">Coordinador</th>
                <th class="px-6 py-2">Estado</th>
                <th class="px-6 py-2">Municipio</th>

            </tr>
        </thead>
        <tbody v-for="obra in obras" :key="obra.id">
            <tr>
                <td class="border px-6 py-2">{{obra.categoria}}</td>
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
            obras_cats_num:[],
        }
    },
    methods:{
        obrasCategoriesCount(){
            axios.get('/obras/count/categories')
            .then(res => this.obras_cats_num = res.data)
            .catch(err => console.error(err));
            // request a bd para contar categorias vs obras
        }
    },
    created(){
        console.log(this.obras);
        this.obrasCategoriesCount();
    }
}
</script>

<style>

</style>