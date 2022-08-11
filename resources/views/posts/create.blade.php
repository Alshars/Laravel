@extends('layouts.layout')

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{'Добавить заказ'}}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{route("posts.store")}}">
                @csrf

                    @method('PUT')

                <input name="title" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Название" />

                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Почта" />

                <input name="preview" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Описание" />

                <input name="description" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Текст" />


                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
</main>
@endsection
