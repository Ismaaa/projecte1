<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Publication;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

use View;

use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        Carbon::setLocale('ca');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* PROVES
            $users = User::orderBy('id', 'ASC');
            $users = DB::table('users')->distinct()->limit(10)->orderBy('created_at', 'desc')->get();
            /$users = User::all();
            $publications = Publication::all()->orderBy('created_at', 'asc');
        */

        //////////////$users = User::limit(10)->orderBy('id')->get();


        $publications = Publication::withCount('User')->orderBy('created_at', 'desc')->paginate(10);



        ////$column = Input::get('orderBy', 'created_at');

        /* PROVES
            $tenenPublicacio = Publication::whereNotNull('text');
            $users = User::limit(10)->orderBy('id', 'asc')->get();
            dd($tenenPublicacio);
        */

        /* AQUEST SNIPPET SI QUE VA
            $users = User::with(['publications' => function ($query) {
                $query->groupBy('created_at');
            }])->get();

            return view('prova')->with('users', $users);
        */

        ////$users = User::find(10)->publications()->orderBy($column)->get();


        //dd($users);

        ////return view('prova')->with('users', $users);


        return view('portada')->with('publications', $publications);
        //////////////////return view('portada')->with('users', $users);

        /* PROVES
            Game::take(30)->skip(30)->get();

            $users = User::all();

            return view('prova')->with('users', $users);
        */
    }
}
