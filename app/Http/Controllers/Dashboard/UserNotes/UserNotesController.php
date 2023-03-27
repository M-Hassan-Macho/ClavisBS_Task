<?php

namespace App\Http\Controllers\Dashboard\UserNotes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UserHasnotes\UserHasNotesRegisterRequest;
use App\Models\User;
use App\Models\UserHasNotes;
use App\Models\Note;

class UsernotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:userhasnotes-list', ['only' => ['index']]);
        $this->middleware('permission:userhasnotes-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:userhasnotes-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:userhasnotes-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::paginate(10);
        return view('userhasnotes.index', compact('data'));
    }

    public function create()
    {
        $users = User::all();
        $notes = Note::all();
        return view('userhasnotes.create', compact('users', 'notes'));
    }

    public function store(UserHasNotesRegisterRequest $request)
    {
        $validatedData = $request->validated();
        // dd($validatedData);
        UserHasNotes::create($validatedData);;

        return redirect()->route('userhasnotes.index')->with('success', 'Data Assigned Successfully');
    }

    public function show($id)
    {
        $data = UserHasNotes::join('users', 'user_has_notes.user_id', '=', 'users.id')
            ->join('notes', 'user_has_notes.note_id', '=', 'notes.id')
            ->select('user_has_notes.id AS user_has_notes_id' , 'notes.title', 'notes.body')
            ->where('user_has_notes.user_id', $id)
            ->paginate(10);
        $user = User::all();
        return view('userhasnotes.show', compact('data','user'));
    }

    public function destroy($id)
    {
        $userHasnotes= UserHasNotes::findOrFail($id);
        $userHasnotes->delete();

        return redirect('userhasnotes')->with('success', 'Data Deleted Successfully');
    }
}