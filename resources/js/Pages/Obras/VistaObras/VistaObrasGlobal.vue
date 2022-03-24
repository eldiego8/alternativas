<template>

    <template v-if="!this.editFunction">
        <table class="table-auto" style="margin:5vh auto;">
            <thead>
                <tr>
                    <th class="px-6 py-2">Clave Obra</th>
                    <th class="px-6 py-2">Jefe de Obra</th>
                    <th class="px-6 py-2">Coordinador</th>
                    <th class="px-6 py-2">Estado</th>
                    <th class="px-6 py-2">Municipio</th>
                    <th class="px-6 py-2">Edo. Autorización</th>
                    <th class="px-6 py-2">Fecha de Inicio</th>
                    <th class="px-6 py-2">Fecha de Fin</th>
                    <th class="px-14 py-2">Detalles</th>
                </tr>
            </thead>
            <tbody>
                <template v-if="!this.searchView && !this.editFunction">
                    <template v-for="obra in this.registros" :key="obra.id">
                        <tr>
                            <td :id="obra.id" class="border px-6 py-2">{{obra.clave_obra}}</td>
                            <td class="border px-6 py-2">{{obra.jefe_obra}}</td>
                            <td class="border px-6 py-2">{{obra.coordinador}}</td>
                            <td class="border px-6 py-2">{{obra.estado}}</td>
                            <td class="border px-6 py-2">{{obra.municipio}}</td>
                            <td class="border px-6 py-2">{{obra.edo_aut}}</td>
                            <td class="border px-6 py-2">{{obra.fecha_inicio}}</td>
                            <td class="border px-6 py-2">{{obra.fecha_termino}}</td>
            
                            <td class="border px-10 py-6" style="text-align:center;">
                                <button @click.prevent="enableEdit(obra.obra_id)" class="edit-btn" style="text-align:center;">Detalle/Editar</button>
                            </td>

                        </tr>
                    </template>
                </template>
                <template v-else-if="this.searchView && !this.editFunction">
                    <template v-for="obra in this.obras_search" :key="obra.id">
                        <tr>
                            <td :id="obra.id" class="border px-6 py-2">{{obra.clave_obra}}</td>
                            <td class="border px-6 py-2">{{obra.jefe_obra}}</td>
                            <td class="border px-6 py-2">{{obra.coordinador}}</td>
                            <td class="border px-6 py-2">{{obra.estado}}</td>
                            <td class="border px-6 py-2">{{obra.municipio}}</td>
                            <td class="border px-6 py-2">{{obra.edo_aut}}</td>
                            <td class="border px-6 py-2">{{obra.fecha_inicio}}</td>
                            <td class="border px-10 py-6">
                                <button @click.prevent="enableEdit(obra.obra_id)" class="edit-btn" style="text-align:center;">Ver/Editar</button>
                            </td>
                        </tr>
                    </template>
                </template>
            </tbody>
        </table>
    </template>
    <template v-else >
        <form class="form-auto">
            <div class="header-row">
                <h2 style="font-weight:700; margin-bottom:1vh; font-size:21px;">DETALLES DE OBRA CON CLAVE: {{this.obra_edit.clave_obra}} </h2>
                <a :href="route('makePdf',{'obra_id': this.obra_edit.obra_id})" style="display:flex; padding:8px; border-radius:13px; background:#e84043; color:white; font-weight:800;">PDF de Obra <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 11h5l-9 10-9-10h5v-11h8v11zm1 11h-10v2h10v-2z"/></svg></a>
            </div>

            <actas-obra 
                @download="docready"
                :obra="this.obra_edit">
            </actas-obra>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Jefe de Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="this.oedit_jefe_obra" type="text" :placeholder="this.obra_edit.jefe_obra"/>
                </div>

                 <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Paraje
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="this.oedit_paraje" type="text" :placeholder="this.obra_edit.paraje"/>
                </div>

                 <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Coordinador
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="this.oedit_coordinador" type="text" :placeholder="this.obra_edit.coordinador"/>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Sistema
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="this.oedit_sistema" type="text" :placeholder="this.obra_edit.sistema"/>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Estado
                    </label>
                    <div class="relative">
                        <input class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" readonly v-model="this.oedit_estado" type="text"/>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Municipio
                    </label>
                    <div class="relative">
                        <input class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" readonly v-model="this.oedit_municipio" type="text"/>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Localidad
                    </label>
                    <div class="relative">
                        <input class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" readonly v-model="this.oedit_localidad" type="text"/>
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Clave Localidad
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" :value="this.obra_edit.clave_localidad" type="text" readonly/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Cuenca Tributaria
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_ctributaria" type="text" :placeholder="this.obra_edit.c_tributaria" readonly/>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Tipo de Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_tipo" type="text" :placeholder="this.obra_edit.tipo"/>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Categoría
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_categoria" type="text" :placeholder="this.obra_edit.categoria"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Situación de Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_situacion" type="text" :placeholder="this.obra_edit.situacion" readonly/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Estado Autorización
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" readonly v-model="oedit_edo_aut" type="text" :placeholder="this.obra_edit.edo_aut"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Convenio Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_conv_obra" type="text" :placeholder="this.obra_edit.convenio_obra"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Convenio General
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_conv_general" type="text" :placeholder="this.obra_edit.convenio_general"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Coordenada N.
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_coord_n" type="text" :placeholder="this.obra_edit.coordenada_n"/>
                </div>
                
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Coordenada E.
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_coord_e" type="text" :placeholder="this.obra_edit.coordenada_e"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Beneficiado Directo
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_ben_dir" type="text" :placeholder="this.obra_edit.beneficiado_directo"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Beneficiado Indirecto
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_ben_ind" type="text" :placeholder="this.obra_edit.beneficiado_indirecto"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Fecha de inicio <span style="color:#aaa;">(AAAA-mm-dd)</span>
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" readonly v-model="oedit_fecha_i" type="text" :placeholder="this.obra_edit.fecha_inicio"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Fecha de fin <span style="color:#aaa;">(AAAA-mm-dd)</span>
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" readonly v-model="oedit_fecha_f" type="text" :placeholder="this.obra_edit.fecha_fin"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Descripción
                    </label>
                    <textarea rows="10" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_descripcion"> </textarea>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Justificación
                    </label>
                    <textarea rows="10" class="appearance-none block w-full bg-gray-200 text-gray-700 border  rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_justificacion"></textarea>
                </div>

                <h5 style="padding:.75rem; width:100%; margin-top:.75rem; margin-bottom:.75rem; text-align:left; font-weight:600;">COSTOS</h5>

                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Costo Total de Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-black-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" readonly v-model="costo_total_obra" type="text" />
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
										<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" v-model="concepto_id" @change="getConceptoText(concepto_id)">
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
											<th style="text-align:left">FuenteF</th>
											<th style="text-align:left">Concepto</th>
											<th style="text-align:left">Monto</th>
										</tr>
									</thead>
									<tbody>
										<template v-for="costo,idx in this.costos_obra_edit" :key="costo.id">
											<tr>
												<td>{{ idx + 1 }}</td>
												<td>{{ costo.fuentef_text }}</td>
												<td>{{ costo.concepto_text }}</td>
												<td>{{ costo.monto }}</td>
												<td><button @click.prevent="dropCosto(idx)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 19c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5-17v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712zm-3 4v16h-14v-16h-2v18h18v-18h-2z"/></svg></button></td>
											</tr>
										</template>
									</tbody>
							</table>
							<div class="w-full px-3" style="margin-top:2vh; text-align:center;">
									<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
										El monto acumulado es: $ {{this.monto_acumulado}} MXN
									</label>
							</div>
						</div>
					</div>

					<div class="custom-wrap-01 divide-y">
						<div class="left_col-flex">
							<div class="w-full px-3 mb-6 md:mb-0">
								<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
									Nombre
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
									<template v-for="comite,idx in this.comite_obra_edit" :key="comite.id">
										<tr>
											<td>{{ idx + 1 }}</td>
											<td>{{ comite.nombre }}</td>
											<td>{{ comite.cargo }}</td>
											<td><button @click.prevent="dropComite(idx)"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9 19c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5-17v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712zm-3 4v16h-14v-16h-2v18h18v-18h-2z"/></svg></button></td>
										</tr>
									</template>
								</tbody>
							</table>
						</div>
					</div>
                
                <template v-if="seguimiento">
                    <seguimiento-obra
                    :obra_id="this.obra_edit.obra_id"
                    :clave_obra="this.obra_edit.clave_obra">
                    </seguimiento-obra>
                </template>

                <div class="form-actions">
                    <button class="bg-black text-white font-bold py-2 px-4 rounded-full" @click.prevent="() => {this.editFunction = false;}">
                        Volver
                    </button>
                    <button v-if="!seguimiento" @click.prevent="() => this.seguimiento = !this.seguimiento" style="transition:.3s all ease-in-out" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Seguimiento a Obra
                    </button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" @click.prevent="updateData">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </template>

</template>

<script>
import SeguimientoObra from './SeguimientoObra.vue'; 
import ActasObra from '../../Actas/ActasObra.vue'
export default {
    components:{ SeguimientoObra, ActasObra },
    props:['registros', 'search_input'],
    data(){
        return{
            oedit_jefe_obra:null,
            oedit_paraje:null,
            oedit_coordinador:null,
            oedit_sistema:null,
            oedit_estado:null,
            oedit_municipio:null,
            oedit_localidad:null,
            oedit_clave_loc:null,
            oedit_ctributaria:null,
            oedit_tipo:null,
            oedit_categoria:null,
            oedit_situacion:null,
            oedit_edo_aut:null,
            oedit_conv_obra:null,
            oedit_conv_general:null,
            oedit_coord_n:null,
            oedit_coord_e:null,
            oedit_ben_dir:null,
            oedit_ben_ind:null,
            oedit_descripcion:null,
            oedit_justificacion:null,
            oedit_fecha_i:null,
            oedit_fecha_f:null,
            searchView:false,
            obras_search:[],
            editFunction: false,
            edit_obra: null,
            costo_total_obra:null,
            concepto_id:null, 
            fuentef_id:null,
            monto_costo:null,
            costos_array:[],
            monto_acumulado: 0,
            fuentes_fin:[],
            conceptos_obra:[],
            costos_obra_edit: [],
            comite_obra_edit: [],
            cargo_com:null,
            nombre_com:null,
            concepto_text:null,
            fuentef_text:null,
            updatedata:[],
            estados_bd:[],
            municipios_bd:[],
            localidades_bd:[],
            updateform: new FormData(),
            seguimiento:false,
        }
    },
    watch:{
        search_input: function(new_input){
            this.watchText(new_input);
        },
    },
    methods:{
        setLocationsStart(){
            this.setEstado(this.obra_edit.estado_id);
            this.setMunicipio(this.obra_edit.municipio_id);
            this.oedit_localidad = this.obra_edit.localidad;
        },
        watchText(input){
            if(input.length == 0){
                this.searchView = false;
                this.obras_search = []; 
            }
            this.searchInputWatcher(input);
        },
        docready(down){
            setTimeout(() => {this.editFunction = false;}, 2500);
        },
        updateData(){
            this.updatedata = {
                'jefeobra':this.oedit_jefe_obra,
                'coordinador':this.oedit_coordinador, 
                'paraje':this.oedit_paraje,
                'sistema':this.oedit_sistema,
                'tipo':this.oedit_tipo,
                'categoria':this.oedit_categoria,
                'situacion':this.oedit_situacion,
                'edo_aut':this.oedit_edo_aut,
                'convenio_obra':this.oedit_conv_obra,
                'convenio_general':this.oedit_conv_general,
                'coordenada_n':this.oedit_coord_n,
                'coordenada_e':this.oedit_coord_e,
                'beneficiado_directo':this.oedit_ben_dir,
                'beneficiado_indirecto':this.oedit_ben_ind,
                'descripcion':this.oedit_descripcion,
                'justificacion':this.oedit_justificacion,
                'fecha_inicio':this.oedit_fecha_i,
                'fecha_fin':this.oedit_fecha_f,
                'total':this.costo_total_obra,
                'obra_id':this.obra_edit.obra_id,
            };
            this.updateform.append('general_info', JSON.stringify(this.updatedata));
            this.updateform.append('comite_info', JSON.stringify(this.comite_obra_edit));
            this.updateform.append('costo_info', JSON.stringify(this.costos_obra_edit));

            axios.post('/obras/update', this.updateform)
            .then(res => console.log(res.data))
            .catch(err => console.error(err));
        },
        searchInputWatcher(new_input){
            this.obras_search = [];
            this.registros.forEach(elem => {
                if(elem.coordinador.toUpperCase().match(new_input.toUpperCase()) || elem.clave_obra.toUpperCase().match(new_input.toUpperCase()) || elem.edo_aut.toUpperCase().match(new_input.toUpperCase) || elem.estado.toUpperCase().match(new_input.toUpperCase())){
                    this.obras_search.push(elem);
                    this.searchView = true;
                }
            });  
        },
        pushCost(){
            if(this.fuenfef_id != null && this.concepto_id != null){
                this.costos_obra_edit.push({
                    'monto':isNaN(this.monto_costo) || this.monto_costo == null || this.monto_costo.length == 0 ? 0.0 : this.monto_costo,
                    'fuentef_text':this.fuentef_text,
                    'fuentef_id':this.fuentef_id,
                    'concepto_costo_id':this.concepto_id,
                    'concepto_text':this.concepto_text,
                });
                this.monto_acumulado += parseFloat(this.monto_costo);
                this.costo_total_obra = this.monto_acumulado;
            }
        },
        dropCosto(idx){
            this.monto_acumulado -= parseFloat(this.costos_obra_edit[idx].monto);
            this.costos_obra_edit.splice(idx, 1);
            this.costo_total_obra -= this.monto_acumulado;
        },

        dropComite(idx){
            this.comite_obra_edit.splice(idx, 1);
        },
        pushComite(){
            if(this.nombre_com != null && this.cargo_com != null){
                this.comite_obra_edit.push({
                    'nombre':this.nombre_com,
                    'cargo':this.cargo_com,
                });
            }
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
		  
        enableEdit(obra_id){
            this.editFunction = true;
            this.registros.forEach(el => {
                if(el.obra_id == obra_id){
                    this.obra_edit = el;
                }
            });
            this.getCostosObra(obra_id);
            this.getComiteObra(obra_id);
            this.getConceptosCostos();
            this.getFuentesF();
            this.setObratoEdit();
        },
        getCostosObra(obra_id){
            axios.get(`/obras/edit/costos/${obra_id}`)
            .then(res => {
                this.costos_obra_edit = res.data.length == 0? [] : res.data;
                this.costos_obra_edit.forEach(el => {
                    this.monto_acumulado += parseFloat(el.monto);
                });
            })
            .catch(err => console.error(err));
        },

		  getComiteObra(obra_id){
            axios.get(`/obras/edit/comite/${obra_id}`)
            .then(res => this.comite_obra_edit = res.data.length == 0? [] : res.data)
            .catch(err => console.err(err));
        },
         setObratoEdit(){
            this.oedit_jefe_obra=this.obra_edit.jefe_obra;
            this.oedit_paraje=this.obra_edit.paraje;
            this.oedit_coordinador=this.obra_edit.coordinador;
            this.oedit_sistema=this.obra_edit.sistema;
            this.oedit_estado=this.obra_edit.estado;
            this.oedit_municipio=this.obra_edit.municipio;
            this.oedit_localidad=this.obra_edit.localidad;
            this.oedit_clave_loc=this.obra_edit.clave_localidad;
            this.oedit_ctributaria=this.obra_edit.c_tributaria;
            this.oedit_tipo=this.obra_edit.tipo;
            this.oedit_categoria=this.obra_edit.categoria;
            this.oedit_situacion=this.obra_edit.situacion;
            this.oedit_edo_aut=this.obra_edit.edo_aut;
            this.oedit_conv_obra=this.obra_edit.convenio_obra;
            this.oedit_conv_general=this.obra_edit.convenio_general;
            this.oedit_coord_n=this.obra_edit.coordenada_n;
            this.oedit_coord_e=this.obra_edit.coordenada_e;
            this.oedit_ben_dir=this.obra_edit.beneficiado_directo;
            this.oedit_ben_ind=this.obra_edit.beneficiado_indirecto;
            this.oedit_descripcion=this.obra_edit.descripcion;
            this.oedit_justificacion=this.obra_edit.justificacion;
            this.oedit_fecha_i=this.obra_edit.fecha_inicio;
            this.oedit_fecha_f=this.obra_edit.fecha_termino;
            this.costo_total_obra = this.obra_edit.total;
        },
		  getFuentesF(){
			  axios.get('/obras/getfuentesf')
			  .then(res => this.fuentes_fin = res.data)
			  .catch(err => console.error(err));
		  },
		  getConceptosCostos(){
			  axios.get('/obras/getconceptos')
			  .then(res => this.conceptos_obra = res.data)
			  .catch(err => console.error(err));
		  }
    },
}
</script>

<style>

.edit-btn{
    background:#444;
    color:white;
    border-radius:13px;
    padding:8px;
    cursor:pointer;
}

.form-auto{
    width:94%;
    margin:auto;
    margin-top:3vh;
    margin-bottom:3vh;
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

.header-row{
    display:flex;
    align-items:center;
    justify-content: space-between;
}
</style>