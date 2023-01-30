<?php use App\Models\User; ?>

<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Team overzicht
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-center">
                        <h1 style="font-size: 2rem">Alle Teams</h1>
                    </div>
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Team</th>
                                <th>Points</th>
                                <th>Gemaakt door</th>
                                <th>Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($teams as $team)
                                <tr>
                                    <td>{{$team->name}}</td>
                                    <td>{{$team->points}}</td>
                                    <td>{{$team->user->name}}</td>
                                    <td class="d-flex flex-row">
                                        <form action="{{route('teams.destroy', $team->id)}}" method="POST">
                                            <?php   
                                            $i = 1;
                                            if($i == 2){
                                                dd($team);
                                            }
                                            $i++;
                                            ?>
                                            <a href="{{route('teams.edit', $team->id)}}" class="btn btn-primary mr-3">Bewerken</a>
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
