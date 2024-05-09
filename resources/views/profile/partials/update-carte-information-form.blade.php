<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Carte Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __('Update your carte information.') }}
        </p>
    </header>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('carte.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="numero" :value="__('Numéro')" />
            <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full" :value="old('numero', optional($user->carte)->numero)"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('numero')" />
        </div>
        <div>
            <x-input-label for="ville" :value="__('Ville')" />
            <x-text-input id="ville" name="ville" type="text" class="mt-1 block w-full" :value="old('ville', optional($user->carte)->ville)"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('ville')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'carte-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
