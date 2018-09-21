<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Category;

class QuestionsController extends Controller
{
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
            'questions' => Question::orderBy('created_at', 'asc')->paginate(25),
            'categories' => $this->get_categories(),
            'url' => '/preguntas',
        );
        return view('questions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->get_categories();
        return view('questions.create')->with('categories', $categories);
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
            'category' => 'required',
            'question' => 'required',
        ]);

        // Create question
        $question = new Question;
        $question->id_category = $request->input('category');
        $question->question = $request->input('question');
        $question->save();

        return redirect('/preguntas')->with('success', 'Pregunta agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'question' => Question::find($id),
            'categories' => $this->get_categories(),
        );

        return view('questions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category' => 'required',
            'question' => 'required',
        ]);

        // Create category
        $question = Question::find($id);
        $question->question = $request->input('question');
        $question->id_category = $request->input('category');
        $question->save();

        return redirect('/preguntas')->with('success', 'Pregunta editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::find($id);
        $question->delete();
        return redirect('/preguntas')->with('success', 'Pregunta eliminada con éxito');
    }

    public function get_categories()
    {
        $data_categories = Category::orderBy('category', 'asc')->get();
        $categories = array();
        foreach($data_categories as $cat) {
            $categories[$cat->id] = $cat->category;
        }

        return $categories;
    }
}
