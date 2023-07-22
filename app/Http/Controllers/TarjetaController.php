<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Tarjetas;
use Illuminate\Support\Facades\Log;

class TarjetaController extends Controller
{
    public function index($id) {
        $model = new Tarjetas();

        $dat = $model->getTarjetaData($id);
        $datos = $dat[0];
        if($datos->imagen != null){
            $url = 'img/perfil/' . $datos->imagen;
        }else{
            $url = 'img/foto.png';
        }
        $clasificacion = $datos->clasificacion;
        $fondo="";
        if($clasificacion == 'naranja'){
            $fondo = "img/img_restringido.png";
        }else{
            if($clasificacion == 'amarillo'){
                $fondo = "img/img_secreto.png";
            }
            else{
                if($clasificacion == 'verde'){
                    $fondo = "img/img_ultrasecreto.png";
                }else{
                    if($clasificacion == 'rojo'){
                        $fondo = "img/img_confidencial.png";
                    }
                }
            }
        }
        $data = [
            'num_autorizacion' => $datos->tarjeta_id,
            'fecha_autorizacion' => $datos->fecha_inicio,
            'grado' => $datos->grado,
            'apellido_nombre' => $datos->apellido_nombre,
            'num_documento' => $datos->numero_identificacion,
            'cargo' => $datos->cargo,
            'dependencia' => $datos->dependencia == null ?  $datos->unidad: $datos->dependencia,
            'grado_sigla' => $datos->nombre_firma,
            'sigla_completo' => $datos->cargo_firma,
            'fecha_vigencia' => $datos->fecha_fin,
            'perfil' => $url,
            'fondo' => $fondo
        ];

        $pdf = Pdf::loadView('tarjeta', $data);

        return $pdf->stream();
    }

    public function Download($id) {
        $model = new Tarjetas();

        $dat = $model->getTarjetaData($id);
        $datos = $dat[0];
        if($datos->imagen != null){
            $url = 'img/perfil/' . $datos->imagen;
        }else{
        $url = 'img/foto.png';
        }
        $clasificacion = $datos->clasificacion;
        $fondo="";
        if($clasificacion == 'naranja'){
            $fondo = "img/img_restringido.png";
        }else{
            if($clasificacion == 'amarillo'){
                $fondo = "img/img_secreto.png";
            }
            else{
                if($clasificacion == 'verde'){
                    $fondo = "img/img_ultrasecreto.png";
                }else{
                    if($clasificacion == 'rojo'){
                        $fondo = "img/img_confidencial.png";
                    }
                }
            }
        }
        $CC = $datos->numero_identificacion;
        $data = [
            'num_autorizacion' => $datos->tarjeta_id,
            'fecha_autorizacion' => $datos->fecha_inicio,
            'grado' => $datos->grado,
            'apellido_nombre' => $datos->apellido_nombre,
            'num_documento' => $datos->numero_identificacion,
            'cargo' => $datos->cargo,
            'dependencia' => $datos->dependencia == null ?  $datos->unidad: $datos->dependencia,
            'grado_sigla' => $datos->nombre_firma,
            'sigla_completo' => $datos->cargo_firma,
            'fecha_vigencia' => $datos->fecha_fin,
            'perfil' => $url,
            'fondo' => $fondo
        ];

        $pdf = Pdf::loadView('tarjeta', $data);

        return $pdf->download($CC . '.pdf');
    }
}
