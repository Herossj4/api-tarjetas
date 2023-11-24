<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UsuarioMenu extends Model
{
    use HasFactory;

    protected $table = 'tb_usuarios_menu';

    protected $primaryKey = 'usuario_menu_id';

    protected $fillable = [
        'usuario_id,menu_id,usuario_creador,fecha_creacion,usuario_modificador,fecha_modificacion'
    ];

    public function getUsuarioMenu($usuario_id) {
        $db = DB::select("exec pr_get_usuarios_menu_id ?", array($usuario_id));

        return $db;
    }

    public function crud_usuarios_menu(Request $request) {
        $db = DB::select("exec pr_crud_asignar_menus ?,?,?",
                        [
                            $request->get('usuario_id'),
                            $request->get('menu_id'),
                            $request->get('usuario')
                        ]);
        
        return $db;
    }
}
