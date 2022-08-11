<?php $orders = new \App\Models\Post() ?>
<div class="px-4 py-8 max-w-xl">
    <div class="bg-white shadow-2xl" >
        <div>
            <a href="{{ route("posts.show", $post->id) }}">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $post->title }}</text></svg>
            </a>
        </div>

        <div class="px-4 py-2 mt-2 bg-white">
            <h2 class="font-bold text-2xl text-gray-800">{{ $post->title }}</h2>
            <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                {!! $post->preview !!}
            </p>
            <p>
                Статус заказа:
                @foreach ($orders::STATUSES as $key => $value)
                @if ($post->status == $key && $key == 1)
                    <span class="text-danger">{{ $value }}</span>
                @elseif ($post->status == $key && $key == 2)
                    <span class="text-success">{{ $value }}</span>
                @endif
                @endforeach
            </p>

            <div class="btn-group">
                <a href="{{ route("posts.show", $post->id) }}" class="btn btn-sm btn-outline-secondary">Посмотреть</a>
            </div>
        </div>
    </div>
</div>
