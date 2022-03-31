<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theme;
use App\Direction;
use App\Conclusion;
use App\Discussion;
use App\Intervenant;
use App\User;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $discussion=Discussion::all();
       $intervenant= Intervenant::all();
       $theme = Theme::all();
       $user= User::all();
        return view('home', [
            'theme'=>$theme,
            'intervenant'=>$intervenant,
            'user'=> $user,
            'discussion'=>$discussion
        ]);
    }
    public function search(Request $request){
        if (request()->query('search')){
            $search = $request->input('search');
             $theme = Theme::query()
            ->where('theme', 'LIKE', "%{$search}%")
            ->orWhere('updated_at', 'LIKE', "%{$search}%")
            ->get();

            $search1 = $request->input('search');
             $direction = Direction::query()
            ->where('libelle', 'LIKE', "%{$search1}%")
            ->orWhere('abr', 'LIKE', "%{$search1}%")
            ->get();
            $search1 = $request->input('search');
            $intervenant = Intervenant::query()
           ->where('nom', 'LIKE', "%{$search1}%")

           ->get();
        }
        return view('search',[
            'theme'=>$theme,
            'direction'=>$direction,
            'intervenant'=>$intervenant
        ]);
    }
}

