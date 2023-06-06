<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PersonaController extends Controller
{
    public function getPersonas() {
        $datos = DB::select("select p.persona_id,
        p.numero_identificacion,
        p.grado,
        p.nombres,
        p.apellidos,
        p.imagen,
        p.unidad,
        (select u.nombre_unidad from tb_unidades u where u.unidad_id = p.unidad) nombre_unidad,
        p.dependencia,
        (select u.nombre_unidad from tb_unidades u where u.unidad_id = p.dependencia) nombre_dependencia,
        p.cargo,
        p.usuario_creador,
        p.fecha_creacion,
        p.usuario_modificador,
        p.fecha_modificacion,
        p.tipo_persona 
    from tb_personas p;");

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    public function CrearPersonas(Request $request) {
        $m = new Persona();
        $persona = $m->crud_personas($request, 'C');
        if ($persona->persona_id != 0) {
            $response = json_encode(array('mensaje' => 'Ha creado exitosamente.', 'tipo' => 0, 'id' => (int)$persona->persona_id), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
        else {
            $response = json_encode(array('mensaje' => 'Error al Crear el Registro.', 'tipo' => -1), JSON_NUMERIC_CHECK);
            $response = json_decode($response);

            return response()->json($response);
        }
    }

    
    public function actualizarPersona(Request $request) {
        $m = new Persona();
        $persona = $m->crud_personas($request, 'U');
        if ($persona) {
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

    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'custom'); // Cambia 'local' por tu disco configurado

            // Guardar la ruta en la base de datos
            // Asegúrate de tener un modelo y una tabla correspondientes

            // $rutaImagen = new RutaImagen();
            // $rutaImagen->ruta = $path;
            // $rutaImagen->save();

            return response()->json(['message' => 'Imagen subida con éxito', 'ruta' => $path]);
        }

        return response()->json(['message' => 'No se seleccionó ninguna imagen'], 400);
    }

    public function getUnidadesPadre() {
        $datos = DB::select("select * from tb_unidades u where u.activo = 1 and u.unidad_padre_id is null");

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }

    
    public function GetunidadesHijas(Request $request) {
        $model = new Persona();

        $datos = $model->GetUnidadesHijas($request);

        $response = json_encode(array('result' => $datos, 'tipo' => 0), JSON_NUMERIC_CHECK);
        $response = json_decode($response);

        return response()->json($response, 200);
    }
}
