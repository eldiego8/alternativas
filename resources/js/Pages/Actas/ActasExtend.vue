<template>

    <div class="container-custom">
        <form @submit.prevent="avisoInicio" v-if="type == 1 && this.obra.aut == 'En espera'" class="form-auto" style="display:flex; flex-wrap:wrap;">
				<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Estado:
					</label>
					<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Estado" v-model="this.obra.edo" name="Estado" required readonly/>
			  </div>
				<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Municipio:
					</label>
					<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Municipio" v-model="this.obra.mun" name="Mun" required readonly/>
			  </div>
				<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Localidad:
					</label>
					<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Localidad" v-model="this.obra.loc" name="Loc" required readonly/>
			  </div>
			  <div class="w-full px-3">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Paraje:
					</label>
					<input @change.prevent="avisoInicio" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Paraje" v-model="paraje_aviso" name="paraje" required/>
			  </div>
			  <div class="w-full px-3">
					<a v-if="this.paraje_aviso != null && this.paraje_aviso.length > 1" :href="route('makePdf_inicio',{'obra_id': this.obra.obra_id, 'paraje': this.paraje_aviso != null? this.paraje_aviso : null })" @click="reloadAll" style="display:flex; padding:8px; border-radius:13px; background:#e84043; color:white; font-weight:800; justify-content:center; align-items:center;">PDF Aviso Inicio <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 11h5l-9 10-9-10h5v-11h8v11zm1 11h-10v2h10v-2z"/></svg></a>
			  </div>
		  </form>
		  <template v-else-if="type == 1 && this.obra.aut != 'En espera'"  >
			  <h4 class="aviso_not">Ya se ha generado un aviso de Inicio de Obra</h4>
		  </template>

		<form @submit.prevent="avisoTermino" v-else-if="type == 2 && this.obra.aut == 'En proyecto'" class="form-auto" style="display:flex; flex-wrap:wrap;">
			<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
				<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
					Estado:
				</label>
				<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Estado" v-model="this.obra.edo" name="Estado" required readonly/>
			</div>
			<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
				<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
					Municipio:
				</label>
				<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Municipio" v-model="this.obra.mun" name="Mun" required readonly/>
			</div>
			<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
				<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
					Localidad:
				</label>
				<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Localidad" v-model="this.obra.loc" name="Loc" required readonly/>
			</div>
			<div class="w-full px-3">
				<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
					Paraje:
				</label>
				<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Paraje" v-model="paraje_aviso" name="paraje" required/>
			</div>
			<div class="w-full px-3">
				<a v-if="this.paraje_aviso != null && this.paraje_aviso.length > 1" :href="route('makePdf_termino',{'obra_id': this.obra.obra_id, 'paraje': this.paraje_aviso != null? this.paraje_aviso : null })" @click="reloadAll" style="display:flex; padding:8px; border-radius:13px; background:#e84043; color:white; font-weight:800; justify-content:center; align-items:center;">PDF Aviso Terminación <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 11h5l-9 10-9-10h5v-11h8v11zm1 11h-10v2h10v-2z"/></svg></a>
			</div>
		</form>
		<template v-else-if="type == 2 && this.obra.aut != 'En proyecto'">
			<h4 class="aviso_not">No puede generarse el aviso de terminación de obra</h4> 
		</template>

        <form v-if="type == 3" class="form-auto" style="display:flex; flex-wrap:wrap;">
			<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Estado:
					</label>
					<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Estado" v-model="this.obra.edo" name="Estado" required readonly/>
			  </div>
				<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Municipio:
					</label>
					<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Municipio" v-model="this.obra.mun" name="Mun" required readonly/>
			  </div>
				<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Localidad:
					</label>
					<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Localidad" v-model="this.obra.loc" name="Loc" required readonly/>
			  </div>
			  <div class="w-full px-3">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Nombre de Obra:
					</label>
					<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Nombre de Obra" v-model="nombre_obra_aviso" name="nombre" required/>
			  </div>
			  <div class="w-full px-3">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Paraje:
					</label>
					<input @change.prevent="avisoInicio" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Paraje" v-model="paraje_aviso" name="paraje" required/>
			  </div>
			  <div class="w-full px-3">
					<a v-if="this.payload != null" :href="route('makePdf_convenio',{'obra_id': this.obra.obra_id, 'payload': this.paraje_aviso != null? this.paraje_aviso : null })" style="display:flex; padding:8px; border-radius:13px; background:#e84043; color:white; font-weight:800; justify-content:center; align-items:center;">PDF Convenio de Obra <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 11h5l-9 10-9-10h5v-11h8v11zm1 11h-10v2h10v-2z"/></svg></a>
			  </div>
        </form>

    </div>

</template>

<script>
export default {
	props:['type', 'obra', 'edo_aut'],
	data(){
		return{
			start_date:null,
			form_on: false,
			paraje_aviso:null,
			nombre_obra_aviso:null,
			payload:null,
		}
	},
    methods:{
		 avisoInicio(){
			 this.payload = {
				 'estado': "this.obra.edo",
				 'mun': "this.obra.mun",
				 'loc': "this.obra.loc",
				 'paraje': "this.paraje_aviso"
			 }

			//  axios.get(`/obras/pdf/${this.obra.obra_id}/${JSON.stringify(this.payload)}`)
			//  .then(res => console.log(res.data))
			//  .catch(err => console.error(err));
		 },
		 reloadAll(){
			 this.$emit('download', true);
		 }

    },
	 created(){
		 console.log(this.obra);
	 }
}
</script>

<style>



.container-custom{
	width:100%;
	border:1px solid #ddd;
	border-radius:13px;
	display:flex;
	align-items:center;
	justify-content:space-evenly;
	flex-wrap:wrap;
	margin-bottom:3vh;
}

.aviso_not{
	padding: 13px;
	text-transform: uppercase;
	color: #333;
	font-weight: 700;
	
}

</style>