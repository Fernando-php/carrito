<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth'); //asociado a todos los métodos (sesión iniciada)
        // $this->middleware('log')->only('index'); //asociado solo al método index
        // $this->middleware('subscribed')->except('store'); // a todos menos store
    }
    public function index()
    {
        session_start();
        if (!isset($_SESSION['enCesta'])) {
            if (isset($_COOKIE['cesta'])) {
                $_SESSION['enCesta'] = unserialize($_COOKIE['cesta']);
                $_SESSION['total']    = $_COOKIE['total'];
                $_SESSION['cantidad'] = $_COOKIE['cantidad'];
            }else{
                $_SESSION['enCesta'] = [];
                $_SESSION['total'] = 0;
                $_SESSION['cantidad'] = 0;
            }
        }
        $productos= Producto::paginate(5);
        // return $productos;
        return view('index', compact('productos'));
    }
    public function detalle(Producto $producto)
    {
        session_start();
        return view('detalle',compact('producto'));
    }
    public function meteCarro($id)
    {
        session_start();
            if (array_key_exists($id, $_SESSION['enCesta'])) {
                $_SESSION['enCesta'][$id]++;
            } else {
                $_SESSION['enCesta'][$id] = 1;
            }
            $producto= Producto::find($id);
            $_SESSION['cantidad']++;
            $_SESSION['total'] += $producto->precio;
            setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
            setcookie('total', $_SESSION['total'], time() + 24 * 3600);
            setcookie('cesta', serialize($_SESSION['enCesta']), time() + 24 * 3600);
            // return redirect()->route('inicio'); 
            //return redirect('/'); //redirección sin usar el nombre de la ruta
            return redirect()->back();
    }
    public function quitaCarro($id)
    {
        session_start();
            $_SESSION['enCesta'][$id]--;
            $_SESSION['cantidad']--;
            $producto=Producto::find($id);
            $_SESSION['total'] -= $producto->precio;
            if ( $_SESSION['enCesta'][$id]==0) {
                unset($_SESSION['enCesta'][$id]);
            }
            setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
            setcookie('total', $_SESSION['total'], time() + 24 * 3600);
            setcookie('cesta', serialize($_SESSION['enCesta']), time() + 24 * 3600);
            return redirect()->route('cesta'); 
            //return redirect('cesta'); //redirección sin usar el nombre de la ruta
    }
    public function cesta(){
        session_start();
        if (!isset($_SESSION['enCesta'])) {
            return redirect()->route('inicio');
        }
        return view('cesta');
    }
}
