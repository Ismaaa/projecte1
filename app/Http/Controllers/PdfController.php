<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Indicamos que trabajamos con Vistas
use View;

// Indicamos que usamos el Modelo User.
use App\User;

// Validación de formularios.
use Validator;

// Hash de contraseñas.
use Hash;

// Redireccionamientos.
use Redirect;

// Auth.
use Auth;

use PDF;

class PdfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pdf.pdf');
    }

    public function cog_asc()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha visualitzat "Cognoms Ascendents"',
        ));

        $users = User::orderBy('surnames','asc')->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->stream('usuaris.pdf'); // Veiem el pdf en streaming
    }
    public function cog_asc_down()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha descarregat "Cognoms Ascendents"',
        ));

        $users = User::orderBy('surnames','asc')->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->download('usuaris.pdf'); // Veiem el pdf en streaming
    }

    public function cog_desc()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha visualitzat "Cognoms Descendents"',
        ));

        $users = User::orderBy('surnames','desc')->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->stream('usuaris.pdf'); // Veiem el pdf en streaming
    }
    public function cog_desc_down()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha descarregat "Cognoms Descendents"',
        ));

        $users = User::orderBy('surnames','desc')->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->download('usuaris.pdf'); // Veiem el pdf en streaming
    }

    public function dni_asc()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha visualitzat "DNI Ascendent"',
        ));

        $users = User::orderBy('dni','asc')->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->stream('usuaris.pdf'); // Veiem el pdf en streaming
    }
    public function dni_asc_down()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha descarregat "DNI Ascendent"',
        ));

        $users = User::orderBy('dni','asc')->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->download('usuaris.pdf'); // Veiem el pdf en streaming
    }

    public function dni_desc()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha visualitzat "DNI Descendent"',
        ));

        $users = User::orderBy('dni','desc')->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->stream('usuaris.pdf'); // Veiem el pdf en streaming
    }
    public function dni_desc_down()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha descarregat "DNI Descendent"',
        ));

        $users = User::orderBy('dni','desc')->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->download('usuaris.pdf'); // Veiem el pdf en streaming
    }

    public function pobl_asc()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha visualitzat "Població Ascendent"',
        ));

        $users = User::groupBy('city', 'name')
            ->orderBy('city', 'asc')
            ->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->stream('usuaris.pdf'); // Veiem el pdf en streaming
    }
    public function pobl_asc_down()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha descarregat "Població Ascendent"',
        ));

        $users = User::groupBy('city', 'name')
            ->orderBy('city', 'asc')
            ->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->download('usuaris.pdf'); // Veiem el pdf en streaming
    }

    public function pobl_desc()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha visualitzat "Població Descendent"',
        ));

        $users = User::groupBy('city', 'name')
            ->orderBy('city', 'desc')
            ->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->stream('usuaris.pdf'); // Veiem el pdf en streaming
    }
    public function pobl_desc_down()
    {
        \App\Pdf::create(array(
            'user_id'   =>      Auth::user()->id,
            'accio'   =>      'Ha descarregat "Població Descendent"',
        ));

        $users = User::groupBy('city', 'name')
            ->orderBy('city', 'desc')
            ->get(); // Retornem la vista ordenada per usuari ascendent.
        $pdf = PDF::loadView('pdf.generador', ['users' => $users]);// Li passem la vista amb tots els usuaris
        return $pdf->download('usuaris.pdf'); // Veiem el pdf en streaming
    }

}
