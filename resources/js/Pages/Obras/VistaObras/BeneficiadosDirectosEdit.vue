<template>
  <div class="custom-wrap-01 divide-y">
        <div class="left_col-flex">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Nombre
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="nombre_benef" type="text"/>
            </div>

            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Direccion
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="direccion_benef" type="text"/>
            </div>
           
           <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Descripción (opcional)
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="descripcion_benef" type="text"/>
            </div>

            <div class="w-full px-3 mb-6 md:mb-0">
                    <div class="form-actions" style="margin-top:2vh;">
                        <button ref="subbutton" class="update-btn" @click.prevent="pushBeneficiario" style="color:#e84043; border-color:#e84043;">Añadir Beneficiario</button>
                    </div>
            </div>
        </div>
        <div class="right_col-flex">
            <div class="w-full px-3" style="margin-top:2vh; text-align:center;">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Beneficiados Directos
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
                    <template v-for="beneficiado,idx in this.beneficiados" :key="beneficiado.id">
                        <tr>
                            <td>{{ idx + 1 }}</td>
                            <td>{{ beneficiado.nombre }}</td>
                            <td>{{ beneficiado.cargo }}</td>
                            <td><button @click.prevent="dropBeneficiario(idx)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 19c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5-17v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712zm-3 4v16h-14v-16h-2v18h18v-18h-2z"/></svg></button></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    props:['obra_id', 'clave_obra'],
    data(){
        return{
            beneficiados:[],
            nombre_benef:null,
            direccion_benef:null,
            descripcion_benef:null
        }
    },
    methods:{
        getBeneficiadosDirectos(){
            try {
                axios.get(`/obras/beneficiadosdirectos/${this.obra_id}`)
                .then(res => console.log(res.data))
                .catch(err => console.error(err));
            } catch (error) {
                console.error(error)
            }
        },
        addBeneficiarioDir(idx){
            if(this.checkForNull(this.nombre_benef) && this.checkForNull(this.direccion_benef)){
                this.beneficiados.append('payload', JSON.stringify({
                    "obra_id":this.obra_id,
                    "nombre":this.nombre_benef,
                    "direccion":this.direccion_benef,
                    "descripcion":this.descripcion_benef
                }));
            }

            axios.post('/obras/beneficiadosdirectos/add', this.bendirform)
            .then(res => this.getBeneficiadosDirectos())
            .catch(res => console.error(err));
        },
        pushBeneficiario(){
            console.log("ALOHA");
        },
        checkForNull(item){
            if(item != null && item.length > 0)
                return true;
            else
                return false;
          }
    },
    mounted(){
        this.getBeneficiadosDirectos();
    }

}
</script>

<style>

</style>