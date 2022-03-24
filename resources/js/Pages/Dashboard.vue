<template>
<Head title="Agua Para Siempre" />
<BreezeAuthenticatedLayout>
    <template #header>
        <h2 style="color:white;" class="font-semibold text-xl text-white-800 leading-tight">
            Control de Obras
        </h2>
    </template>


    <div class="container-control-big">
    
        <menu-bar
            @selectElement="setContent($event)">
        </menu-bar>

        <div class="content-wrapper">  
            <template v-if="selection == 0">
                <aps-index>
                </aps-index>
            </template>
                    
            <template v-if="selection == 1">
                <nueva-obra>
                </nueva-obra>
            </template>
            
            <template v-if="selection == 2">
                <tabla-obra>
                </tabla-obra>
            </template>
            
            <template v-if="selection == 3">
            </template>
            
            <template v-if="selection == 4">
                <actas-obra>
                </actas-obra>
            </template>

            <template v-if="selection == 5">
            </template>
        </div>
    
    </div>
    
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import MenuBar from '../CustomComponent/MenuBar.vue';
import ApsIndex from './Principal/ApsIndex.vue';
import NuevaObra from './Obras/NuevaObra.vue';
import TablaObra from './Obras/VistaObras/TablaObra.vue';
import ActasObra from './Actas/ActasObra.vue';

export default {
    components: { BreezeAuthenticatedLayout, Head, MenuBar, ApsIndex, NuevaObra, TablaObra, ActasObra },
    data(){
        return{
            selection: 0,
        }
    },
    methods:{
        setContent(selection){
            this.selection = selection;
        },
    },
    created(){

    }
}
</script>

<style scoped>
.container-control-big{
    margin:auto;
    margin-top:5vh;
    width:96%;
    margin-bottom:5vh;
    display:flex;
    align-items:center;
    justify-content:space-evenly;
    flex-direction:column;
}

.control-message-h3{
    margin-top:2vh;
    margin-bottom:2vh;
    display:flex;
    align-items:center;
    justify-content: center;
}

.control-message-h3 h3{
    font-size:24px;
    font-weight: 700;
}

.button-wrap{
    margin:auto;
    margin-top:1vh;
    width:89%;
    display:flex;
    align-items:center;
    align-self:flex-end;
    justify-content: flex-end;
}

.actions-menu{
    display:flex;
    align-items:center;
    justify-content:space-evenly;
    flex-wrap:wrap;
}

.actions-menu label,
.actions-menu a{
    border:1px solid #ccc;
    border-radius:13px;
    padding:8px;
    min-width:13vw;
    text-align:center;
    margin:1vh;
}

.content-wrapper{
    background:white;
    border-radius:13px;
    border:1px solid #ddd;
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:space-evenly;
}

</style>
