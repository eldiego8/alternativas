<template>
<h5 style="padding:.75rem; width:100%; margin-top:.75rem; margin-bottom:.75rem; text-align:left; font-weight:600;">COSTOS 
	<label style="color:#bbb; font-weight:700;"> (Puede completarse después)</label>
</h5>

	<div class="w-full px-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
			Costo Total de Obra
		</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="costo_total_obra" type="text" readonly />
	</div>
	
	<div class="custom-wrap-01">

		<div class="left_col-flex">
			<div class="w-full px-3 mb-6 md:mb-0">
				<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
						Monto
				</label>
				<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="monto_costo" type="text"/>
			</div>

			<div class="w-full px-3 mb-6 md:mb-0">
				<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
						Fuente Financiera
				</label>
				<div class="relative">
						<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="fuentef_id" @change="getFuenteFText(fuentef_id)">
							<option v-if="this.f_fin.lenght > 0">Fuente Financiera</option>
							<template v-for="fuente in this.f_fin" :key="fuente.id">
								<option :value="fuente.id">{{fuente.fuente}}</option>
							</template>
						</select>
				</div>
			</div>

			<div class="w-full px-3 mb-6 md:mb-0">
				<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
						Concepto
				</label>
				<div class="relative">
					<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="concepto_id" @change="getConceptoText(concepto_id)">
						<option v-if="this.conceptos.lenght > 0">Concepto de Obra</option>
						<template v-for="conc in this.conceptos" :key="conc.id">
							<option :value="conc.id">{{conc.concepto}}</option>
						</template>
					</select>
				</div>
			</div>
		<div class="w-full px-3 mb-6 md:mb-0">
			<div class="form-actions" style="margin-top:2vh;">
				<template v-if="this.c_array.length > 0">
					<button ref="subbutton" class="update-btn" @click.prevent="removeCost" style="color:#e84043; border-color:#e84043;">Eliminar último</button>            				
				</template>
				<button ref="subbutton" class="update-btn" @click.prevent="pushCost" style="color:#e84043; border-color:#e84043;">Añadir Costo</button>
			</div>
		</div>
	</div>
	<div class="right_col-flex">
	<div class="w-full px-3" style="margin-top:2vh; text-align:center;">
	<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
		Tabla de Costos
	</label>
	</div>
		<table class="table-auto">
		<thead>
			<tr>
					<th style="text-align:left">#</th>
					<th style="text-align:left">Fuente F.</th>
					<th style="text-align:left">Concepto</th>
					<th style="text-align:left">Monto</th>
			</tr>
		</thead>
		<tbody>
			<template v-for="costo,idx in this.c_array" :key="costo.id">
					<tr>
							<td>{{ idx + 1 }}</td>
							<td>{{ costo.fuentef_text }}</td>
							<td>{{ costo.concepto_text }}</td>
							<td>{{ costo.monto }}</td>
					</tr>
			</template>
		</tbody>
		</table>
		<div v-if="this.c_array.length > 0" class="w-full px-3" style="margin-top:2vh; text-align:center;">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
			El monto acumulado es: $ {{this.monto_acumulado}} MXN
		</label>
		</div>
		</div>
</div>

</template>

<script>
export default {
	props:['f_fin', 'conceptos'],
	emits: ["onUpdateCostArray"],
	data(){
		return{
			costo_total_obra:null,
			monto_costo:null, 
			fuentef_id:null, 
			concepto_id:null,
			concepto_text:null,
			c_array:[],
			monto_acumulado: 0		
		}
	},
	methods:{
		pushCost(){
			this.c_array.push({
				'monto':this.monto_costo,
				'fuentef_text':this.fuentef_text,
				'fuentef_id':this.fuentef_id,
				'concepto_costo_id':this.concepto_id,
				'concepto_text':this.concepto_text,
			});
			
			this.monto_acumulado += parseFloat(this.monto_costo);
			this.costo_total_obra = this.monto_acumulado;
			this.updateCostArray();
		  },

		  removeCost(){
				let last = this.c_array.pop();
				this.monto_acumulado -= parseFloat(last.monto);
				this.costo_total_obra = this.monto_acumulado;
		  },
			getConceptoText(id_c){
				this.conceptos.forEach(item => {
					if (item.id == id_c) this.concepto_text = item.concepto;
				});
		  },
		  getFuenteFText(id_f){
			  this.f_fin.forEach(item => {
					if (item.id == id_f) this.fuentef_text = item.fuente;
			  });
		  },
		updateCostArray(){
			this.$emit('onUpdateCostArray', this.c_array);
		},
		testUpd(){ this.$emit('testUpd', 32); }
	},
}
</script>

<style>

</style>