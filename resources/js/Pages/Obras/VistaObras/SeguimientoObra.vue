<template>
  <div class="control-element">
	  <div class="control-element-header">
		<h2><b>Seguimiento de Obra:</b> {{ clave_obra }}</h2>
	  </div>

		<div class="control-element">

			<template v-if="this.logjson.length == 0">
				<label style="margin-top:2vh;">No se encontraron registros de seguimiento para esta obra.</label>
			</template>

			<table v-else class="table-auto">
				<thead>
					<tr>
						<th style="text-align:left">#</th>
						<th style="text-align:left">Fecha de Entrada</th>
						<th style="text-align:left">Comentario</th>
					</tr>
				</thead>
				<tbody>
					<template v-for="log,idx in this.logjson" :key="log.id">
						<tr>
							<td>{{ idx + 1 }}</td>
							<td>{{ log.fecha_obs }}</td>
							<td>{{ log.descripcion }}</td>
							<td>
								<button @click.prevent="dropLog(log.id)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 19c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5-17v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712zm-3 4v16h-14v-16h-2v18h18v-18h-2z"/></svg></button>
							</td>
						</tr>
					</template>
				</tbody>
			</table>
		</div>

		<form class="form-auto" @submit.prevent="newPublication()">

			<div class="flex flex-wrap -mx-3 mb-6">
				<div class="w-full px-3">
					<b>Fecha de Observación</b><br>
					<input type="date" v-model="logdate">
				</div>

				<div class="w-full px-3">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Observación
					</label>
					<textarea style="margin-top:1vh;" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="logdesc"> </textarea>
				</div>
			</div>

			<div class="form-actions" style="margin-top:2vh;">
				<input ref="subbutton" style="transition:.3s all ease-in-out; cursor:pointer;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit" value="Agregar Registro a Log" @click.prevent="addLog">
			</div>
    	</form>

  </div>
</template>

<script>
export default {
    props:['obra_id', 'clave_obra'],
	 data(){
		 return{
			logdate:null,
			logdesc:null,
			logform: new FormData(),
			logjson:[],
		 }
	},
	methods:{
		getLogs(){
			axios.get(`/obras/logs/get/${this.obra_id}`)
			.then(res => this.logjson = res.data.length == 0 ? [] : res.data)
			.catch(err => console.error(err));
		},
		addLog(){
			if(this.logdate != null && this.logdesc != null && this.logdesc.length > 0){
				this.logform.append('payload', JSON.stringify({
					"obra_id":this.obra_id,
					"date":this.logdate,
					"desc":this.logdesc
				}));

				axios.post('/obras/logs/new', this.logform )
				.then(res => this.getLogs())
				.catch(err => console.error(err));
			}
		},
		dropLog(log_id){
			axios.delete(`/obras/logs/drop/${log_id}`)
			.then(() => this.getLogs())
			.catch(err => console.error(err));
		}
	},
	mounted(){
		this.getLogs();
	}
}
</script>

<style>

.control-element{
	margin:auto;
	display:flex;
	flex-direction:column;
	align-items:center;
	justify-content:center;
	width:100%;
	margin-top:3vh;
	border-top:1px solid #eee;
	padding:8px;
}

.control-element-header{
	display:flex;
	align-items:center;
}

.control-element-header h2,
.control-element-header h3{
	font-size:21px;
	font-weight:600;
}

</style>