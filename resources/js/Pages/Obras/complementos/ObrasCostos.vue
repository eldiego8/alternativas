<template>
<h5 style="padding:.75rem; width:100%; margin-top:.75rem; margin-bottom:.75rem; text-align:left; font-weight:600;">COSTOS 
	<label style="color:#bbb; font-weight:700;"> (Se pueden llenar después)</label>
</h5>

	<div class="w-full px-3">
		<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
			Costo Total de Obra
		</label>
		<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="costo_total_obra" type="text" />
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
						<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="fuentef_id" @change="getFuenteFText(fuentef_id)" required>
							<option v-if="this.fuentes_fin.lenght > 0">Fuente Financiera</option>
							<template v-for="fuente in this.fuentes_fin" :key="fuente.id">
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
					<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="concepto_id" @change="getConceptoText(concepto_id)" required>
						<option v-if="this.conceptos_obra.lenght > 0">Concepto de Obra</option>
						<template v-for="conc in this.conceptos_obra" :key="conc.id">
							<option :value="conc.id">{{conc.concepto}}</option>
						</template>
					</select>
				</div>
			</div>
		<div class="w-full px-3 mb-6 md:mb-0">
			<div class="form-actions" style="margin-top:2vh;">
					<template v-if="this.costos_array.length > 0">
					<button ref="subbutton" class="update-btn" @click.prevent="removeCost" style="color:#e84043; border-color:#e84043;">Eliminar último</button>            				
				</template>
				<button ref="subbutton" class="update-btn" @click.prevent="pushCost" style="color:#e84043; border-color:#e84043;">Añadir Costo</button>
			</div>
		</div>
		</div>
	</div>

</template>

<script>
export default {

}
</script>

<style>

</style>