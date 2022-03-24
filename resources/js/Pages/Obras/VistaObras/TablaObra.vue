<template>

<div class="inner-wrap">

    <section-title
    title="Vista de Obras"
    subtitle="Alternativas">
    </section-title>

    <template v-if="this.registros == null || this.registros.length == 0">
        <h2 style="width:100%; text-align:center; font-size:24px; font-weight:700; padding:5px; color:#333;">No se encontraron registros de Obras</h2>
    </template>
    <template v-else>
        <div class="lead-text">
            <h2>Filtrado por:</h2>
        </div>
        <div class="inner-options">
            <button class="alt-btn" @click.prevent="globalView">Sin filtro</button>
            <button class="alt-btn" @click.prevent="filterCategoria">Categoría</button> 
            <button class="alt-btn" @click.prevent="filterTipos">Tipo Obra</button>
        </div>
    </template>

    <div v-if="this.registros == null || this.registros.length > 0" class="search-container">
        <input type="text" class="clean-input-text" placeholder="Clave de Obra, Estado o Coordinador" v-model="search_text"/>
    </div>

<div class="table-scroll-container">
    <!-- Yield table content for filter -->
    <template v-if="this.registros.length > 0 && this.registros != null && this.selection == 0">
        <vista-obras-global
        :registros="registros"
        :search_input="search_text">
        </vista-obras-global>
    </template>

    <template v-if="selection == 1">
        <obras-categorias
        :obras="obras_filtered">
        </obras-categorias>
    </template>

    <template v-if="selection == 2">
        <obras-tipos
        :obras="obras_filtered">
        </obras-tipos>
    </template>
        
</div>
</div>

</template>

<script>
import SectionTitle from '../../../CustomComponent/SectionTitle.vue';
import ObrasCategorias from './ObrasCategorias.vue';
import VistaObrasGlobal from './VistaObrasGlobal.vue';
import ObrasTipos from './ObrasTipos.vue';
export default {
    components:{SectionTitle, VistaObrasGlobal, ObrasCategorias, ObrasTipos},
    data(){
        return{
            registros:[],
            selection: 0,
            obras_filtered:[],
            search_text:null,
        }
    },
    methods:{
        getObrasRegisters(){
            axios.get('/obras/registros')
            .then(res => {this.registros = res.data;})
            .catch(err => console.error(err));
        },
        globalView(){
            this.selection = 0;
        },
        filterCategoria(){
            this.obras_filtered = [];
            this.registros.forEach(el => {
                this.obras_filtered.push({
                    'clave_obra': el.clave_obra, 
                    'estado': el.estado, 
                    'municipio': el.municipio,
                    'categoria': el.categoria,
                    'jefe_obra': el.jefe_obra,
                    'coordinador': el.coordinador
                });
            });
            this.selection = 1;
        },
        filterTipos(){
            this.obras_filtered = [];
            this.registros.forEach(el => {
                this.obras_filtered.push({
                    'clave_obra': el.clave_obra, 
                    'estado': el.estado, 
                    'municipio': el.municipio,
                    'tipo': el.tipo,
                    'jefe_obra': el.jefe_obra,
                    'coordinador': el.coordinador
                });
            });
            this.selection = 2;
        }
    },
    created(){
        this.getObrasRegisters();
    }

}
</script>

<style>


.alt-btn{
    margin-left:1vw;
}
.table-scroll-container{
    width:100%;
    overflow-x:scroll;  
}

.lead-text{
    margin-left:3vw;
}

.lead-text h2{
    font-size:18px;
    font-weight:600;
}

.table-auto{
    width:89%;
    margin:auto;
    margin-bottom:1vh;
}

.search-container{
    margin-left:3vw;
    margin-right:3vw;
    margin-top:1vh;
    display:flex;
    align-items:center;
    justify-content: flex-start;
    flex-wrap: wrap;
}

.clean-input-text{
    border-radius:13px;
    flex-grow:1;
}

.search-container button{
    margin-left:1vw;
    background:#333;
    color:white;
    padding:5px;
    padding-left:8px;
    padding-right:8px;
    border-radius:13px;
}

</style>