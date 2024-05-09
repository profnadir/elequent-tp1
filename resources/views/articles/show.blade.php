<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <p>{{ $article->content }}</p>
                    <p class="mt-4 text-gray-500">Auteur: {{ $article->author }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
