<?php

namespace App\Http\Controllers;

use App\File;
use App\Program;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    protected $url = '/fichas';

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
            'files' => File::orderBy('file', 'asc')->paginate(25),
            'programs' => $this->get_programs(),
            'url' => $this->url,
        );
        return view('files.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programs = $this->get_programs();
        return view('files.create')->with('programs', $programs);
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
            'file' => 'required',
            'program' => 'required',
        ]);

        // Create the file
        $file = new File;
        $file->id_program = $request->input('program');
        $file->file = $request->input('file');
        $file->save();

        return redirect($this->url)->with('success', 'Ficha agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'file' => File::find($id),
            'programs' => $this->get_programs(),
        );

        return view('files.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        $this->validate($request, [
            'file' => 'required',
            'program' => 'required',
        ]);

        // Update the File
        $file = file::find($id);
        $file->file = $request->input('file');
        $file->id_program = $request->input('program');
        $file->save();

        return redirect($this->url)->with('success', 'Ficha editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        $file->delete();
        return redirect($this->url)->with('success', 'Ficha eliminada con éxito');
    }

    public function get_programs()
    {
        $data_programs = Program::orderBy('program', 'asc')->get();
        $programs = array();
        foreach($data_programs as $prog)
        {
            $programs[$prog->id] = $prog->program;
        }

        return $programs;
    }
}
