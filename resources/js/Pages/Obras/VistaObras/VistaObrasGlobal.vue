<template>

    <template v-if="!this.editFunction">
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="px-6 py-2">Clave Obra</th>
                    <th class="px-6 py-2">Jefe de Obra</th>
                    <th class="px-6 py-2">Paraje</th>
                    <th class="px-6 py-2">Coordinador</th>
                    <th class="px-6 py-2">Sistema</th>
                    <th class="px-6 py-2">Estado</th>
                    <th class="px-6 py-2">Municipio</th>
                    <th class="px-6 py-2">Localidad</th>
                    <th class="px-6 py-2">Clave Loc</th>
                    <th class="px-6 py-2">C. Tributaria</th>
                    <th class="px-6 py-2">Tipo de Obra</th>
                    <th class="px-6 py-2">Categoría Obra</th>
                    <th class="px-6 py-2">Situación</th>
                    <th class="px-6 py-2">Edo. Autorización</th>
                    <th class="px-6 py-2">Convenio Obra</th>
                    <th class="px-6 py-2">Convenio Gral.</th>
                    <th class="px-6 py-2">Coord. N</th>
                    <th class="px-6 py-2">Coord. E</th>
                    <th class="px-6 py-2">Benef. Directos</th>
                    <th class="px-6 py-2">Benef. Indirectos</th>
                    <th class="px-14 py-2">Descripción</th>
                    <th class="px-14 py-2">Justificación</th>
                    <th class="px-14 py-2">Fecha Creación</th>
                    <th class="px-14 py-2">Fecha Fin</th>
                    <th class="px-14 py-2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <template v-if="!this.searchView && !this.editFunction">
                    <template v-for="obra in this.registros" :key="obra.id">
                        <tr>
                            <td :id="obra.id" class="border px-6 py-2">{{obra.clave_obra}}</td>
                            <td class="border px-6 py-2">{{obra.jefe_obra}}</td>
                            <td class="border px-6 py-2">{{obra.paraje}}</td>
                            <td class="border px-6 py-2">{{obra.coordinador}}</td>
                            <td class="border px-6 py-2">{{obra.sistema}}</td>
                            <td class="border px-6 py-2">{{obra.estado}}</td>
                            <td class="border px-6 py-2">{{obra.municipio}}</td>
                            <td class="border px-6 py-2">{{obra.localidad}}</td>
                            <td class="border px-6 py-2">{{obra.clave_localidad}}</td>
                            <td class="border px-6 py-2">{{obra.c_tributaria}}</td>
                            <td class="border px-6 py-2">{{obra.tipo}}</td>
                            <td class="border px-6 py-2">{{obra.categoria}}</td>
                            <td class="border px-6 py-2">{{obra.situacion}}</td>
                            <td class="border px-6 py-2">{{obra.edo_aut}}</td>
                            <td class="border px-6 py-2">{{obra.convenio_obra}}</td>
                            <td class="border px-6 py-2">{{obra.convenio_general}}</td>
                            <td class="border px-6 py-2">{{obra.coordenada_n}}</td>
                            <td class="border px-6 py-2">{{obra.coordenada_e}}</td>
                            <td class="border px-6 py-2">{{obra.beneficiado_directo}}</td>
                            <td class="border px-6 py-2">{{obra.beneficiado_indirecto}}</td>
                            <td class="border px-10 py-6">{{obra.descripcion}}</td>
                            <td class="border px-10 py-6">{{obra.justificacion}}</td>
                            <td class="border px-10 py-6">{{obra.fecha_inicio}}</td>
                            <td class="border px-10 py-6">{{obra.fecha_fin}}</td>
                            <td class="border px-10 py-6" style="text-align:center;">
                                <button @click.prevent="enableEdit(obra.obra_id)" class="edit-btn" style="text-align:center;">Editar</button>
                            </td>
                        </tr>
                    </template>
                </template>
                <template v-else-if="this.searchView && !this.editFunction">
                    <template v-for="obra in this.obras_search" :key="obra.id">
                        <tr>
                        <td  :id="obra.id" class="border px-6 py-2">{{obra.clave_obra}}</td>
                        <td class="border px-6 py-2">{{obra.jefe_obra}}</td>
                        <td class="border px-6 py-2">{{obra.paraje}}</td>
                        <td class="border px-6 py-2">{{obra.coordinador}}</td>
                        <td class="border px-6 py-2">{{obra.sistema}}</td>
                        <td class="border px-6 py-2">{{obra.estado}}</td>
                        <td class="border px-6 py-2">{{obra.municipio}}</td>
                        <td class="border px-6 py-2">{{obra.localidad}}</td>
                        <td class="border px-6 py-2">{{obra.clave_localidad}}</td>
                        <td class="border px-6 py-2">{{obra.c_tributaria}}</td>
                        <td class="border px-6 py-2">{{obra.tipo}}</td>
                        <td class="border px-6 py-2">{{obra.categoria}}</td>
                        <td class="border px-6 py-2">{{obra.situacion}}</td>
                        <td class="border px-6 py-2">{{obra.edo_aut}}</td>
                        <td class="border px-6 py-2">{{obra.convenio_obra}}</td>
                        <td class="border px-6 py-2">{{obra.convenio_general}}</td>
                        <td class="border px-6 py-2">{{obra.coordenada_n}}</td>
                        <td class="border px-6 py-2">{{obra.coordenada_e}}</td>
                        <td class="border px-6 py-2">{{obra.beneficiado_directo}}</td>
                        <td class="border px-6 py-2">{{obra.beneficiado_indirecto}}</td>
                        <td class="border px-10 py-6">{{obra.descripcion}}</td>
                        <td class="border px-10 py-6">{{obra.justificacion}}</td>
                        <td class="border px-10 py-6">{{obra.fecha_inicio}}</td>
                        <td class="border px-10 py-6">{{obra.fecha_fin}}</td>
                        <td class="border px-10 py-6">
                            <button @click.prevent="enableEdit(obra.obra_id)" class="edit-btn" style="text-align:center;">Editar</button>
                        </td>
                        </tr>
                    </template>
                </template>
            </tbody>
        </table>
    </template>
    <template v-else >
        <form class="form-auto">

            <h2 style="font-weight:700; margin-bottom:1vh; font-size:21px;">EDICIÓN DE OBRA CON CLAVE: {{this.obra_edit.clave_obra}} </h2>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Jefe de Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_jefe_obra" type="text" :placeholder="this.obra_edit.jefe_obra"/>
                </div>

                 <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Paraje
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_paraje" type="text" :placeholder="this.obra_edit.paraje"/>
                </div>

                 <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Coordinador
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_coordinador" type="text" :placeholder="this.obra_edit.coordinador"/>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Sistema
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_sistema" type="text" :placeholder="this.obra_edit.sistema"/>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Estado
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" v-model="oedit_estado">
                            <option>New Mexico</option>
                            <option>Missouri</option>
                            <option>Texas</option>
                        </select>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Municipio
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" v-model="oedit_municipio">
                            <option>New Mexico</option>
                            <option>Missouri</option>
                            <option>Texas</option>
                        </select>
                    </div>
                </div>

                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Localidad
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" v-model="oedit_localidad">
                            <option>New Mexico</option>
                            <option>Missouri</option>
                            <option>Texas</option>
                        </select>
                    </div>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Clave Localidad
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" :value="this.obra_edit.clave_localidad" type="text" readonly/>
                </div>


                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Cuenca Tributaria
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_ctributaria" type="text" :placeholder="this.obra_edit.c_tributaria"/>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Tipo de Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_tipo" type="text" :placeholder="this.obra_edit.tipo"/>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Categoría
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_categoria" type="text" :placeholder="this.obra_edit.categoria"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Situación de Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_situacion" type="text" :placeholder="this.obra_edit.situacion"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Estado Autorización
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_edo_aut" type="text" :placeholder="this.obra_edit.edo_aut"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Convenio Obra
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_conv_obra" type="text" :placeholder="this.obra_edit.convenio_obra"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Convenio General
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_conv_general" type="text" :placeholder="this.obra_edit.convenio_general"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Coordenada N.
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_coord_n" type="text" :placeholder="this.obra_edit.coordenada_n"/>
                </div>
                
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Coordenada E.
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_coord_e" type="text" :placeholder="this.obra_edit.coordenada_e"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Beneficiado Directo
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_ben_dir" type="text" :placeholder="this.obra_edit.beneficiado_directo"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Beneficiado Indirecto
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_ben_ind" type="text" :placeholder="this.obra_edit.beneficiado_indirecto"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Fecha de inicio
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_fecha_i" type="text" :placeholder="this.obra_edit.fecha_inicio"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Fecha de fin
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_fecha_f" type="text" :placeholder="this.obra_edit.fecha_fin"/>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Descripción
                    </label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_descripcion"> </textarea>
                </div>

                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Justificación
                    </label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" v-model="oedit_justificacion"></textarea>
                </div>

                <h5 style="padding:.75rem; width:100%; margin-top:.75rem; margin-bottom:.75rem; text-align:left; font-weight:600;">COSTOS</h5>

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
											<th style="text-align:left">Conceptot</th>
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
							<div v-if="this.costos_array.length > 0" class="w-full px-3" style="margin-top:2vh; text-align:center;">
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

                <div class="form-actions">
                    <button class="bg-black text-white font-bold py-2 px-4 rounded-full" @click.prevent="() => {this.editFunction = false;}">
                        Cancelar</button>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                        Guardar
                    </button>
                </div>
            </div>
        </form>
    </template>

</template>

<script>
export default {
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
            fuentef_text:null
        }
    },
    watch:{
        search_input: function(new_input){
            this.watchText(new_input);
        },
    },
    methods:{
        watchText(input){
            if(input.length == 0){
                this.searchView = false;
                this.obras_search = []; 
            }
            this.searchInputWatcher(input);
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
        this.costos_obra_edit.push({
            'monto':this.monto_costo,
            'fuentef':this.fuentef_text,
            'fuentef_id':this.fuentef_id,
            'concepto_id':this.concepto_id,
            'concepto':this.concepto_text,
        });
        console.log(this.costos_obra_edit);
        },
        dropCosto(idx){
            this.costos_obra_edit.splice(idx, 1);
        },

        dropComite(idx){
            this.comite_obra_edit.splice(idx, 1);
        },
        pushComite(){
			this.comite_obra_edit.push({
				'nombre':this.nombre_com,
				'cargo':this.cargo_com,
			});
        },
        getConceptoText(id_c){
            this.costos_obra_edit.forEach(item => {
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
        },

        getCostosObra(obra_id){
            axios.get(`/obras/edit/costos/${obra_id}`)
            .then(res => this.costos_obra_edit = res.data)
            .catch(err => console.err(err));
        },

		  getComiteObra(obra_id){
            axios.get(`/obras/edit/comite/${obra_id}`)
            .then(res => this.comite_obra_edit = res.data)
            .catch(err => console.err(err));
        },
        setObratoEdit(obra_selected){
            this.oedit_jefe_obra=obra_selected.jefe_obra;
            this.oedit_paraje=obra_selected.paraje;
            this.oedit_coordinador=obra_selected.coordinador;
            this.oedit_sistema=obra_selected.sistema;
            this.oedit_estado=obra_selected.estado;
            this.oedit_municipio=obra_selected.municipio;
            this.oedit_localidad=obra_selected.localidad;
            this.oedit_clave_loc=obra_selected.clave_localidad;
            this.oedit_ctributaria=obra_selected.c_tributaria;
            this.oedit_tipo=obra_selected.tipo;
            this.oedit_categoria=obra_selected.categoria;
            this.oedit_situacion=obra_selected.situacion;
            this.oedit_edo_aut=obra_selected.edo_aut;
            this.oedit_conv_obra=obra_selected.convenio_obra;
            this.oedit_conv_general=obra_selected.convenio_general;
            this.oedit_coord_n=obra_selected.coordenada_n;
            this.oedit_coord_e=obra_selected.coordenada_e;
            this.oedit_ben_dir=obra_selected.beneficiado_directo;
            this.oedit_ben_ind=obra_selected.beneficiado_indirecto;
            this.oedit_descripcion=obra_selected.descripcion;
            this.oedit_justificacion=obra_selected.justificacion;
            this.oedit_fecha_i=obra_selected.fecha_inicio;
            this.oedit_fecha_f=obra_selected.fecha_fin;
            this.costo_total_obra = obra_selected.total;
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
    }
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

</style>