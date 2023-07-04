<?php

namespace App\Http\Controllers;
use App\Models\Tarjetas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarjetasController extends Controller
{
    public function GetTarjetas() {
        $model = new Tarjetas();

        $datos = $model->GetTarjetas();

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function GetPesonasData(Request $request) {
        $model = new Tarjetas();

        $datos = $model->GetPesonasData($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }
    
    public function CrearTarjetas(Request $request) {
        $m = new Tarjetas();
        $tarjeta = $m->crud_tarjetas($request, 'C');
        if ($tarjeta->tarjeta_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => (int)$tarjeta->tarjeta_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error al Crear el Registro.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function actualizarTarjeta(Request $request) {
        $m = new Tarjetas();
        $tarjeta = $m->crud_tarjetas($request, 'U');
        if ($tarjeta) {
            $response = json_encode(array('mensaje' => 'Ha actualizado exitosamente.', 'tipo' => 0), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error al Actualizar el Registro.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    public function GetTarjetasByPersonaID(Request $request) {
        $model = new Tarjetas();

        $datos = $model->GetTarjetasByPersonaID($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }
}
