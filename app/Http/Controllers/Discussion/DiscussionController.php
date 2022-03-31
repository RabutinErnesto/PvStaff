<?php

namespace App\Http\Controllers\Discussion;

use App\Autreintervenant;
use App\Discussion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Theme;
use App\Intervenant;
class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
            $discussion=Discussion::all();
            return view('discu.list', compact('discussion'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $intervenant=Intervenant::latest()->get();
        $theme = Theme::orderBy('id', 'desc')->get();
        $discussion=Discussion::all();
        return view('discu.index', [

            'discussion'=>$discussion,
            'theme'=>$theme,
            'intervenant'=>$intervenant,

        ]
            );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discussion= new Discussion;
        $discussion->idee=$request->idee;
        $discussion->theme_id=$request->theme_id;
        $discussion->intervenant_id=$request->intervenant_id;
        $discussion->save();
            return redirect()->route('discussion.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        return view('discu.edit', compact('discussion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discussion $discussion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discussion  $discussion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discussion $discussion)
    {
        $discussion->delete();
        return redirect()->route('discussion.index');
    }
}
