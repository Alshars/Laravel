<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestFormRequest;
use App\Models\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index(){

        $quests = Quest::query()->orderBy("updated_at", "DESC")->paginate(3);
        return view('quests.index', [
            "quests" => $quests,

        ]);

    }
    public function create()
    {
        return view("quests.create", []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuestFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestFormRequest $request)
    {
        $quest = Quest::create($request->validated());

        return redirect(route('quests.index'));
    }

    public function show($id) {

        $quest = Quest::findOrFail($id);

        return view('quests.show', [
            "quest" => $quest,
        ]);
    }

}
