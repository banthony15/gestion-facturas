<?php

namespace App\Http\Controllers;
use App\Models\{Factura,Compra,Producto,User,Facturas_compras};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $producto;
    private $compra;
    private $user;
    private $factura;
    private $facturas_compras;

    public function __construct(Producto $producto, Compra $compra, User $user, Factura $factura, Facturas_compras $facturas_compras)
    {
        $this->compra = $compra;
        $this->producto = $producto; 
        $this->user = $user;   
        $this->factura = $factura;  
        $this->facturas_compras = $facturas_compras;

        // $this->middleware('Administrador')->only('index');
    }

    public function index()
    {       
        $usuarios = $this->user->join("compras", "users.id", "=","compras.user_id")->where('procesada','=',0)->distinct()->get(['users.name','users.id']);
        $compras  = $this->compra->where('procesada','=','0')->get();       
        $facturas = $this->factura->all();      
        if(Auth::user()->perfil_id==1){
            return view('facturas.index', compact('facturas','usuarios','compras'));
        }else{
            echo 'sin permisos';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente=$_POST['cliente'];
        $compra = $this->compra->where('procesada','=','0')->where('user_id','=',$cliente)->get();
        $factura = $this->factura->create($request->all());
        foreach($compra as $compras){
            
            $this->facturas_compras->create([
                'compra_id' => $compras->id,
                'factura_id'=> $factura->id]);

            $this->compra->where('procesada','=','0')->where('user_id','=',$cliente)->update(['procesada'=>1]);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = $this->factura->find($id);
        $usuarios = $this->user->join("compras", "users.id", "=","compras.user_id")
        ->join("facturas_compras","compras.id","=","facturas_compras.compra_id")
        ->where('compras.procesada','=',1)
        ->where('facturas_compras.factura_id','=',$factura->id)
        ->distinct()->get(['users.name','users.id']);
        $facturas_generadas = $this->facturas_compras->where('factura_id','=',$factura->id)->get();

        $precio= $this->facturas_compras->join("compras","facturas_compras.compra_id","=","compras.id")
        ->join("productos","compras.producto_id","=","productos.id")
        ->where('facturas_compras.factura_id','=',$factura->id)->get(['productos.precio']);
        $sumatoriaPrecio= $precio->sum('precio');

        $precioTotal= $this->facturas_compras->join("compras","facturas_compras.compra_id","=","compras.id")
        ->join("productos","compras.producto_id","=","productos.id")
        ->where('facturas_compras.factura_id','=',$factura->id)->selectRaw('productos.precio * productos.impuesto / 100 + productos.precio as total')->get(['total']);        
        $sumatoriaPreciofinal = $precioTotal->sum('total');

        $impuestoTotal= $this->facturas_compras->join("compras","facturas_compras.compra_id","=","compras.id")
        ->join("productos","compras.producto_id","=","productos.id")
        ->where('facturas_compras.factura_id','=',$factura->id)->selectRaw('productos.precio * productos.impuesto / 100 as total')->get(['total']);
        $sumatoriaImpuesto = $impuestoTotal->sum('total');

        if(Auth::user()->perfil_id==1){
            return view('facturas.show',compact('facturas_generadas','usuarios','precio','sumatoriaPrecio','precioTotal','sumatoriaPreciofinal','impuestoTotal','sumatoriaImpuesto'));
        }else{
            echo 'sin permisos';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
