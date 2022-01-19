<template>
    <div>
        <button style="margin-left:1vw" ref="modalbtn" @click.prevent="modalAct" class="alt-btn">{{action}}</button>

            <div @click.prevent="modalAct" ref="modalbg" class="modal-bg">

                <div class="modal-box">

                    <div class="modal-header">
                        <h2>{{action}}</h2>
                    </div>
                    <div class="modal-body">

                        <!-- Estado -->
                        <template v-if="type == 1">
                            <form class="form-control" @submit.prevent="nuevoEstado()">
                                <div class="form-section">
                                        <div class="form-element-col-end">
                                            <label>Estado:</label>
                                            <input type="text" placeholder="Nombre estado" v-model="estado" name="edoid" required>
                                        </div>
                                </div>
                                <div class="form-actions" style="margin-top:2vh;">
                                    <button ref="closebtn" class="lean-cancel-btn">Cancelar</button>
                                    <input ref="subbutton" @click.prevent="nuevoEstado" class="update-btn" type="submit" value="Guardar">
                                </div>
                            </form>
                        </template>

                        <!-- Municipio -->
                        <template v-if="type == 2">
                            <form class="form-control" @submit.prevent="nuevoMunicipio()">
                                <div class="form-section">
                                    <div class="form-element-col-end">
                                            <label>Estado:</label>
                                            <select v-model="edo_id" @change="setEstado" required>
                                                <template v-for="edo in this.estados" :key="edo.id">
                                                <option :value="edo.id">{{edo.estado}}</option>
                                                </template>
                                            </select>
                                        <label>Municipio:</label>
                                        <input type="text" placeholder="Nombre municipio" v-model="municipio" name="munid" required>
                                    </div>
                                </div>
                                <div class="form-actions" style="margin-top:2vh;">
                                    <button ref="closebtn" class="lean-cancel-btn">Cancelar</button>
                                    <input ref="subbutton" @click.prevent="nuevoMunicipio" class="update-btn" type="submit" value="Guardar">
                                </div>
                            </form>
                        </template>

                        <!-- Localidad -->
                        <template v-if="type == 3">
                            <form class="form-control" @submit.prevent="nuevaLocalidad()">
                                <div class="form-section">
                                    <div class="form-element-col-end">
                                        <label>Estado:</label>
                                        <select v-model="edo_id" @change="setEstado" required>
                                            <template v-for="edo in this.estados" :key="edo.id">
                                            <option :value="edo.id">{{edo.estado}}</option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="form-element-col-end">
                                        <label>Municipio:</label>
                                        <select v-model="municipio_id" @change="setMunicipio" required>
                                            <option v-if="this.municipios.lenght > 0">Selecciona Municipio</option>
                                            <template v-for="mun in this.municipios" :key="mun.id">
                                            <option :value="mun.id">{{mun.municipio}}</option>
                                            </template>
                                        </select>
                                        <label>Localidad:</label>
                                        <input type="text" placeholder="Nombre Localidad" v-model="localidad" name="localidadnom" required>
                                        <label>Clave Localidad:</label>
                                        <input type="text" placeholder="Clave Localidad" v-model="cve_localidad" name="cveloc" required>
                                    </div>
                                </div>
                                <div class="form-actions" style="margin-top:2vh;">
                                    <button ref="closebtn" class="lean-cancel-btn">Cancelar</button>
                                    <input ref="locsubbtn" @click.prevent="nuevaLocalidad" class="update-btn" type="submit" value="Guardar">
                                </div>
                            </form>
                        </template>

                        <!-- Cuenca Tributaria -->
                        <template v-if="type == 4">
                            <form class="form-control" @submit.prevent="nuevaLocalidad()">
                                <div class="form-section">
                                    <div class="form-element-col-end">
                                        <label>Estado:</label>
                                        <select v-model="edo_id" @change="setEstado" required>
                                            <template v-for="edo in this.estados" :key="edo.id">
                                            <option :value="edo.id">{{edo.estado}}</option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="form-element-col-end">
                                        <label>Municipio:</label>
                                        <select v-model="municipio_id" @change="setMunicipio" required>
                                            <option v-if="this.municipios.lenght > 0">Selecciona Municipio</option>
                                            <template v-for="mun in this.municipios" :key="mun.id">
                                            <option :value="mun.id">{{mun.municipio}}</option>
                                            </template>
                                        </select>
                                    </div>
                                    <div class="form-element-col-end">
                                        <label>Localidad:</label>
                                        <select v-model="localidad_id" required>
                                            <template v-for="loc in this.localidades" :key="loc.id">
                                            <option :value="loc.id">{{loc.localidad}}</option>
                                            </template>
                                        </select>
                                        <label>Cuenca Tributaria:</label>
                                        <input type="text" placeholder="Cuenca Tributaria" v-model="cuenca_tributaria" name="cuenca" required>
                                    </div>
                                </div>
                                <div class="form-actions" style="margin-top:2vh;">
                                    <button ref="closebtn" class="lean-cancel-btn">Cancelar</button>
                                    <input ref="locsubbtn" @click.prevent="nuevaCuencaTributaria" class="update-btn" type="submit" value="Guardar">
                                </div>
                            </form>
                        </template>
                       
                        <!-- Tipo Obra -->
                        <template v-if="type == 5">
                            <form class="form-control" @submit.prevent="nuevoTipoObra()">
                                <div class="form-section">
                                    <div class="form-element-col-end">
                                        <label>Tipo Obra:</label>
                                        <input type="text" placeholder="Tipo de Obra" v-model="tipo_obra" name="cuenca" required>
                                    </div>
                                </div>
                                <div class="form-actions" style="margin-top:2vh;">
                                    <button ref="closebtn" class="lean-cancel-btn">Cancelar</button>
                                    <input ref="locsubbtn" @click.prevent="nuevoTipoObra" class="update-btn" type="submit" value="Guardar">
                                </div>
                            </form>
                        </template>
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
export default {
    props:['action', 'type', 'estados'],
    data(){
        return{
            municipios:[],
            localidades:[],
            formdata: new FormData(),
            municipio:null,
            estado:null,
            localidad:null,
            cve_localidad:null,
            edo_id:null,
            municipio_id:null,
            localidad_id:null, 
            cuenca_tributaria:null,
            tipo_obra:null,
        }
    },
    methods:{
        modalAct(event){
            if(event.target == this.$refs.closebtn || event.target == this.$refs.modalbg || event.target == this.$refs.modalbtn || event.target == this.$refs.spanbtn){
                this.$refs.modalbg.classList.toggle('modal-bg-active');
            }
        },
        nuevoEstado(){
            this.formdata.append('estado', this.estado);

            axios.post('/ubicaciones/nuevo/estado',this.formdata)
            .then(res => console.log(res.data))
            .catch( alert('Ocurrió un error, verifica los datos e intenta nuevamente') );
        },
        nuevoMunicipio(){
            this.formdata.append('edo_id', this.edo_id);
            this.formdata.append('municipio', this.municipio);

            axios.post('/ubicaciones/nuevo/municipio',this.formdata)
            .then(res => console.log(res.data))
            .catch( alert('Ocurrió un error, verifica los datos e intenta nuevamente') );
        },
        nuevaLocalidad(){
            this.formdata.append('cve_localidad', this.cve_localidad);
            this.formdata.append('mun_id', this.municipio_id);
            this.formdata.append('localidad', this.localidad);

            axios.post('/ubicaciones/nuevo/localidad',this.formdata)
            .then(res => console.log(res.data))
            .catch( alert('Ocurrió un error, verifica los datos e intenta nuevamente') );
        },
        nuevaCuencaTributaria(){
            this.formdata.append('localidad_id', this.localidad_id);
            this.formdata.append('cuenca_trib', this.cuenca_tributaria);

            axios.post('/cuencatributaria/nueva',this.formdata)
            .then(res => console.log(res.data))
            .catch( alert('Ocurrió un error, verifica los datos e intenta nuevamente'));
        },
        nuevoTipoObra(){
            axios.get(`/obras/tipos/nuevo/${this.tipo_obra}`)
            .then(res => alert("Se creó con éxito"))
            .catch(err => console.error(err));
        },
        setEstado(element){
            axios.get(`/ubicaciones/municipios/${element.target.value}`)
            .then(res => this.municipios = res.data)
            .catch(err => console.error(err));
            this.edo = element.target.value;
        },
        setMunicipio(element){
            axios.get(`/ubicaciones/localidades/${element.target.value}`)
            .then(res => this.localidades = res.data)
            .catch(err => console.error(err));
        },
    },
    created(){
    }

}
</script>

<style>
.update-btn{
    border-radius:13px;
    border:1px solid rgb(2,61,0);
    padding:8px;
    background:#ffffff;
    color:rgb(2, 61, 0);
    cursor:pointer;
}
.form-element-col-end{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
    align-items:center;
    justify-content: space-evenly;
    width:100%;
}

.form-element-col-end label{
    width:34%;
    font-size:18px;
    font-weight:700;
    text-align:right;
    text-decoration:underline;
    padding-right:13px;
}

.form-element-col-end select,
.form-element-col-end input{
    flex-grow:1;
    margin-top:1vh;
    min-width:55%;
}

.lean-create-btn {
    padding: 3px;
    padding-left: 8px;
    padding-right: 8px;
    text-align: center;
    border-radius: 13px;
    color: #0e76ff;
    border: 1px solid #0e76ff;
    transition: .3s all ease-in-out;
    cursor: pointer;
}

.lean-create-btn:hover {
    color: white;
    background: #0e76ff;
}

.lean-delete-btn,
.lean-edit-btn {
    text-align: center;
    border-radius: 13px;
    margin-top: 2px;
    font-size: 13px;
    transition: .3s all ease-in-out;
    padding: 3px;
    border: 1px solid #bbb;
    cursor: pointer;
}

.lean-edit-btn {
    color: #0e76ff;
}

.lean-delete-btn {
    color: #e84043;
}

.lean-edit-btn:hover,
.lean-delete-btn:hover {
    color: black;
}

.modal-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: #00000070;
    display: flex;
    align-items: center;
    justify-content: center;
    visibility: hidden;
    opacity: 0;
    transition: .3s all ease-in-out;
}

.modal-bg-active {
    visibility: visible;
    opacity: 1;
}

.modal-box {
    background: white;
    border-radius: 13px;
    height: 70%;
    width: 89%;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    flex-direction: column;
    position: relative;
    overflow: scroll;
}

.modal-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-weight: 600;
    color: #555;
    cursor: pointer;
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    width: 89%;
    height: 5vh;
    border-bottom: 3px solid #e84043;
}

.modal-header h2 {
    color: #333;
    font-size: 24px;
    font-weight: 600;
}

.modal-body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    width: 89%;
    margin-top: 1vh;
    margin-bottom: 1vh;
}

#modal-salute {
    width: 100%;
    text-align: left;
    font-size: 21px;
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 1vh;
}

.modal-body p {
    text-align: justify;
    font-size: 18px;
    color: #444;
    font-weight: 400;
}

.modal-footer {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
    width: 89%;
    background: #ff6e3021;
    border-radius: 13px;
    padding-left: 3px;
}

.modal-footer label {
    font-size: 15px;
}

@media only screen and (max-width: 500px) {
    #modal-salute {
        font-size: 18px;
    }
    .modal-header h2 {
        font-size: 16px;
    }
    .modal-body p {
        font-size: 15px;
    }
}
</style>