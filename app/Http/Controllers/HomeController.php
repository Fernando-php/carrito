<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['productos'])) {
            $file = fopen("productos.txt", "r");
            while (!feof($file)) {
                $linea = fgets($file);
                if ($linea != "") {
                    $prod = explode('-', $linea);
                    $_SESSION['productos'][$prod[0]] = [$prod[1], $prod[2], $prod[3]];
                }
            }
            fclose($file);
            if (isset($_COOKIE['cesta'])) {
                $_SESSION['enCesta'] = unserialize($_COOKIE['cesta']);
                $_SESSION['total']    = $_COOKIE['total'];
                $_SESSION['cantidad'] = $_COOKIE['cantidad'];
            }
        }
        if (!isset($_SESSION['enCesta'])) {
            $_SESSION['enCesta'] = [];
            $_SESSION['total'] = 0;
            $_SESSION['cantidad'] = 0;
        }
        return view('index');
    }
    public function detalle($producto)
    {
        session_start();
        return view('detalle',compact('producto'));
    }
    public function meteCarro($producto)
    {
        session_start();
            if (array_key_exists($producto, $_SESSION['enCesta'])) {
                $_SESSION['enCesta'][$producto]++;
            } else {
                $_SESSION['enCesta'][$producto] = 1;
            }

            $_SESSION['cantidad']++;
            $_SESSION['total'] += $_SESSION['productos'][$producto][0];
            setcookie('cantidad', $_SESSION['cantidad'], time() + 24 * 3600);
            setcookie('total', $_SESSION['total'], time() + 24 * 3600);
            setcookie('cesta', serialize($_SESSION['enCesta']), time() + 24 * 3600);
            return redirect()->route('inicio'); 
            //return redirect('/'); //redirección sin usar el nombre de la ruta
    }
    public function quitaCarro($producto)
    {
        session_start();
            $_SESSION['enCesta'][$producto]--;
            $_SESSION['cantidad']--;
            $_SESSION['total'] -= $_SESSION['productos'][$producto][0];
            if ( $_SESSION['enCesta'][$producto]==0) {
                unset($_SESSION['enCesta'][$producto]);
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
