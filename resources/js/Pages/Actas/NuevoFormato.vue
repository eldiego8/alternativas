<template>
    <button v-if="!this.createNewTrigger" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded space" @click.prevent="this.createNewTrigger = true" >
        Crear Nuevo Formato
    </button>
    <button v-if="this.createNewTrigger" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded space" @click.prevent="this.createNewTrigger = false" >
        Cancelar Nuevo Formato
    </button>
    <template v-if="createNewTrigger">
        
         <form class="form-auto" @submit.prevent="newPublication()">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Nombre de Formato
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Nombre del formato" v-model="nombre_formato" name="jefeobra" required/>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Descripcion de Formato
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Descripción del formato (caso, uso, etc.)" v-model="descripcion_formato" name="jefeobra" required/>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Título Documento
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Título de documento" v-model="titulo_doc" name="jefeobra" required/>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Lugar
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Lugar" v-model="lugar" name="jefeobra" required/>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Fecha
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="date" v-model="fecha" name="jefeobra" required/>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Párrafo de Presentación
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Jefe de Obra" v-model="par_presentacion" name="jefeobra" required/>
                </div>
                <template v-for="idx in this.num_par" :key="idx">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Parrafo de Contenido #{{this.num_par}}
                        </label>
                        <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Párrafo de contenido" v-model="pars_contenido[this.num_par - 1]" name="jefeobra" required/>
                    </div>
                </template>
                <template v-if="this.num_par < 15">
                    <button @click.prevent=" this.num_par++; ">Añadir Párrafo</button>
                </template>
            </div>

            <div class="form-actions" style="margin-top:2vh;">
                <input ref="subbutton" class="update-btn" type="submit" value="Guardar" @click.prevent="this.setPayload">
            </div>

        </form>

    </template>
</template>

<script>
export default {
    data(){
        return{
            createNewTrigger: false,
            nombre_formato: null,
            descripcion_formato: null, 
            titulo_doc: null,
            lugar: null, 
            fecha: null, 
            par_presentacion: null, 
            pars_contenido: [],
            num_par: 1,
            payload:[],
            formdata: new FormData(),
        }
    },
    methods:{

        setPayload(){
            this.payload.push({
                'nombre':this.nombre_formato,
                'descripcion':this.descripcion_formato,
                'titulo': this.titulo_doc,
                'lugar': this.lugar,
                'fecha': this.fecha,
                'par_presentacion': this.par_presentacion,
            });
            this.formdata.append('payload',JSON.stringify(this.payload));
            this.storeFormat();
		  },
		  storeFormat(){
            axios.post('/formatos/new', this.formdata)
            .then(res => console.lod(res.data))
            .catch(err => console.error(err));
		  },
          updateComiteArray(){
              this.$emit('onUpdateComiteArray', this.comite_array);
          }
    }

}
</script>

<style>
.space{
    margin-top:3vh;
    margin-bottom:3vh;
}

.form-actions{
    margin-top:3vh;
    margin-bottom:2vh;
    width:89%;
    display:flex;
    align-items:center;
    justify-content: space-evenly;
}

</style>