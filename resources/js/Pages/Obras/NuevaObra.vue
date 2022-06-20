<template>
    <div class="inner-wrap">

      <section-title
        title="Crear Nueva Obra"
        subtitle="Alternativas">
      </section-title>

      <div v-if="this.$page.props.auth.user.tipo_usuario == 1" class="inner-options">
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

                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Beneficiados Indirectos
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" name="revista_lugar" v-model="benefind" placeholder="Beneficiados indirectos" required/>
                </div>

               <beneficiarios-directos 
                @onUpdateBenefArray = "updateBeneficiariosDirArray($event)"
               />

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

                <obras-costos 
                    @onUpdateCostArray="updateCostArray($event)"
                    :conceptos="this.conceptos_obra"
                    :f_fin="this.fuentes_fin" 
                ></obras-costos>

                <obras-comite 
                    @onUpdateComiteArray="updateComiteArray($event)"/>

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
import ObrasCostos from './complementos/ObrasCostos.vue';
import ObrasComite from './complementos/ObrasComite.vue';
import BeneficiariosDirectos from './complementos/BeneficiariosDirectos.vue';

export default {
    components:{ SectionTitle, CreateModal, ObrasCostos, ObrasComite, BeneficiariosDirectos },
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
            concepto_id:null, 
            fuentes_fin:[],
            conceptos_obra:[],
            cost_array_p:[],
            comite_array_p:[],
            beneficiarios_directos:[]
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
            this.formdata.append('concepto_id', this.concepto_id);
            this.formdata.append('fuente_financiera_id', this.fuentef_id);
            this.formdata.append('arreglo_costos', JSON.stringify(this.cost_array_p));
            this.formdata.append('arreglo_comite', JSON.stringify(this.comite_array_p));
            this.formdata.append('arreglo_beneficiarios_dir', JSON.stringify(this.beneficiarios_directos));

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
            this.concepto_id = null;
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
        },
        updateCostArray(data){
            this.cost_array_p = data;
        },
        updateComiteArray(data){
            this.comite_array_p = data;
        },
        updateBeneficiariosDirArray(data){
            this.beneficiarios_directos = data;
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