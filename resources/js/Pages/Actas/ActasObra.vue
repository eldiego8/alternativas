<template>

  <div class="wrapper_actas center">
    <formatos-personalizados-list/>
  </div>

  <div class="wrapper_actas center">
    <formatos-distribucion/>
  </div>

  <div class="wrapper_actas center">
    <nuevo-formato/>
  </div>
  
  
</template>

<script>
import SectionTitle from '../../CustomComponent/SectionTitle.vue';
import FormatosPersonalizadosList from './FormatosPersonalizadosList.vue';
import FormatosDistribucion from './FormatosDistribucion.vue';
import NuevoFormato from './NuevoFormato.vue';
export default {
    components: { SectionTitle, FormatosPersonalizadosList, NuevoFormato, FormatosDistribucion },

    data(){
      return{
        
      }
    },

    methods:{
      
    },

    created(){
    }

}
</script>

<style>
.wrapper_actas{
  width:100%;
  padding:21px;
}

.center{
  display:flex;
  flex-direction:column;
  justify-content: center;
  align-items:center;
}

</style>