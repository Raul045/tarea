<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modelos\Producto;
class ProductoController extends Controller
{
    public function index($id = null){
        if($id)
            return response()->json(["producto"=>Producto::find($id)],200);
        return response()->json(["productos"=>Producto::all()],200);
    }

    public function guardar(Request $request){
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;

        if($producto->save())
            return response()->json(["productos"=>$producto],201);
        return response()->json(null,400);
    }
    public function Cambiar(Request $request, $id){
        $actualizardatos = new Producto();
        $actualizardatos = Producto::find($id);
        $actualizardatos->nombre = $request->get("nombre");
        $actualizardatos->save();
        return response()->json(["productos"=>$actualizardatos],201);
        return response()->json(null,400);

    }
    public function Eliminar($id){
        $quitar = new Producto();
        $quitar = Producto::find($id);
        $quitar->delete();

        return response()->json(["productos"=>Producto::all()],200);
    }
}
