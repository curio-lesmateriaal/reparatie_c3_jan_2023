<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 d-flex flex-column">
                    {{ __("You're logged in!") }}
                    {{-- Hier komt een button om een nieuwe team aan te maken --}}
                    <a href="{{route('teams.create')}}" class="btn btn-primary">Nieuw team</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
