@extends('layouts.layout')
@section('title', 'Вопросы')
<h1>Список вопросов</h1>
@section('content')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($quests as $quest)
            @if($quest->user_id == Auth::user()->id)
                @include("quests.partials.item", ["quest" => $quest])
            @endif
        @endforeach
        {{ $quests->links() }}
    </div>
@endsection
