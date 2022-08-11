@extends('layouts.admin')
@section('title', 'Вопрос')
@section('content')
    <div>
        <div class="m-auto px-4 py-8 max-w-xl">
            <div class="bg-white shadow-2xl" >
                <div class="px-4 py-2 mt-2 bg-white">
                    <h2 class="font-bold text-2xl text-gray-800">{{$quest->email}}</h2>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                        {!! $quest->description !!}
                    </p>
                    <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                        Ответ:
                        {!! $quest->message !!}
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection

