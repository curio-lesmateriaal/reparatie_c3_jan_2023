<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Creeër een team
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                    <form method="POST" action="{{route('teams.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="team">Team naam</label>
                            <input type="text" class="form-control" id="team" aria-describedby="team naam" name="name" placeholder="Voer een team naam">
                            <small id="emailHelp" class="form-text text-muted">Kies een verstandige team naam</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
