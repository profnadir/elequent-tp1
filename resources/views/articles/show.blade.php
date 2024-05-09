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
                    <p class="mt-4 text-gray-500">Auteur: {{ $article->user->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if ($article->comments->count() > 0)
                        <ul>
                            @foreach ($article->comments as $comment)
                                <li class="mb-2">
                                    <div class="font-bold">{{ $comment->author }}</div>
                                    <div class="text-gray-600">{{ $comment->content }}</div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-600">Aucun commentaire pour le moment.</p>
                    @endif
                    <form method="POST" action="{{ route('comments.store', $article) }}">
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Contenu:</label>
                            <textarea name="content" id="content"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="author" class="block text-gray-700 text-sm font-bold mb-2">Auteur:</label>
                            <input type="text" name="author" id="author" value="{{ old('author') }}"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('author')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border bordertransparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bgindigo-700 active:bg-indigo-800 focus:outline-none focus:border-indigo-700 focus:shadow-outlineindigo disabled:opacity-25 transition ease-in-out duration-150">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
