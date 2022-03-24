<template>
    <div class="inner-wrap">

      <section-title
        title="Crear Nueva Obra"
        subtitle="Alternativas">
      </section-title>

      <div class="inner-options">
          <create-modal
          action="Agregar Estado"
          type="1"
          :estados="null">
          </create-modal>
          <create-modal
          action="Agregar Municipio"
          type="2"
          :estados="this.estados">
          </create-modal>
          <create-modal
          action="Agregar Localidad"
          type="3"
          :estados="this.estados">
          </create-modal>
          <create-modal
          action="Agregar C. Tributaria"
          type="4"
          :estados="this.estados">
          </create-modal>
          <create-modal
          action="Agregar Tipo Obra"
          type="5"
          :estados="this.estados">
          </create-modal>
      </div>


    <div class="control-container-resp">
        <form class="form-auto" @submit.prevent="newPublication()">

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Jefe de Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Jefe de Obra" v-model="jefeobra" name="jefeobra" required/>
                </div>

                 <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Coordinador
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Coordinador" v-model="coordinador" name="coordinador" required/>
                </div>

                 <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Paraje
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Paraje" name="paraje" v-model="paraje" required/>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Sistema
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="revista_lugar" v-model="sistema" placeholder="Sistema" required/>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Estado
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="edo_id" @change="setEstado" required>
                            <template v-for="edo in this.estados" :key="edo.id">
                                <option :value="edo.id">{{edo.estado}}</option>
                            </template>
                        </select>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Municipio
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="munic_id" @change="setMunicipio" required>
                           <option v-if="this.municipios.lenght > 0">Selecciona Municipio</option>
                            <template v-for="mun in this.municipios" :key="mun.id">
                            <option :value="mun.id">{{mun.municipio}}</option>
                            </template>
                        </select>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Localidad
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="localidad_id" @change="getCuencaTributaria" required>
                            <option v-if="this.localidades.lenght > 0">Selecciona Localidad</option>
                                <template v-for="loc in this.localidades" :key="loc.id">
                            <option :value="loc.id">{{loc.localidad}}</option>
                            </template>
                        </select>
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Clave Localidad
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" v-model="cveloc" placeholder="Clave localidad" required readonly/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Cuenca Tributaria
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" v-model="ctributaria" placeholder="Cuenca tributaria" required readonly/>
                </div>

               <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Categoría
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="cat_id" required>
                            <option v-if="this.localidades.lenght > 0">Selecciona Categoría</option>
                            <template v-for="cat in this.categorias" :key="cat.id">
                                <option :value="cat.id">{{cat.categoria}}</option>
                            </template>
                        </select>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Tipo de Obra
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="tipo_id" required>
                            <option v-if="this.localidades.lenght > 0">Selecciona Tipo de Obra</option>
                            <template v-for="tipo in this.tipos_obra" :key="tipo.id">
                                <option :value="tipo.id">{{tipo.tipo}}</option>
                            </template>
                        </select>
                    </div>
                </div>

                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Programa
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="revista_lugar" v-model="programa" placeholder="Programa" required/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Convenio Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="revista_lugar" v-model="convobra" placeholder="Convenio Obra" required/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Convenio General
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="revista_lugar" v-model="convgral" placeholder="Convenio General" required/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Coordenada N.
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="revista_lugar" v-model="coordn" placeholder="Coordenada Norte" required/>
                </div>
                
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Coordenada E.
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="revista_lugar" v-model="coorde" placeholder="Coordenada Este" required/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Beneficiados Indirectos
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="revista_lugar" v-model="benefind" placeholder="Beneficiados indirectos" required/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Beneficiados Directos
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="revista_lugar" v-model="benefdir" placeholder="Beneficiados directos" required/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Descripción
                    </label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="desc" v-model="desc" placeholder="Descripción" required></textarea>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Justificación
                    </label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="just" v-model="just" placeholder="Justificacion" required></textarea>
                </div>

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
                            <template v-for="costo,idx in this.costos_array" :key="costo.id">
                                <tr>
                                    <td>{{ idx + 1 }}</td>
                                    <td>{{ costo.fuentef_text }}</td>
                                    <td>{{ costo.concepto_text }}</td>
                                    <td>{{ costo.monto }}</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                    <div v-if="this.costos_array.length > 0" class="w-full px-3" style="margin-top:2vh; text-align:center;">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            El monto acumulado es: $ {{this.monto_acumulado}} MXN
                        </label>
                    </div>
                </div>
					</div>
					<h5 style="padding:.75rem; width:100%; margin-top:.75rem; margin-bottom:.75rem; text-align:left; font-weight:600;">COMITÉ 
						<label style="color:#bbb; font-weight:700;"> (Se puede llenar después)</label>
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

            </div>
            <div class="form-actions" style="margin-top:2vh;">
                <input ref="subbutton" class="update-btn" type="submit" value="Guardar">
            </div>
        </form>

    </div>
    </div>
</template>

<script>

import SectionTitle from '../../CustomComponent/SectionTitle.vue';
import CreateModal from './CreateModal.vue';
import ObrasCostos from './ObrasCostos.vue';

export default {
    components:{SectionTitle, CreateModal, ObrasCostos},
    props:[],
    data(){
        return{
            formdata: new FormData(),
            paraje:null, 
            jefeobra:null,
            coordinador:null, 
            edo_id:null, 
            munic_id:null, 
            localidad_id:null,
            sistema:null, 
            programa:null,
            convgral:null,
            convobra:null, 
            coordn:null,
            coorde:null,
            benefdir:null,
            benefind:null,
            desc:null,
            just:null,
            cveloc:null,
            cat_id:null, 
            tipo_id:null,
            ctributaria:null,
            cuenca_present:false,
            estados:[],
            municipios:[],
            localidades:[],
            categorias:[],
            tipos_obra:[],
            obra_saved:true,
            recent_obra:null,
            costo_total_obra:null,
            concepto_id:null, 
            fuentef_id:null,
            monto_costo:null,
            costos_array:[],
            monto_acumulado: 0,
            fuentes_fin:[],
            conceptos_obra:[],
            comite_array:[],
            nombre_com:null,
            cargo_com: null
        }
    },
    methods:{
        getEstados(){
            axios.get('/ubicaciones/estados')
            .then(res => this.estados = res.data)
            .catch(err => console.error(err));
        },
        newPublication(){
            this.formdata.append('paraje', this.paraje);
            this.formdata.append('jefeobra', this.jefeobra);
            this.formdata.append('coordinador', this.coordinador);
            this.formdata.append('edo_id', this.edo_id);
            this.formdata.append('mun_id', this.munic_id);
            this.formdata.append('local_id', this.localidad_id);
            this.formdata.append('cat_id', this.cat_id);
            this.formdata.append('tipo_id', this.tipo_id);
            this.formdata.append('ctributaria', this.ctributaria);
            this.formdata.append('cve_localidad', this.cveloc);
            this.formdata.append('sistema', this.sistema);
            this.formdata.append('programa', this.programa);
            this.formdata.append('convgral', this.convgral);
            this.formdata.append('convobra', this.convobra);
            this.formdata.append('coordn', this.coordn);
            this.formdata.append('coorde', this.coorde);
            this.formdata.append('benefdir', this.benefdir);
            this.formdata.append('benefind', this.benefind);
            this.formdata.append('desc', this.desc);
            this.formdata.append('just', this.just);
            this.formdata.append('costo_total_obra', this.costo_total_obra);
            this.formdata.append('monto_obra', this.monto_obra);
            this.formdata.append('concepto_id', this.concepto_id);
            this.formdata.append('fuente_financiera_id', this.fuentef_id);
            this.formdata.append('arreglo_costos', JSON.stringify(this.costos_array));
            this.formdata.append('arreglo_comite', JSON.stringify(this.comite_array));
				
            axios.post('/obras/store', this.formdata)
            .then((res) =>{
                console.log(res.data);
                if (res.data != false || res.data != nil){
                    alert("Se guardó con éxito el registro.");
                    this.cleanInputs();
                }
            }).catch(() => {
                alert('Ocurrió un error, verifica los datos e intenta nuevamente');
            });
        },
        cleanInputs(){
            this.paraje = null; 
            this.jefeobra = null;
            this.coordinador = null; 
            this.edo_id = null; 
            this.munic_id = null; 
            this.localidad_id = null;
            this.sistema = null; 
            this.programa = null;
            this.convgral = null;
            this.convobra = null; 
            this.coordn = null;
            this.coorde = null;
            this.benefdir = null;
            this.benefind = null;
            this.desc = null;
            this.just = null;
            this.cveloc = null;
            this.cat_id = null; 
            this.tipo_id = null;
            this.ctributaria = null;
            this.fuentef_id = null;
            this.concepto_id = null;
            this.costo_total_obra = null;
            this.cotsos_array = [];
            this.comite_array = [];
        },
		  pushCost(){
                this.costos_array.push({
                    'monto':this.monto_costo,
                    'fuentef_text':this.fuentef_text,
                    'fuentef_id':this.fuentef_id,
                    'concepto_costo_id':this.concepto_id,
                    'concepto_text':this.concepto_text,
                });
            this.monto_acumulado += parseFloat(this.monto_costo);
            this.costo_total_obra = this.monto_acumulado;
		  },
		  removeCost(){
			  	let last = this.costos_array.pop();
				this.monto_acumulado -= parseFloat(last.monto);
                this.costo_total_obra = this.monto_acumulado;
		  },

		  pushComite(){
			this.comite_array.push({
				'nombre':this.nombre_com,
				'cargo':this.cargo_com,
			});
		  },
		  removeComite(){
			  	this.comite_array.pop();
		  },

		  getConceptoText(id_c){
			  this.conceptos_obra.forEach(item => {
					if (item.id == id_c) this.concepto_text = item.concepto;
			  });
		  },
		  getFuenteFText(id_f){
			  this.fuentes_fin.forEach(item => {
					if (item.id == id_f) this.fuentef_text = item.fuente;
			  });
		  },
        setEstado(element){
            axios.get(`/ubicaciones/municipios/${element.target.value}`)
            .then(res => this.municipios = res.data)
            .catch(err => console.error(err));
            this.edo = element.target.value;
            this.localidad_id = null;
            this.munic_id = null;
        },
        setMunicipio(element){
            axios.get(`/ubicaciones/localidades/${element.target.value}`)
            .then(res => this.localidades = res.data)
            .catch(err => console.error(err));
            this.localidad_id = null;
        },
        getCuencaTributaria(){
            axios.get(`/obras/ctributaria/${this.localidad_id}`)
            .then(res => {
                if(res.data.length > 0){
                    this.ctributaria = res.data[0].c_tributaria
                    this.cuenca_present = true;
                }else{
                    this.ctributaria = "No se encontró cuenca.";
                    this.cuenca_present = false;
                }
                })
            .catch(err => console.error(err));

            // call to clave localidad
            this.getClaveLocalidad();
        },
        getClaveLocalidad(){
            axios.get(`/ubicaciones/localidad/${this.localidad_id}`)
            .then(res => this.cveloc = res.data[0].clave_localidad)
            .catch(err => console.error(err));
        },
        getCategoriasObra(){
            axios.get('/obras/categorias')
            .then(res => this.categorias = res.data)
            .catch(err => console.error(err));
        },
        getTiposObra(){
            axios.get('/obras/tipos')
            .then(res => this.tipos_obra = res.data)
            .catch(err => console.error(err));
        },
        getFuentesF(){
            axios.get('/obras/getfuentesf')
            .then(res => this.fuentes_fin = res.data)
            .catch(err => console.error(err));
        },
        getConceptos(){
            axios.get('/obras/getconceptos')
            .then(res => this.conceptos_obra = res.data)
            .catch(err => console.error(err));
        }

    },
    created(){
        this.getEstados();
        this.getCategoriasObra();
        this.getTiposObra();
		  this.getFuentesF();
		  this.getConceptos();
    }

}
</script>

<style>

.inner-content{
    width:100%;
}

.custom-wrap-01{
    width:100%;
    display:flex;
    align-items:flex-start;
    justify-content: space-evenly;
}

.right_col-flex,
.left_col-flex{
    width:100%
}

.small-title-center{
    text-align:center;
}

.inner-options{
    display:flex;
    align-items:center;
    justify-content: flex-start;
    margin-top:3vh;
    margin-bottom:3vh;
    padding-left:2vw;
}

.form-columns{
    display:flex;
    align-items:center;
    width:100%;
    justify-content: space-evenly;
}

.form-section{
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: space-evenly;
}

.form-control{
    width:100%;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content: space-between;
}
.form-element-row-end{
    display:flex;
    align-items:center;
    justify-content: space-evenly;
    width:89%;
}

.form-element-row-end input, select, textarea{
    flex-grow:1;
    max-width:70%;
    margin-top:1vh;
}

.form-element-row-end textarea{
    height:13vh;
}

.form-element-row-end label{
    font-size:18px;
    flex-grow:1;
    max-width:25%;
    text-align: left;
    font-weight:700;
}

.form-actions{
    margin-top:3vh;
    margin-bottom:2vh;
    width:89%;
    display:flex;
    align-items:center;
    justify-content: space-evenly;
}

.alt-btn {
    padding: 5px;
    padding-left: 13px;
    padding-right: 13px;
    text-align: center;
    border-radius: 13px;
    color: black;
    font-size:16px;
    border: 1px solid #ddd;
    background:#f7f7f7;
    transition: .3s all ease-in-out;
    cursor: pointer;
}

.alt-btn:hover {
    color: rgb(255, 255, 255);
    background: #22325f;
}

.control-container-resp{
    display:flex;
    align-items:center;
    justify-content:space-evenly;
    flex-direction:row;
    flex-wrap:wrap;
    width:100%;
    margin:auto;
}

@media only screen and (max-width: 500px) {

}
</style>