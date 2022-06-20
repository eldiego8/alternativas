<template>
   <h5 style="padding:.75rem; width:100%; margin-top:.75rem; margin-bottom:.75rem; text-align:left; font-weight:600;">BENEFICIADOS DIRECTOS </h5>
                    <div class="custom-wrap-01 divide-y">
                    <div class="left_col-flex">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Nombre Beneficiario
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="nombre_benef" type="text"/>
                        </div>

                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                               Dirección
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="direccion_benef" type="text"/>
                        </div>
                        
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                               Descripción (Opcional)
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="descripcion_benef" type="text"/>
                        </div>

                        <div class="w-full px-3 mb-6 md:mb-0">
                            <div class="form-actions" style="margin-top:2vh;">
                                <template v-if="this.beneficiarios_array.length > 0">
                                    <button ref="subbutton" class="update-btn" @click.prevent="removeBenef" style="color:#e84043; border-color:#e84043;">Eliminar último</button>            				
                                </template>
                                <button ref="subbutton" class="update-btn" @click.prevent="pushBenef" style="color:#e84043; border-color:#e84043;">Añadir Beneficiario</button>
                            </div>
                        </div>
                	</div>

                    <div class="right_col-flex">
                        <div class="w-full px-3" style="margin-top:2vh; text-align:center;">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                                Beneficiarios
                            </label>
                        </div>
                        <table class="table-auto">
                            <thead>
                                <tr>
                                    <th style="text-align:left">#</th>
                                    <th style="text-align:left">Nombre</th>
                                    <th style="text-align:left">Dirección</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="benef,idx in this.beneficiarios_array" :key="benef.id">
                                    <tr>
                                        <td>{{ idx + 1 }}</td>
                                        <td>{{ benef.nombre }}</td>
                                        <td>{{ benef.direccion }}</td>
                                        <td>{{ benef.descripcion }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr />

</template>

<script>
export default {
    emits: ["onUpdateBenefArray"],
    data(){
        return{
            beneficiarios_array:[],
            nombre_benef: null,
            direccion_benef: null,
            descripcion_benef:null,
        }
    },
    methods:{
         pushBenef(){
            if(this.checkForNull(this.nombre_benef) && this.checkForNull(this.direccion_benef)){
                    this.beneficiarios_array.push({
                        'nombre':this.nombre_benef,
                        'direccion':this.direccion_benef,
                        'descripcion':this.descripcion_benef,
                });
                this.updateBenefArray();
            }
		  },
		  removeBenef(){
			  	this.beneficiarios_array.pop();
		  },
          updateBenefArray(){
              this.$emit('onUpdateBenefArray', this.beneficiarios_array);
          },
          checkForNull(item){
            if(item != null && item.length > 0)
                return true;
            else
                return false;
          }
    }
}
</script>

<style>

</style>