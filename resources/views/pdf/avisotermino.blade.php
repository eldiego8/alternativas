
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Alternativas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
        *{
            font-family: Georgia;
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
    </style>
    </head>
    <body>
        
    <img style="object-fit:contain; margin:auto; height:110px; width:170px;" src="/Applications/MAMP/htdocs/apsalternativas-web/storage/app/public/assets/alts.jpeg">
        <h1 style="text-align:center; font-size:24px; text-transform:uppercase;">Aviso de Terminación de Obra</h1>
        <div style="text-align:right;">
            <span style="right:10px;"><b>LUGAR:</b> {{$obra[0]->localidad}}</span><br>
            <span style="text-align:right; margin-bottom:3px;"><b">FECHA:</b> {{$date}}</span><br>
        </div>
        <br>
            <span style="font-weight:800; font-size:16px; letter-spacing:1px; margin-top:5px; margin-bottom:5px;">DR. RAUL HERNANDEZ GARCIADIEGO</span><br>
            <span style="font-size:16px; letter-spacing:1px; font-weight:500;">DIRECTOR GENERAL DE ALTERNATIVAS</span><br>
            <span style="font-size:16px; letter-spacing:1px; font-weight:500;">Y PROCESOS DE PARTICIPACION SOCIAL A.C.<br></span>
        <br>

        <p class="paragraph_control">
            <br>A través del presente, notifico a la dirección de ingeniería y dirección general a su digno cargo, que con fecha <b>{{$dia}} de {{$mes}} de {{$anio}}</b> han quedado concluidos los trabajos
            convenidos en el convenio general de Participación celebrado entre ALTERNATIVAS
            Y PROCESOS DE PARTICIPACION SOCIAL A.C., y la localidad de <b>{{$obra[0]->localidad}}</b> del municipio de <b>{{$obra[0]->municipio}}</b> estado de <b>{{$obra[0]->estado}}</b> 
            para la construcción de la obra <b>{{$paraje}}</b>, conforme al expediente técnico de dicho convenio. 
            <br>
            Lo anterior lo hago de su conocimiento para los trámites del finiquito y liquidación de la obra.    
        </p>
        <br><br><br>
        <h2 style="margin-top:21px; text-align:center; font-size:21px; position:relative; top:21px;">ATENTAMENTE</h2><br><br>

        <div style="width:100%; display:flex; position:relative; top:13px;">
            <table>
                <tr style="width:100%;">
                    <th>Miembro Comite 1</th>
                    <th>Miembro Comite 2</th>
                </tr><br>
                <tr>
                    <td style="color:white; height:18px;">-</td>
                    <td style="color:white; height:18px;">-</td>
                </tr>
                <tr>
                    <td style="color:white; height:18px;">-</td>
                    <td style="color:white; height:18px;">-</td>
                </tr>
                <tr>
                    <td style="color:white; height:18px;">-</td>
                    <td style="color:white; height:18px;">-</td>
                </tr>
                <tr>
                    <td style="border:none; border-top:1px solid black; font-size:14px; max-width:100px; margin-right:5px;"><b>Coordinador</b></td>
                    <td style="border:none; border-top:1px solid black; font-size:14px; max-width:100px; margin-left:5px;"><b>Presidente</b></td>
                </tr>
            </table>
        </div>

        <div style="position:absolute; bottom:5px; text-align:center; width:100%;">
            <span style="font-size:11px; position:relative; right:165px;"><b>Aviso de Terminación de Obra</b></span>
            <span style="text-align:center; position:relative; right:21px;">
                <img style="object-fit:contain; margin:auto; height:25px; width:35px;" src="/Applications/MAMP/htdocs/apsalternativas-web/storage/app/public/assets/alts.jpeg">
                <span style="font-size:12px;">Clave de Obra: <b>{{$obra[0]->clave_obra}} </b></span>
            </span>
        </div>


    </body>
</html>