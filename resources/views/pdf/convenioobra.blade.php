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
        <h1 style="text-align:center; font-size:24px; text-transform:uppercase;">Convenio de Obra</h1>

        <p style="margin-top:21px;" class="paragraph_control">
            Convenio de construcción de obra que celebran por una parte Alternativas y Procesos de
            Participación Social, A. C., con domicilio en Vicente Guerrero número 141 en el poblado de
            San Lorenzo Teotipilco, municipio de Tehuacán, estado de Puebla, representada en este acto
            por el <b>Dr. Raúl Hernández Garciadiego</b> en su carácter de Director General a quien se le
            denominará "Alternativas y Procesos de Participación Social, A. C.", y por la otra parte los
            señores:    
        </p>

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
            <span style="font-size:11px; position:relative; right:165px;"><b>Aviso Inicio de Obra</b></span>
            <span style="text-align:center; position:relative; left:165px;">
                <img style="object-fit:contain; height:25px; width:35px; position:relative; top:5px;" src="/Applications/MAMP/htdocs/apsalternativas-web/storage/app/public/assets/alts.jpeg">
                <span style="font-size:12px;">Clave de Obra: <b>{{$obra[0]->clave_obra}} </b></span>
            </span>
        </div>


    </body>
</html>