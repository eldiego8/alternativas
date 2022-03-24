<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Alternativas</title>

    <style>
        *{
            font-family:Helvetica;
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
			  background:#0866B4;
			  color:white;
			  font-size:13px;
			  padding-top:4px;
			  padding-bottom:4px;
		  }
		  td{
			  border:1px solid #ddd;
			  font-size:12px;
			  text-align:center;
		  }
    </style>
</head>

<body>
    <div style="overflow:hidden; margin-top:2px;">
        <img style="height:80px; width:170px; object-fit:contain;" src="/Applications/MAMP/htdocs/apsalternativas-web/storage/app/public/assets/logo.jpg">
        <span style="position:absolute; top:5px; right:5px;"><b>FECHA: {{ $date }}</b></span>
		</div>
		<div style="width:100%; margin:auto; text-align:center;">
			<h3 style="text-align:center; font-size:15px;">PROGRAMA DE AGUA PARA SIEMPRE</h3>
			<h3 style="text-align:center; font-size:15px;">ALTERNATIVAS Y PROCESOS DE PARTICIPACIÓN SOCIAL</h3>
			<h3 style="text-align:center; font-size:15px;">DIRECCIÓN DE INGENIERÍA</h3>
			<h1 style="font-size:16px; text-transform:uppercase;">EXPEDIENTE TÉCNICO DE OBRA</h1>
		</div>
	<hr>
		
    <div>
        <label><b>Clave de Obra: </b> {{ $obra[0]->clave_obra }} </label><br>
    </div>

    <div class="content-wrap">
		 <h5>UBICACIÓN.</h5>
        <table>
			  <tr>
					<th>Estado</th>
					<th>Municipio</th>
					<th>Localidad</th>
					<th>Cve. Loc.</th>
					<th>C. Trib.</th>
					<th>Coord. N</th>
					<th>Coord. E.</th>
				</tr>
		  			<tr>
		  				<td>{{ $obra[0]->estado }}</td>
		  				<td>{{ $obra[0]->municipio }}</td>
		  				<td>{{ $obra[0]->localidad }}</td>
		  				<td>{{ $obra[0]->clave_localidad }}</td>
		  				<td>{{ $obra[0]->c_tributaria }}</td>
		  				<td>{{ $obra[0]->coordenada_n }}</td>
		  				<td>{{ $obra[0]->coordenada_e }}</td>
					</tr>
        </table>

		  <h5>INFORMACIÓN GENERAL.</h5>
        <table>
			  <tr>
					<th>Jefe de Obra</th>
					<th>Coordinador</th>
					<th>Categoría</th>
					<th>Tipo de Obra</th>
					<th>Paraje</th>
				</tr>
		  			<tr>
		  				<td>{{ $obra[0]->jefe_obra }}</td>
		  				<td>{{ $obra[0]->coordinador }}</td>
		  				<td>{{ $obra[0]->categoria }}</td>
		  				<td>{{ $obra[0]->tipo }}</td>
		  				<td>{{ $obra[0]->paraje }}</td>
					</tr>
        </table>
		  
		  <table>
			  <tr>
					<th>Convenio Obra</th>
					<th>Convenio Gral.</th>
					<th>Situación Obra</th>
					<th>Edo. Autorización</th>
				</tr>
				<tr>
					<td>{{ $obra[0]->conv_obra }}</td>
					<td>{{ $obra[0]->conv_general }}</td>
					<td>{{ $obra[0]->situacion }}</td>
					<td>{{ $obra[0]->edo_aut }}</td>
				</tr>
        </table>

		  <table>
			  <tr>
					<th>Beneficiado Dir.</th>
					<th>Beneficiado Ind.</th>
				</tr>
				<tr>
					<td>{{ $obra[0]->beneficiado_directo }}</td>
					<td>{{ $obra[0]->beneficiado_inddirecto }}</td>
				</tr>
        </table>
		  <hr>
		  <h5>DESCRIPCIÓN:</h5>
		  <pre style="white-space:pre-wrap;"> {{ $obra[0]->descripcion }} </pre>
		  <hr>
		  <h5>JUSTIFICACIÓN:</h5>
		  <p> {{ $obra[0]->justificacion }} </p>
		  

		  <hr>
		  @if($comite != null && count($comite) > 0)
		  <h5>COMITÉ.</h5>
		  <table>
			  <tr>
					<th>Nombre</th>
					<th>Cargo</th>
				</tr>

				@foreach ($comite as $com)
				<tr>
					<td>{{ $com->nombre }}</td>
					<td>{{ $com->cargo }}</td>
				</tr>
				@endforeach
			</table>
			@endif
		  
		@if($costos != null && count($costos) > 0)
		  <h5>PRESUPUESTO ESTIMADO DE OBRA Y FUENTES FINANCIERAS.</h5>
		  <p><b>I.</b> Inversión física por destino.</p> 
		  <table>
			  <tr>
				  <th>Fuente F</th>
				  <th>Concepto</th>
					<th>Monto (MXN)</th>
					<th>Porcentaje</th>
				</tr>
				@foreach ($costos as $costo)
				<tr>
					<td>{{ $costo->fuentef_text }}</td>
					<td>{{ $costo->concepto_text }}</td>
					<td>{{ $costo->monto }}</td>
					<td><b>{{ $costo->monto * 100 / $obra[0]->total }}%</b></td>
				</tr>
				@endforeach
				<tr style="background:#ccc;">
					<td style="border:none !important;"></td>
					<td style="border:none !important;"></td>
		  			<td><b>TOTAL INVERSIÓN FÍSICA</b></td>
					<td><b>${{ $obra[0]->total }}</b></td>
				</tr>
        </table>
	@endif

		  
    </div>


</body>
</html>