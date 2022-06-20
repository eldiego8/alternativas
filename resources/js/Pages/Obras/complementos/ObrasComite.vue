<template>
   <h5 style="padding:.75rem; width:100%; margin-top:.75rem; margin-bottom:.75rem; text-align:left; font-weight:600;">COMITÉ 
        <label style="color:#bbb; font-weight:700;"> (Puede completarse después)</label>
    </h5>
        <div class="custom-wrap-01 divide-y">
        <div class="left_col-flex">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Nombre Representante
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="nombre_com" type="text"/>
            </div>

            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Cargo
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="cargo_com" type="text"/>
            </div>

            <div class="w-full px-3 mb-6 md:mb-0">
                <div class="form-actions" style="margin-top:2vh;">
                    <template v-if="this.comite_array.length > 0">
                        <button ref="subbutton" class="update-btn" @click.prevent="removeComite" style="color:#e84043; border-color:#e84043;">Eliminar último</button>            				
                    </template>
                    <button ref="subbutton" class="update-btn" @click.prevent="pushComite" style="color:#e84043; border-color:#e84043;">Añadir Representante</button>
                </div>
            </div>
        </div>

        <div class="right_col-flex">
            <div class="w-full px-3" style="margin-top:2vh; text-align:center;">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Comité
                </label>
            </div>
            <table class="table-auto">
                <thead>
                    <tr>
                        <th style="text-align:left">#</th>
                        <th style="text-align:left">Nombre</th>
                        <th style="text-align:left">Cargo</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="comite,idx in this.comite_array" :key="comite.id">
                        <tr>
                            <td>{{ idx + 1 }}</td>
                            <td>{{ comite.nombre }}</td>
                            <td>{{ comite.cargo }}</td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script>
export default {
    emits: ["onUpdateComiteArray"],
    data(){
        return{
            comite_array:[],
            nombre_com: null,
            cargo_com: null,
        }
    },
    methods:{
        pushComite(){
            this.comite_array.push({
                'nombre':this.nombre_com,
                'cargo':this.cargo_com,
            });
            this.updateComiteArray();
		  },
		  removeComite(){
			  	this.comite_array.pop();
		  },
          updateComiteArray(){
              this.$emit('onUpdateComiteArray', this.comite_array);
          }
    }

}
</script>

<style>

</style>