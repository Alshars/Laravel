@extends('layouts.admin')
@section('title', 'Вопросы')
@section('content')

    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">Вопросы</h3>


        <div class="flex flex-col mt-8">
            <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div
                    class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                    <table class="min-w-full">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Заголовок</th>
                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                        </thead>

                        <tbody class="bg-white">
                        @foreach($quests as $quest)

                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900"><text><b>Вопрос: </b></text>{{ $quest->description }}</div>
                                    <div class="text-sm leading-5 text-gray-900"><text><b>Почта пользователя: </b></text>{{ $quest->email }}</div>
                                </td>
                                <td>
                                <button type="button" class="btn btn-primary"><a href="{{ route("admin.quests.edit", $quest['id']) }}" class="text-decoration-none text-reset">Ответить</a></button><br>
                                <button type="button" class="btn btn-info"><a href="{{ route("admin.quests.show", $quest['id']) }}" class="text-decoration-none text-reset">Подробнее</a></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
