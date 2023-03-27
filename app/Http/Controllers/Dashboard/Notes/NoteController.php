<?php

namespace App\Http\Controllers\Dashboard\notes;

use App\Helpers\AppHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Notes\NotesRegisterRequest;
use App\Http\Requests\Dashboard\Notes\NotesUpdateRequest;
use App\Models\Note;

class noteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:note-list', ['only' => ['index']]);
        $this->middleware('permission:note-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:note-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:note-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Note::orderBy('id', 'DESC')->paginate(5);
        return view('notes.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotesRegisterRequest $request)
    {
        $validatedData = $request->validated();

        Note::create($validatedData);

        return redirect()->route('notes.index')
            ->with('success', 'note Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id);

        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NotesUpdateRequest $request, note $note)
    {
        $validatedData = $request->validated();
        
        $note->update($validatedData);


        return redirect()->route('notes.index')
            ->with('success', 'note Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Note::find($id)->delete();
        return redirect()->route('notes.index')
            ->with('success', 'note Deleted Successfully');
    }
}