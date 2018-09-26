<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    protected $url = '/programas';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //lets only users with a specific permission to access these resources
        $this->middleware(['auth', 'canEdit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'programs' => Program::orderBy('created_at', 'asc')->paginate(10),
            'url' => $this->url,
        );
        return view('programs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'program' => 'required',
        ]);

        // Create program
        $program = new Program;
        $program->program = $request->input('program');
        $program->save();

        return redirect('/programas')->with('success', 'Programa agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = Program::find($id);
        return view('programs.edit')->with('program', $program);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'program' => 'required',
        ]);

        // Update the Program
        $program = Program::find($id);
        $program->program = $request->input('program');
        $program->save();

        return redirect($this->url)->with('success', 'Programa actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect($this->url)->with('success', 'Programa eliminado con éxito');
    }
}
