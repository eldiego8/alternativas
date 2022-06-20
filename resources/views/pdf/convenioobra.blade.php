<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alternativas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        *{
            font-family: Helvetica, Sans-Serif,Georgia;
        }
        hr{
            color:#cccccc;
            background:#cccccc;
        }
        table{
            margin-bottom:13px;
            width:100%;
        }
        th{
			font-size:13px;
			padding-top:4px;
			padding-bottom:4px;
			background:#22325f;
			color:white;
        }
        td{
		border:1px solid #aaa;
		font-size:12px;
		text-align:center;
		}
		li{
			list-style: none;
		}
		.paragraph_control{
			text-align:justify;
			font-size:14px;
			color:#333;
			letter-spacing:1px;
			margin-top:21px;
		}
		.center-text{
			text-align:center;
		}

		footer {
			position: fixed; 
			bottom: -55px; 
			left: 0px; 
			right: 0px;
			height: 50px; 
			font-size: 12px;

			/** Extra personal styles **/
			color: black;
			text-align: center;
			line-height: 34px;
		}
	
    </style>
    </head>
    <body>

		<footer>
			<span style="position:relative; right:165px;"><b>Convenio de Obra</b></span>
			<span style="text-align:center; position:relative; left:165px;">
				<img style="object-fit:contain; height:25px; width:35px; position:relative; top:5px;" src="/Applications/MAMP/htdocs/apsalternativas-web/storage/app/public/assets/alts.jpeg">
				<span style="font-size:12px;">Clave de Obra: <b>{{$obra[0]->clave_obra}} </b></span>
			</span>
		</footer>

		<main>
		<img style="object-fit:contain; margin:auto; height:110px; width:170px;" src="/Applications/MAMP/htdocs/apsalternativas-web/storage/app/public/assets/alts.jpeg">
			<h1 style="text-align:center; font-size:24px; text-transform:uppercase;">Convenio de Obra</h1>

			<p style="margin-top:21px;" class="paragraph_control">
				Convenio de construcción de obra que celebran por una parte Alternativas y Procesos de
				Participación Social, A. C., con domicilio en Vicente Guerrero número 141 en el poblado de
				San Lorenzo Teotipilco, municipio de Tehuacán, estado de Puebla, representada en este acto
				por el <b><i>Dr. Raúl Hernández Garciadiego</i></b> en su carácter de Director General a quien se le
				denominará "Alternativas y Procesos de Participación Social, A. C.", y por la otra parte los
				señores:
			</p>

			<div style="width:100%; display:flex; margin-top:13px;">
				<table class="control_table">
					<tr style="width:100%;">
						<th>Nombre</th>
						<th>Cargo</th>
					</tr><br>
				@foreach ($comite as $com)
					<tr>
						<td>{{ strtoupper($com->nombre) }}</td>
						<td>{{ strtoupper($com->cargo) }}</td>
					</tr>
				@endforeach
				</table>
			</div>

			<p style="margin-top:21px;" class="paragraph_control">
				Todos ellos con domicilio conocido en <b>{{$obra[0]->localidad}}</b>, en el municipio de <b>{{$obra[0]->municipio}}</b> Estado de <b>{{$obra[0]->estado}}</b>, 
				representados en este acto por {{$presidente->nombre}}. En su carácter de <b>Presidente</b>. A quien (es) en lo sucesivo se 
				le (s) denominará "El Comité de la Obra". Las partes contratantes manifiestan clara y expresamente su 
				consentimiento de común acuerdo en las siguientes declaraciones y cláusulas.
			</p>

			<h3>Declaraciones:</h3>
			<p style="margin-top:21px;" class="paragraph_control">
			<b>Primera.-</b><br>
				Declara "Alternativas" que está legalmente constituida conforme a las leyes mexicanas como asociación civil, 
				la cual tiene por objeto colaborar en la búsqueda de alternativas de participación que favorezcan el cambio social, 
				cultural, y económico hacia condiciones de mayor justicia, para lograrlo, la Asociación impulsará procesos y programas 
				de Participación, promoción, apoyo, asesoría, y consultoría a organizaciones formales e informales, comunidades, 
				grupos y sectores marginados, como son especificamente: mujeres, niños, campesinos, para el mejoramiento de su calidad 
				de vida, así como para el fomento de actividades productivas por parte de estos grupos, comunidades y sectores, 
				que permitan que éstos logren un uso racional de los recursos naturales, como aguas, tierras, bosques, a través de 
				formas de colaboración que coadyuven al desarrollo humano de quienes participen con su trabajo.
			</p>
			<p style="margin-top:21px;" class="paragraph_control">
			<b>Segunda.-</b><br>
			Manifiesta "Alternativas" que su programa denominado "Agua para Siempre" impulsa el desarrollo de los pueblos, grupos y sectores marginados, a través de la coordinación y planeación de los diferentes apoyos de quienes participan, asi como de grupos, pueblos, organismos públicos o privados y de fundaciones Nacionales e Internacionales para la conservación de los suelos, y obtención de agua.
			</p>
			<p style="margin-top:21px;" class="paragraph_control">
			<b>Tercera.-</b><br>
				Expresa "El Comité" que se han constituido como: <b>{{$data->nombre_obra}} "{{$data->paraje}}"</b>
				Para construir una obra de La regeneración de cuencas y recarga de acuíferos.
				El número de obras a realizar es de: <b>{$num_obras}</b>
				Esta obra se describe a detalle en las cláusulas sucesivas.	
			</p>
			<p style="margin-top:21px;" class="paragraph_control">
			<b>Cuarta.-</b><br>
				Cuarta.-
				Ambos contratantes manifiestan que el objetivo de celebrar este contrato, es con la finalidad de que, 
				"Alternativas" y el "Comité" a través de diversas formas de colaboración conjunta, participen en la 
				construcción de la obra denominada: <b>{{$data->nombre_obra}} "{{$data->paraje}}"</b>
			</p>

			<br>
			<h3>Cláusulas</h3>
			<p style="margin-top:21px" class="paragraph_control">
			<b>Primera.-</b><br>
				"Alternativas" es una Asociación Civil sin fines de lucro, cuyo objeto principal ha quedado descrito en la declaración número uno de este contrato.
			</p>
			<p style="margin-top:21px" class="paragraph_control">
			<b>Segunda.-</b><br>
				Declaran ambos contratantes, que el objeto de celebrar este contrato es con la finalidad de establecer las formas de colaboración para el desarrollo de las obras programadas por ambas partes, las cuales impulsarán en todo momento el desarrollo de los pueblos, grupos y sectores marginados, a través del programa denominado "Agua para Siempre" para la conservación de los suelos, regeneración de barrancas y obtención de agua. "Alternativas", impulsará la organización de los participantes a través de diversas formas de colaboración, las que en su caso pueden ser de promoción, asesoría, capacitación, diseño, dirección, supervisión y todas aquellas formas similares para lograr dicho objeto, con la participación activa de los beneficiarios en la construcción de la obra que a continuación se describe:	
			</p>

			<br>
			<ul>
				<li><label>Nombre: <b>{{$data->nombre_obra}}</b></label></li>
				<li><label>Ubicación: <b>{{$obra[0]->localidad}}, {{$obra[0]->municipio}}, {{$obra[0]->estado}}</b></label></li>
				<li><label>Descripción:</label><br></li>
			</ul>
			<p class="paragraph_control">
				{{$obra[0]->descripcion}}
			</p>

					<br>
					<p style="margin-top:21px" class="paragraph_control">
					<b>Tercera.-</b><br>
						La obra será construida con la participación y/o colaboración de:
					</p>

					<div style="width:100%; display:flex; margin-top:13px;">
						<table>
							<tr style="width:100%;">
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Monto</th>
							</tr><br>
						@foreach ($costos as $costo)
							<tr>
								<td>{{ $costo->fuentef_text }}</td>
								<td>{{ $costo->concepto_text }}</td>
								<td style="text-align:right;">$ {{ $costo->monto }}</td>
							</tr>
						@endforeach
						</table>
			</div>

					<p style="margin-top:21px" class="paragraph_control">
					<b>Cuarta.-</b><br>
						Las organizaciones privadas o públicas que participan con recursos de financiamiento con recuperación, establecerán en documento anexo al presente convenio, las políticas para la obtención de dichos recursos en la construcción de la presente obra.
					</p>

					<p style="margin-top:21px" class="paragraph_control">
					<b>Quinta.-</b><br>
						Queda expresamente convenido por los contratantes, que las personas que voluntariamente participen con su trabajo personal en forma de faena y/o colaboración, no establecerán relaciones laborales con "Alternativas" por este hecho, por lo que no existirá ninguna relación de subordinación, ni dependencia, ni la existencia de un salario.- asi mismo, a través de este convenio, se establece que "Alternativas" no será responsable por los perjuicios ocasionados a persona alguna con motivo de la construcción, operación y mantenimiento de la obra.
					<br><br>
						Queda estrictamente establecido por los contratantes que, "Alternativas" no tiene ni tendrá en lo futuro, responsabilidad alguna sobre los siguientes rubros: daños y perjuicios a terceros, responsabilidad civil y/o penal por la construcción, operación y mantenimiento de la obra, trámite y obtención de permisos oficiales para la construcción, pago de salarios y/o indemnizaciones por la realización de la obra, accidentes o enfermedades ocasionados por dolo, negligencia o error en la construcción, operación y mantenimiento de la obra.
					</p>

					<p style="margin-top:21px" class="paragraph_control">
					<b>Sexta.-</b><br>
						Las personas que participen con mano de obra en la construcción de la obra, solo serán colaboradores voluntarios y/o cooperadores con el desarrollo de sus pueblos, por lo que, en caso de resultar algún adeudo en los rubros mencionados en la cláusula anteriormente celebrada, serán responsabilidad única y exclusiva de los beneficiarios y/o responsables comunales de la obra.
					</p>
					<p style="margin-top:21px" class="paragraph_control">
					<b>Siete.-</b><br>
						La descripción técnica incluyendo, plano, diseño y presupuesto de la obra será proporcionada por "Alternativas" a "El Comité" para su ratificación y/o rectificación.
					</p>
					<p style="margin-top:21px" class="paragraph_control">
					<b>Octava.-</b><br>
						Cualquier cambio o aumento en la obra, será autorizado por escrito por Alternativas y Procesos de Participación Social, A.C. Persona autorizada por ambos contratantes para dicho efecto.
					</p>
					<p style="margin-top:21px" class="paragraph_control">
					<b>Novena.-</b><br>
						Queda expresamente convenido que "Alternativas" tendrá derecho a intervenir en las decisiones administrativas, operacionales, de mantenimiento y de dominio; asi como a tener acceso ilimitado respecto de la obra objeto del presente contrato.
					</p>
					<p style="margin-top:21px" class="paragraph_control">
					<b>Décima.-</b><br>
						Convienen ambas partes que, una vez terminada la obra y con la finalidad de coordinar los asuntos relacionados con el funcionamiento, operación y mantenimiento de la misma, "El Comité" se compromete a firmar un acta de conclusión y recepción de obra, en la cual se especificarán las normas a las que se sujetan los usuarios o beneficiarios.
					</p>
					<p style="margin-top:21px" class="paragraph_control">
					<b>Décima Primera.-</b><br>
						Manifiestan ambas partes que para la construcción, funcionamiento y operación de la obra; a través de este instrumento y en este mismo acto, se constituyen por causa de utilidad pública y en razón de su viabilidad económica y social, las servidumbres que permitirán el paso del
						agua en los predios sirvientes, como a continuación se describe:
					</p><br>
					<div style="margin:auto; text-align:center; width:500px;">
						<h4 style="text-transform:uppercase; font-size:14px; text-align:center;">Propietario y/o Poseedor / Medidas y colindancias</h4>
						<label style="width:400px; border:2px solid #222; text-align:center;">No aplicable</label>
					</div>

					<p style="margin-top:21px" class="paragraph_control">
					<b>Cláusula Especial -</b><br>
						Los propietarios o poseedores de los predios, anteriormente descritos, establecen por su libre voluntad, la donación de la porción de terreno que servirá para constituir las servidumbres descritas, acordando los propietarios que por ningún motivo se restringirá el paso del agua, ni la continuidad de la obra, ya sea en la etapa de construcción, operación o mantenimiento. Queda expresamente convenido, que cada donante de un predio, estará formando parte de las personas directamente beneficiadas por la obtención de agua, materiales, nivelación o bordeo en su caso, por lo que no podrán reclamar indemnización alguna. La firma o huella digital en su caso del dueño o poseedor del bien inmueble al calce de este convenio, será ratificación de su voluntad respecto de la donación del predio sirviente.
					<br>
						Leído el presente contrato, ambas partes con pleno consentiemiento y razón de las obligaciones y derechos a los que se comprometen, firman quedando de común acuerdo a los 14 días del mes de Febrero de 2022.
					</p>

					<div>
						<div style="display:inline-block; float:left; width:300;">
							<h5 style="margin-bottom:34px; font-size:16px;" class="center-text"><q>Por Alternativas</q></h5><br>
							<div style="width:250px; border-top:1px solid black; margin:auto; text-align:center;  margin-bottom:5px; position:relative; top:13px;">
								<label class="center-text"><b>{{$obra[0]->jefe_obra}}</b></label><br>
								<label class="center-text" style="font-size:12px;">JEFE DE OBRA</label>
							</div><br><br>
							<div style="width:250px; border-top:1px solid black; margin:auto; text-align:center;  margin-bottom:5px; position:relative; top:13px;">
								<label class="center-text"><b>Álvaro Sánchez Montes</b></label><br>
								<label class="center-text" style="font-size:12px;">COORDINADOR REGIONAL</label>
							</div><br><br>
							<div style="width:250px; border-top:1px solid black; margin:auto; text-align:center;  margin-bottom:5px; position:relative; top:13px;">
								<label class="center-text"><b>Ing. Gerardo Reyes Bonilla</b></label><br>
								<label class="center-text" style="font-size:12px;">DIRECCIÓN DE INGENIERÍA</label>
							</div><br><br>
							<div style="width:250px; border-top:1px solid black;  margin:auto; text-align:center;  margin-bottom:5px; position:relative; top:13px;">
								<label class="center-text"><b>Dr. Raúl Hernandez Garciadiego</b></label><br>
								<label class="center-text" style="font-size:12px;">DIRECTOR GENERAL</label>
							</div>
						</div>
						<div style="display:inline-block; float:right; width:300">
							<h5 style="margin-bottom:34px; font-size:16px;" class="center-text"><q>Por El Comité</q></h5><br>
							@foreach ($comite as $com)
							<div style="width:250px; border-top:1px solid black; margin:auto; text-align:center;   margin-bottom:5px; position:relative; top:13px;">
								<label class="center-text"><b>{{$com->nombre}}</b></label><br>
								<label class="center-text" style="font-size:12px;">{{strtoupper($com->cargo)}}</label>
							</div><br><br>
							@endforeach
						</div>
						<div style="display:inline-block;  width:400px">
						</div>
					</div>
				</main>
					
    </body>
</html>