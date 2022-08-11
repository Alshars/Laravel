@extends('layouts.layout')
@section('title', 'Статьи')
<h1>Список заказов</h1>
@section('content')


    <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-10 mb-20">
        @foreach($posts as $post)
            @if($post->user_id == Auth::user()->id)
                @include("posts.partials.item", ["post" => $post])
            @endif
        @endforeach
        {{ $posts->links() }}
    </div>
@endsection
