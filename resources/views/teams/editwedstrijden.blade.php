<x-app-layout>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Scores toevoegen
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                    <p>Wedstrijd: {{$match->team1->name}} VS {{$match->team2->name}}</p>
                    <form action="{{route('wedstrijd.saveEditScores', $match->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="team1_sscore">{{$match->team1->name}}</label>
                            <input id="team1_score" type="number" name="team1_score">
                        </div>
                        <div class="form-group">
                            <label for="team2_sscore">{{$match->team2->name}}</label>
                            <input id="team2_score" type="number" name="team2_score">
                        </div>
                        <p class="alert alert-warning">Als u eenmaal op verstuur klikt kunt de score niet meer worden aangepast!</p>
                        <button type="submit" class="btn btn-primary">Verstuur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

