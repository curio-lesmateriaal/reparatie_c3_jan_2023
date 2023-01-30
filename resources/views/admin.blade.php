<?php use App\Models\User; ?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administrator') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-center">
                        <h1 style="font-size: 2rem">Alle Teams</h1>
                    </div>
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
                                <?php $user = User::findOrFail($team->creator_id); ?>
                                <td>{{$user->name}}</td>
                                <td>
                                    <a href="" style="display:none;" class="btn btn-primary">Bewerken</a>
                                    <a href="{{route('administrator.delete', $team->id)}}" class="btn btn-danger">Verwijderen</a>
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
