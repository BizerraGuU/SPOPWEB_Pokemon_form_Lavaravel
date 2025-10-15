<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar Pokémon') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('cadastrar-pokemon') }}">
                        @csrf
                        <!-- Nome -->
                        <div>
                            <x-input-label for="nome" :value="__('Nome')" />
                            <x-text-input id="nome" class="block mt-1 w-full" type="text" name="nome" :value="old('nome')" required autofocus />
                            <x-input-error :messages="$errors->get('nome')" class="mt-2" />
                        </div>

                        <!-- Altura -->
                        <div class="mt-4">
                            <x-input-label for="altura" :value="__('Altura (em metros)')" />
                            <x-text-input id="altura" class="block mt-1 w-full" type="number" step="0.01" name="altura" :value="old('altura')" required />
                            <x-input-error :messages="$errors->get('altura')" class="mt-2" />
                        </div>

                        <!-- Fase Evolutiva -->
                        <div class="mt-4">
                            <x-input-label for="fase_evolutiva" :value="__('Fase Evolutiva')" />
                            <x-text-input id="fase_evolutiva" class="block mt-1 w-full" type="number" name="fase_evolutiva" :value="old('fase_evolutiva')" required />
                            <x-input-error :messages="$errors->get('fase_evolutiva')" class="mt-2" />
                        </div>

                        <!-- É da primeira geração? -->
                        <div class="mt-4">
                            <x-input-label :value="__('É da primeira geração?')" />

                            <div class="flex items-center gap-4 mt-2">
                                <label class="flex items-center">
                                    <input type="radio" name="primeira_geracao" value="1" {{ old('primeira_geracao') == '1' ? 'checked' : '' }} class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                    <span class="ml-2 text-sm text-gray-700">Sim</span>
                                </label>

                                <label class="flex items-center">
                                    <input type="radio" name="primeira_geracao" value="0" {{ old('primeira_geracao') == '0' ? 'checked' : '' }} class="text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                    <span class="ml-2 text-sm text-gray-700">Não</span>
                                </label>
                            </div>

                            <x-input-error :messages="$errors->get('primeira_geracao')" class="mt-2" />
                        </div>

                        <!-- Geração -->
                        <div class="mt-4">
                            <x-input-label for="geracao" :value="__('Geração')" />
                            <select id="geracao" name="geracao" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach (['Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Unova', 'Kalos', 'Alola', 'Galar', 'Paldea'] as $geracao)
                                    <option value="{{ $geracao }}" {{ old('geracao', 'Kanto') == $geracao ? 'selected' : '' }}>
                                        {{ $geracao }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('geracao')" class="mt-2" />
                        </div>
                        <!-- Botão -->
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Cadastrar Pokémon') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
