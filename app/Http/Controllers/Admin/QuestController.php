<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuestFormRequest;
use App\Mail\QuestUpdated;
use App\Models\Quest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuestController extends Controller
{
    public function index(){

        $quests = Quest::query()->orderBy("updated_at", "DESC")->paginate(3);
        return view('admin.quests.index', [
            "quests" => $quests,

        ]);

    }
    public function create()
    {
        return view("admin.quests.create", []);
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

        return redirect(route('admin.quests.index'));
    }

    public function show($id) {

        $quest = Quest::findOrFail($id);

        return view('admin.quests.show', [
            "quest" => $quest,
        ]);
    }
    public function edit($id)
    {

        $quest = Quest::findOrFail($id);

        return view("admin.quests.create", [
            "quest" => $quest,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param QuestFormRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestFormRequest $request, $id)
    {

        $quest = Quest::findOrFail($id);

        $data = $request->validated();

        $quest->update($data);

        Mail::to($quest)->send(new QuestUpdated($quest));

        return redirect(route('admin.quests.index'));
    }

}
