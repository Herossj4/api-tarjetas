<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Laravel</title>
    <style>
        @page {
		    margin: 0;
            size: 9cm 17cm landscape;
	    }
        @font-face {
            font-family: Calibri;
            font-weight: normal;
            font-style: normal;
            src: url({{ storage_path("fonts/Calibri.ttf") }}) format('truetype');
        }
        body {
            font-family: Calibri;
            font-size: 11px;
        }
        .fondo {
            width: 100%;
            height: 100%;
        }
        .num_autorizacion {
            position: absolute;
            top: 65px;
            left: 188px;
            text-align: center;
        }
        .fecha_autorizacion {
            position: absolute;
            top: 65px;
            left: 300px;
        }
        .grado {
            position: absolute;
            top: 154px;
            left: 110px;
        }
        .apellido_nombre {
            position: absolute;
            top: 154px;
            left: 170px;
            width: 250px;
            text-align: center;
            font-size:11px;
        }
        .num_documento {
            position: absolute;
            top: 154px;
            left: 468px;
            width: 98px;         
            text-align: center;
        }
        .cargo {
            position: absolute;
            top: 200px;
            left: 135px;
            width: 300px;
            text-align: center;
            font-size: 10px;
        }
        .dependencia {
            position: absolute;
            top: 190px;
            left: 430px;
            width: 180px;
            text-align: center;
            font-size: 7.5px;
        }
        .grado_sigla {
            position: absolute;
            top: 244px;
            left: 310px;
            width: 195px;
            text-align: center;
            font-size: 11px;
        }
        .sigla_completo {
            position: absolute;
            top: 263px;
            left: 205px;
            width: 400px;
            text-align: center;
            font-size: 10px;
        }

        .profile {
            position: absolute;
            top: 100px;
            left: 470px;
            width: 95px;
            height: 50px;
            text-align: center;
        }

        .profile img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .vigencia{
            position: absolute;
            top: 290px;
            left: 440px;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>
<body>
    <img class="fondo" src="{{$fondo}}">
    <div class="num_autorizacion">{{ $num_autorizacion }}</div>
    <div class="fecha_autorizacion">{{ $fecha_autorizacion }}</div>
    <div class="grado">{{ $grado }}</div>
    <div class="apellido_nombre">{{ $apellido_nombre }}</div>
    <div class="num_documento">{{ $num_documento }}</div>
    <div class="cargo">{{ $cargo }}</div>
    <div class="dependencia">{{ $dependencia }}</div>
    <div class="grado_sigla">{{ $grado_sigla }}</div>
    <div class="sigla_completo">{{ $sigla_completo }}</div>
    <div class="profile">
        <img src="{{ $perfil }}">
    </div>
    <div class="vigencia">{{ $vigencia }}</div>
</body>