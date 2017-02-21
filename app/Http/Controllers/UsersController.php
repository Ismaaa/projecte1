<?php

namespace App\Http\Controllers;
// Importem el request

use App\Publication;

use App\Pdf;

use App\Suggeriment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Treballarem amb vistes
use View;

// Utilitzem el model User
use App\User;

// Validació de formularis
use Validator;

// Hash de contrasenyes
use Hash;

// Utilitzarem la classe Auth
use Auth;

// Utilitzarem la classe Image
use Image;

use Illuminate\Support\Facades\Redirect;

// Laravel DB queries, revisar laravel documentation, moltíssima info útil
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use UxWeb\SweetAlert\SweetAlert as Alert;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setLocale('ca');
    }

    public function index()
    {
        return redirect()->action('UsersController@llistat');
    }
    public function llistat()
    {
            $users = User::orderBy('id', 'ASC')->paginate(9);
            return view('usuari.usuaris')->with('users', $users);
    }

    public function perfil($id)
    {
        //dd($id);
        $user = User::find($id);
        //dd($user);
        //if($user == null){
        if(!$user == null){
            return view('usuari.perfil')->with('user', $user);
        }
        else {
            Alert::info('Pareix que l\'usuari que busques no existeix')->persistent("Tancar");
            //alert()->error('Pareix que l\'usuari que busques no existeix.', 'Woops!')->autoclose(1500);
            //dd('Aquest usuari no existeix');
            return redirect()->action('HomeController@index');
        }
    }

    public function esborrar($id)
    {
        //dd('hsfas');
        //$user = User::find($id); // Busquem al usuari per ID
        //$user->delete(); // Esborrem l'usuari

        $usuari = User::find($id);

        Alert::error('Et trobarem a faltar!', 'Àdeu '.$usuari->name)->persistent("Tancar");
        //alert()->success('Usuari esborrat correctament', 'Ben fet Admin!')->autoclose(1500);

        User::destroy ($id);

        return redirect()->action('HomeController@index');
    }

    public function editar($id)
    {
        $user = User::find($id);
        $comarques = DB::table('users')->select('name');


        if((Auth::user()->admin) && $user->admin == false || ($user->id == Auth::user()->id))
        {
            //dd($comarca);
            return view('usuari.editar')->with('user', $user, 'comarca', $comarques);
        }
        else {
            //dd($comarca);
            return view('usuari.perfil')->with('user', $user, 'comarca', $comarques);
        }
    }

    public function modificar(Request $request, $id)
    {

        //dd($request);
/*
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'surnames' => 'required|max:255',
            'dni' => 'required|min:8|max:10|unique:users',
            'email' => 'required|email|min:3|max:255|unique:users',
            'city' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|min:8|max:20|unique:users',
            'bio' => 'max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
            alert()->error('Recorda emplenar tots els camps! I potser el correu està repetit!', 'Ops, error')->autoclose(1500)->persistent('Tancar');
            alert()->error('Error Message', 'Optional Title')->persistent('Close');

            return redirect('/usuaris/'.$user->id.'/editar')->with('user', $user);
        }*/


        // Realitzem la validació de dades rebudes del formulari
        $rules=array(
            'name' => 'required|max:255',
            'surnames' => 'required|max:255',
            //'dni' => 'required|min:8|max:10|unique:users', Comento aquesta línia perquè el DNI no es pot canviar, i si canvia ja si salta l'error que he preparat més abaix
            'email' => 'required|email|min:3|max:255|unique:users,email,'.$id, // Únic a la taula usuaris, colummna e-mail a excepció de l'usuari que actualitzem
            'city' => 'required|max:40',
            'address' => 'required|max:70',
            'phone' => 'required|min:8|max:20|unique:users,phone,'.$id, // Únic a la taula usuaris, colummna phone a excepció de l'usuari que actualitzem
            'bio' => 'max:255',
            'password' => 'min:6', // No requerim contrasenya, perquè l'admin per exemple no la utiliza al modficar usuaris
            'password_confirmation' => 'min:6|same:password', // No requerim contrasenya, perquè l'admin per exemple no la utiliza al modficar usuaris
        );

        $messages = [
            'name.required' => 'El camp Nom no pot estar buit!',
            'surnames.required' => 'El camp Nom no pot estar buit!',
            //'dni.required' => 'El camp DNI no pot estar buit!',
            'email.unique' => 'Ops! Pareix que algú ja utilitza aquest :attribute.',
            'email.required' => 'Recorda que no pots deixar el email buit!.',
            'city.max' => 'La ciutat no pot tenir més de :max caràcters.',
            'address.max' => 'La adreça no pot tenir més de :max caràcters.',
            'phone.unique' => 'Pareix que algú ja utilitza aquest telèfon.',
            'phone.min' => 'El telèfon ha de ser entre :min i :max.',
            'phone.max' => 'El telèfon ha de ser entre :min i :max.',
            'bio.max' => 'La biografia no pot passar els :max caràcters.',
            'password.required' => 'La contrasenya és obligatòria!.',
            'password.min' => 'Recorda que la contrasenya ha de tenir mínim :min dígits.',
            'password_confirmation.same' => 'Parex que les contrasenyes no corresponen!',
            'password_confirmation.required' => 'La contrasenya repetida és obligatòria.',
        ];

        // Amb l'ajuda del Validator validarem les dades
        // Li passarem les regles de validacio
        $validator=Validator::make($request->all(),$rules, $messages);

        $user = User::find($id);

        if ($validator->fails())
        {
            //dd($validator);
            Alert::warning('Revisa les dades i torna a provar-ho', 'S\'han trobat errors')->persistent("Tancar");
            //alert()->error('Hem trobat errors!', 'Ops, error')->autoclose(1500)->persistent('Tancar');
            return Redirect::to('/usuaris/'.$user->id.'/editar')->with('user', $user) // Si la validacio falla el recireccionem una altra vegada al formulari
            ->withInput() // Enviant una variable Input que conte tots els inputs que ha rebut
            ->withErrors($validator->messages()); // I la variable errors que es la que te els missatges d'error del Validator
        }

        $user->fill($request->all()); // Emplena i reemplaça totes les dades

        if($request->dni)
        {
            //dd('modificat');
            Alert::error('El camp DNI no es pot modificar', 'No pots fer això')->persistent("Tancar");
            //alert()->error('NO POTS CANVIAR EL DNI!', 'NO POTS FER AIXÒ!')->autoclose(2000);
            return redirect('/usuaris/'.$user->id.'/editar')->with('user', $user);
        }

        //dd($request);
        //if($request->has($user->password)) // AIXI NO VAAAAAAAAAAAAAAA
        if($request->password) // SI HI HA PASSWORD --- AQUESTA FORMA MEVA MILLOR ! VA PERFECTE
        {
            //dd('hi ha pass');
            $user->password = bcrypt($request->password); // LA ENCRIPTEM
            /* SI LA ENCRIPTEM SENSE MIRAR SI HI HA PASSWORD DONARÀ ERROR AMB ELS ADMINISTRADORS, JA QUE ENCRIPTARA NULL I LA CONTRASENYA DEIXARÀ DE SER LA MATEIXA */
        }
        //dd('no hi ha pass');

        //dd($request->dni);
        /*
        if($request->dni == $comprovadorDNI->dni)
        {
            dd('igual,' . $request->dni . ' - '. $comprovadorDNI->dni);
        }
        else
        {
            dd('diferent,' . $request->dni . ' - '. $comprovadorDNI->dni);
        }
        */

        if($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $nomfitxer = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/perfils/avatars/' . $nomfitxer));
            $user->avatar = $nomfitxer;
        }

        /* SI AL FORMULARI NO LI PASSO FILES TRUE NO FUNCIONARAAA */
        $user->save();

        if(Auth::user()->admin)
        {
            Alert::success('S\'ha modificat l\'usuari '.$user->name.' correctament.', 'Genial!')->persistent("Tancar");
            //alert()->success('Usuari modificat correctament', 'Ben fet Admin!')->autoclose(1500);
            return redirect('/usuaris/'.$user->id.'/editar')->with('user', $user);
        }
        else
        {
            Alert::success('S\'han desat tots els canvis correctament', 'Canvis desats')->persistent("Tancar");
            //alert()->success('Canvis desats correctament!', 'Wohooo!')->autoclose(1500);
            return redirect('/usuaris/'.$user->id.'/editar')->with('user', $user);
        }
    }

    public function publicar(Request $request, $id)
    {
        //dd($request);
        $rules=array(
            'text' => 'required|max:255',
        );

        //dd($id);

        $messages = [
            'text.max' => 'El missatge ha de ser de màxim :max caràcters.',
        ];

        // Amb l'ajuda del Validator validarem les dades
        // Li passarem les regles de validacio
        $validator=Validator::make($request->all(),$rules, $messages);

        $user = User::find($id);

        if ($validator->fails())
        {
            //dd($validator);
            Alert::error('Revisa les dades i torna a provar-ho', 'Hem trobat errors!')->persistent("Tancar i revisar");
            //alert()->error('Hem trobat errors!', 'Ops, error')->autoclose(1500)->persistent('Tancar');
            return Redirect::to('/portada')->with('user', $user) // Si la validacio falla el recireccionem una altra vegada al formulari
            ->withInput() // Enviant una variable Input que conte tots els inputs que ha rebut
            ->withErrors($validator->messages()); // I la variable errors que es la que te els missatges d'error del Validator
        }

        //$publicacio = Publication::find($id);
        //$publicacio->fill($request->all()); // Emplena i guarda totes les dades

        Publication::create(array(
            'text'      =>      $request->input('text'),
            'user_id'   =>      $id,
        ));

        Alert::success('Pots veure totes les publicacions a la portada', 'Publicació enviada')->persistent("Tancar");
        //alert()->success('Pots veure la teva publicació a la portada', 'Publicació afegida !!')->autoclose(1500);
        return redirect('/portada')->with('user', $user);
    }

    public function enviarSuggeriments()
    {
        return view('usuari.enviarSuggeriments');
    }

    public function publicarSuggeriments(Request $request, $id)
    {
        //dd($request);
        $rules=array(
            'text' => 'required|max:255',
        );

        //dd($id);

        $messages = [
            'text.max' => 'El missatge ha de ser de màxim :max caràcters.',
        ];

        // Amb l'ajuda del Validator validarem les dades
        // Li passarem les regles de validacio
        $validator=Validator::make($request->all(),$rules, $messages);

        $user = User::find($id);

        if ($validator->fails())
        {
            //dd($validator);
            Alert::error('Revisa les dades i torna a provar-ho', 'Hem trobat errors!')->persistent("Tancar i revisar");
            //alert()->error('Hem trobat errors!', 'Ops, error')->autoclose(1500)->persistent('Tancar');
            return Redirect::to('/usuaris/suggeriments')->with('user', $user) // Si la validacio falla el recireccionem una altra vegada al formulari
            ->withInput() // Enviant una variable Input que conte tots els inputs que ha rebut
            ->withErrors($validator->messages()); // I la variable errors que es la que te els missatges d'error del Validator
        }

        Suggeriment::create(array(
            'text'      =>      $request->input('text'),
            'user_id'   =>      $id,
            'type'      =>      $request->input('type'),
        ));

        Alert::success('Gràcies per contactar amb nosaltres, revisarem el missatge tan pronte com puguem!', 'Missatge enviat')->persistent("Tancar");
        return redirect('/usuaris/suggeriments')->with('user', $user);
    }

    /* ADMINS */
    public function perfiladmin($id)
    {
        //dd($id);
        $user = User::find($id);
        //dd($user);
        if($user == null){
            dd('Aquest usuari no existeix');
        }
        else {
            return view('usuari.perfil')->with('user', $user);
        }
    }

    public function llistatadmin()
    {
        ///$users = User::orderBy('id', 'ASC')->paginate(9);


        //$users = User::where(['admin','==',true])->first; TAMPOC VA

        /* EXEMPLES

            http://stackoverflow.com/questions/32147247/find-user-in-laravel-by-username

            User::where('username','John') -> first();
            // or use like
            User::where('username','like','%John%') -> first();
            User::where('username','like','%John') -> first();
            User::where('username','like','Jo%') -> first();
        */

        /* ESTE NO VA
        $users = User::whereHas(
            'admin', function($q){
            $q->where('admin', 1);
        }
        )->get();*/
        //$users = User::where('admin',1)->all();

        // https://laravel.com/docs/5.3/queries -------- MOLT BONA INFO AQUI
        $users = DB::table('users')->where('admin', 1)->orderBy('id', 'asc')->get(); // ARA SÍÍ, REVISAR LARAVEL QUERIES A LA DOCUMENTACIÓ
        //dd($users);
        return view('admin.llistat')->with('users', $users);
    }

    public function taulerllistat()
    {
        $users = DB::table('users')->where('admin', 1)->orderBy('id', 'asc')->get(); // ARA SÍÍ, REVISAR LARAVEL QUERIES A LA DOCUMENTACIÓ
        //dd($users);
        return view('admin.taulerllistat')->with('users', $users);
    }

    public function suggeriments()
    {
        /*
        $suggeriments = Suggeriment::get('User')->orderBy('created_at', 'desc')->paginate(999); ANTERIOR QUE UTILITZAVA
        return view('admin.suggeriments')->with('suggeriments', $suggeriments); ANTERIOR QUE UTILITZAVA
        */
        $suggeriments = Suggeriment::orderBy('created_at', 'desc')->get(); // LA COL·LECCIÓ DE SUGGERIMENTS ORDENATS
        $users=\App\User::count(); // Número d'usuaris
        ////return view('admin.suggeriments',['suggeriments'=>$suggeriments,'users'=>$users]); // PASSAR DUES VARIABLES PER ARRAY
        return view('admin.suggeriments', compact('suggeriments', 'users')); // PASSAR DUES VARIABLES AMB COMPACT UTILITZANT EL MATEIX NOM

    }

    public function tauler()
    {
        return view('admin.tauler');
    }

    public function historialpdf()
    {

        $historials = PDF::withCount('User')->orderBy('created_at', 'desc')->paginate(10); // Aquest és més ràpid
        //$historials = PDF::has('User')->orderBy('created_at', 'desc')->paginate(10);
        //dd($historials);

        return view('admin.historialpdf')->with('historials', $historials);
    }

    public function usuaris()
    {
        $users = User::orderBy('id', 'ASC')->paginate(9);
        return view('admin.usuaris')->with('users', $users);
    }

}
