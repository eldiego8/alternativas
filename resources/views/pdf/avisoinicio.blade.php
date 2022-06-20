<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alternativas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        *{
            font-family: Helvetica, Sans-Serif;
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
        }
        td{
            font-size:12px;
            text-align:center;
        }
        .paragraph_control{
            text-align:justify;
            font-size:14px;
            color:#333;
            letter-spacing:1px;
            margin-top:21px;
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
        <span style="position:relative; right:165px;"><b>Aviso de Inicio de Obra</b></span>
        <span style="text-align:center; position:relative; left:165px;">
            <img style="object-fit:contain; height:25px; width:35px; position:relative; top:5px;" src="/Applications/MAMP/htdocs/apsalternativas-web/storage/app/public/assets/alts.jpeg">
            <span style="font-size:12px;">Clave de Obra: <b>{{$obra[0]->clave_obra}} </b></span>
        </span>
    </footer>

    <main>
    <img style="object-fit:contain; margin:auto; height:110px; width:170px;" src="/Applications/MAMP/htdocs/apsalternativas-web/storage/app/public/assets/alts.jpeg">
        <h1 style="text-align:center; font-size:24px; text-transform:uppercase;">Aviso de Inicio de Obra</h1>
        <div style="text-align:right;">
            <span style="right:10px; font-size:16px;"><b>LUGAR:</b> {{$obra[0]->localidad}}</span><br>
            <span style="text-align:right; font-size:16px; margin-bottom:3px;"><b">FECHA:</b> {{$date}}</span><br>
        </div>
        <br>
            <span style="font-weight:500; font-family:Helvetica; font-size:16px; letter-spacing:1px; margin-top:5px; margin-bottom:5px;">DR. RAUL HERNANDEZ GARCIADIEGO</span><br>
            <span style="font-size:16px; font-family:Helvetica; letter-spacing:1px; font-weight:500;">DIRECTOR GENERAL DE ALTERNATIVAS</span><br>
            <span style="font-size:16px; letter-spacing:1px; font-family:Helvetica; font-weight:500;">Y PROCESOS DE PARTICIPACION SOCIAL A.C.<br></span>
        <br>

        <p class="paragraph_control">
            <br>A través del presente, notifico a la dirección de ingeniería y dirección general a su digno cargo, que con fecha <b>{{$day}} de {{$mes}} de {{$anio}}</b> inician los trabajos convenidos en el convenio general de Participación celebrado entre ALTERNATIVAS Y PROCESOS DE PARTICIPACION SOCIAL A.C. y la localidad <b>{{$obra[0]->localidad}}</b> del municipio de <b>{{$obra[0]->municipio}}</b> estado de <b>{{$obra[0]->estado}}</b> 
            para la construcción de la obra <b>{{$paraje}}</b>, conforme al expediente técnico de dicho convenio. 
            <br><br>
            Lo anterior lo hago de su conocimiento para los trámites del finiquito y liquidación de la obra.    
        </p>
        <br><br><br>
        <h2 style="margin-top:21px; text-align:center; font-size:21px; position:relative;">ATENTAMENTE</h2><br><br>

        <div style="position:relative; top:55px;">
        <div style="display:inline-block; float:left; width:300;">
            <div style="width:250px; border-top:1px solid black; margin:auto; text-align:center;  margin-bottom:5px; position:relative; top:13px;">
                <label class="center-text"><b>{{$obra[0]->jefe_obra}}</b></label><br>
                <label class="center-text" style="font-size:12px;">JEFE DE OBRA</label>
            </div><br><br>
        </div>
        <div style="display:inline-block; float:right; width:300">
            <div style="width:250px; border-top:1px solid black; margin:auto; text-align:center;   margin-bottom:5px; position:relative; top:13px;">
                <label class="center-text"><b>{{$presidente->nombre}}</b></label><br>
                <label class="center-text" style="font-size:12px;">PRESIDENTE</label>
            </div><br><br>
        </div>
        <div style="display:inline-block;  width:400px">
        </div>
    </div>
       
    </main>

    </body>
</html>