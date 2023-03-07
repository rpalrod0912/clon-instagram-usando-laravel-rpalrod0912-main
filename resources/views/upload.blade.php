<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir Nueva Publicación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Configuración de mi cuenta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza los datos de tu cuenta") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        
        
        <div>
            <x-input-label for="image_path" :value="__('Imagen')" />
            <x-text-input id="image_path" name="image_path" type="file" class="mt-1 block w-full" :value="old('image', $user->image)" required autofocus autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Descripcion')" />
            <x-text-input id="description" name="description" type="textarea" :value="old('nick', $user->nick)" required autofocus autocomplete="Descripcion..." />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Subir') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Publicado') }}</p>
            @endif
        </div>
    </form>
</section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
