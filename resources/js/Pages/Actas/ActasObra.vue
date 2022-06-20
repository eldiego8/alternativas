<template>

  <div class="list">
    <button id="1" class="actas-btn" @click.prevent="enableForm(1)">Aviso de Inicio</button>
    <button id="2" class="actas-btn" @click.prevent="enableForm(2)">Aviso de Termino</button>
    <button id="3" class="actas-btn" @click.prevent="enableForm(3)">Convenio de Obra</button>
  </div>

    <actas-extend
      v-if="selection == 1 && this.enable_on"
      type="1"
      @download="reloadAll" 
      :obra="{
        edo: this.obra.estado,
        mun: this.obra.municipio,
        loc: this.obra.localidad,
        aut: this.obra.edo_aut,
        obra_id: this.obra.obra_id
      }">
    </actas-extend>
    <actas-extend
      v-if="selection == 2 && this.enable_on"
      type="2"
      @download="reloadAll" 
      :obra="{
        edo: this.obra.estado,
        mun: this.obra.municipio,
        loc: this.obra.localidad,
        aut: this.obra.edo_aut,
        obra_id: this.obra.obra_id
      }">
    </actas-extend>
    <actas-extend
      v-if="selection == 3 && this.enable_on"
      type="3"
      @download="reloadAll" 
      :obra="{
        edo: this.obra.estado,
        mun: this.obra.municipio,
        loc: this.obra.localidad,
        aut: this.obra.edo_aut,
        obra_id: this.obra.obra_id
      }">
    </actas-extend>

</template>

<script>
import SectionTitle from '../../CustomComponent/SectionTitle.vue';
import ActasExtend from './ActasExtend.vue';
export default {
    components: { SectionTitle, ActasExtend },
    emits: ["download"],
    props:[ 'obra' ],

    data(){
      return{
        selection: 0,
        enable_on: false,
      }
    },

    methods:{
      reloadAll(cond){
        if(cond){
          this.$emit("download", true);
        }
      },
      enableForm(num){
        if(num == this.selection){
          this.selection = 0;
          this.enable_on = !this.enable_on;
        }else{
          if(!this.enable_on){
            this.enable_on = !this.enable_on;
          }
          this.selection = num;
        }
      this.toggleActive(num);
      },
      toggleActive(idref){
        document.querySelector(".list").childNodes.forEach(el => {
          if(el.id == idref){el.classList.toggle("act_on");}
          else{el.classList.remove("act_on");}
        });
      }
    },

    created(){
      console.log(this.obra);
    }

}
</script>

<style>


.list{
  margin:auto;
  display:flex;
  align-items:center;
  justify-content:space-evenly;
  padding:8px;
  margin-bottom:3vh;
  margin-top:3vh;
  border:1px solid #ddd;
  border-radius:13px;
}

.actas-btn{
	width:100%;
	height:100%;
	background:white;
	color:#e84043;
	cursor:pointer;
	transition:.3s all ease-in-out;
}

.act_on{
  background:#e84043;
  color:white;
  border-radius:13px;
}
</style>