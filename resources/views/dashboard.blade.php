<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Кабинет') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Вы авторизованы!
                    <div class="mt-8">
                        <a href="{{ route("posts.create") }}" class="text-indigo-600 hover:text-indigo-900">Создать заказ</a><br>
                        <a href="{{ route("quests.create") }}" class="text-indigo-600 hover:text-indigo-900">Задать вопрос</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
