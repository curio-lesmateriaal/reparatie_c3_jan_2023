<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pas je team aan
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('teams.update', $team->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="team">Team naam</label>
                            <input type="text" class="form-control" value="{{ $team->name }}" id="team" aria-describedby="team naam" name="name">
                            <small class="form-text text-muted">Pas je team naam verstandig.</small>
                        </div>
                        <div class="form-group">
                            <label for="">Teamlid toevoegen</label>
                            <select class="form-control" name="new_teammate" id="">
                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Alleen voor de Admin! --}}
                        @if (Auth::user()->is_admin == '1')
                        <div class="form-group">
                            <label for="points">Punten</label>
                            <input type="text" class="form-control" value="{{ $team->points }}" id="team" aria-describedby="team naam" name="points">
                            <small class="form-text text-muted">Voer het punt in.</small>
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Aanpassen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    <h1 class="text-center">Teamleden</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Team naam</th>
                                    <th>Verwijder</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teammates as $teammate)
                                <tr>
                                    <td>{{$teammate->name}}</td>
                                    <td>
                                        <form action="{{route('teams.destroyTeammate', [$team->id, $teammate->id])}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </x-app-layout>
