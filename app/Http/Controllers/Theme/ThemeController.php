<?php

namespace App\Http\Controllers\Theme;

use App\Theme;
Use App\Discussion;
use App\Conclusion;
use App\Direction;
use App\Http\Controllers\Controller;
use App\Intervenant;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $theme=Theme::orderBy('id', 'desc')->paginate(10);
        return view('themes.index2', compact('theme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('themes.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $theme= new Theme;
            $theme->theme=$request->theme;
            $theme->observation=$request->observation;
            $theme->save();
            return redirect()->route('discussion.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        $discussion= DB::table('discussions')->where('theme_id', '=', $theme->id)
        ->join('intervenants','intervenants.id','=','intervenant_id')
        ->select('intervenants.nom','discussions.idee','discussions.theme_id')
        ->get();
        $conclusion=Conclusion::all();
        $direction=Direction::all();
        return view('themes.view',[
            'conclusion'=>$conclusion,
            'theme'=>$theme,
            'discussion'=>$discussion,
            'direction'=>$direction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'theme'=>'required',

        ]);
            $theme->update($request->all());
            return redirect()->route('themes.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->conclusion()->delete();
        $theme->discussions()->delete();
        $theme->delete();
        return redirect()->route('themes.index');

    }
}
