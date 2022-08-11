<div class="px-4 py-8 max-w-xl">
    <div class="bg-white shadow-2xl" >
        <div class="px-4 py-2 mt-2 bg-white">
            <h2 class="font-bold text-2xl text-gray-800">{{ $quest->description }}</h2>
            <p class="sm:text-sm text-xs text-gray-700 px-2 mr-1 my-3">
                <strong>Вопрос: </strong>
                {!! $quest->email !!}
            </p>
            <div class="btn-group">
                <a href="{{ route("quests.show", $quest->id) }}" class="btn btn-sm btn-outline-secondary">Посмотреть</a>
            </div>
        </div>
    </div>
</div>
