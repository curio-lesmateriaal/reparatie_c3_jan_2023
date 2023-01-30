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
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                    @endif
                    {{-- generate matches button --}}
                    <form action="{{route('teams.generateMatches')}}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Genereer wedstrijden <span style="color: red;" class="fst-italic">(verwijdert alles)</span></button>
                        <div class="d-flex flex-row mt-3">
                            <div class="form-group d-flex flex-column">
                                <label for="fields">Aantal velden beschikbaar:</label>
                                <input type="number" name="velden" placeholder="voer aantal velden in" min="1" max="10">
                                <small>minimaal 1 veld en maximaal 10 velden</small>
                            </div>
                            <div class="form-group mr-3">
                                <label for="start_time">Starttijd:</label>
                                <input class="f form-check" type="time" id="appt" value="08:00" name="start_time"  required>
                            </div>
                            <div class="form-group d-flex flex-column mr-3">
                                <label for="rust">Rust:</label>
                                <input type="number" id="tentacles" name="rust_time" min="5" max="30" placeholder="duratie van het rust">
                                <small>minuten tussen 5 tot 30 minuten kiezen</small>
                            </div>
                            <div class="form-group d-flex flex-column">
                                <label for="tussen wedstrijden">tussen wedstrijden:</label>
                                <input type="number" id="tentacles" name="tussen_wedstrijden" min="0" max="50" placeholder="duratie tussen wedstrijden">
                                <small>minuten tussen 0 tot 50 minuten kiezen</small>
                            </div>
                        </div>
                        {{-- time options --}}
                    </form>
                    {{-- een tabel voor matches --}}
                    @if(isset($matches))
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Wedstrijd</th>
                                    <th scope="col">Team 1</th>
                                    <th scope="col">Team 2</th>
                                    <th scope="col">Veld</th>
                                    <th scope="col">Uitslag</th>
                                    <th scope="col">Start tijden</th>
                                    @if (Auth::user()->is_admin == '1')
                                    <th scope="col">Acties</th>
                                    @endif
                                    {{-- <th scope="col">Datum</th> --}}
                                    {{-- <th scope="col">Tijd</th>
                                    <th scope="col">Acties</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matches as $match)
                                <tr>
                                    <th scope="row">{{$match->id}}</th>
                                    <td>{{$match->team1->name}}</td>
                                    <td>{{$match->team2->name}}</td>
                                    <td>{{$match->field}}</td>
                                    <td>
                                        {{-- als score null laat 0 - 0 zien --}}
                                        @if(is_null($match->team1_score))
                                        -
                                        @else
                                        {{$match->team1_score}} - {{$match->team2_score}}
                                        @endif
                                    </td>
                                    <td>{{$match->start_time}}</td>
                                    @if (Auth::user()->is_admin == '1' && is_null($match->team1_score))
                                        <td>
                                            <form action="{{route('wedstrijd.editScores', $match->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-primary">Score invullen</button>
                                            </form>
                                        </td>
                                    @endif
                                        {{--  --}}
                                        {{-- score aanpassen button als score null is--}}
                                        {{-- @if($matche->score == null)
                                            <form action="{{route('teams.editScore', $match->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-primary">Score invullen</button>
                                            </form>
                                            @endif --}}
                                        {{-- </td> --}}
                                    </tr>
                                </tbody>
                                @endforeach

                        </table>
                        @else
                        <h2>Er zijn nog geen wedstrijden</h2>
                        @endif
                        </div>
                    </div>
                </div>
            </x-app-layout>
