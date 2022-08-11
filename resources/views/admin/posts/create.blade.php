@extends('layouts.admin')
@section('title', 'Редактировать')

@section('content')
    <?php $orders = new \App\Models\Post() ?>
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{'Редактировать'}}</h3>

        <div class="mt-8">

        </div>

        <div class="mt-8">
            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ route("admin.posts.update", $post->id) }}">
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif

                <input name="title" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Название" value="{{ $post->title ?? '' }}"/>

                <input name="email" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Почта" value="{{ $post->email ?? '' }}"/>

                <input name="preview" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Описание" value="{{ $post->preview ?? '' }}"/>

                <input name="description" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Текст" value="{{ $post->description ?? '' }}"/>

                <div class="form-group" >

                    <select name="status" class="form-control" title="Статус заказа" >
                        @foreach ($orders::STATUSES as $key => $value)
                            <option value="{{ $key }}" >
                                {{ $value }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <input name="message" type="text" class="w-full h-12 border border-gray-800 rounded px-3" placeholder="Комментарий" value="{{ $post->message ?? '' }}"/>

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>

            </form>
        </div>
    </div>
</main>
@endsection
