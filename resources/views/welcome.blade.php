<head>
    @vite(['resources/css/style.css', 'resources/js/app.js'])

</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <main>
                    <div class="top-banner">
                        <div class="container">
                            <div class="upcomming">
                                <p>Eerst opkomende wedstrijd</p>
                                <p class="upcomming-match">
                                    @if (isset($matches))

                                        @foreach ($matches->slice(0,1) as $match)
                                        <span class="team-name">{{$match->team1->name}}</span>
                                        <span class="versus">vs</span>
                                        <span class="team-name">{{$match->team2->name}}</span></p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div><!--top-banner-->
                        {{--  --}}
                        <div class="container">
                            @if (isset($matches))
                            <h3 class="upcomming-heading">Opkomende wedstrijden</h3>
                            <div class="upcomming-boxes">
                                @foreach ($matches as $match)
                                <div class="upcomming-box">
                                    <p>
                                        <span>{{$match->team1->name}}</span>
                                        <span>VS</span>
                                        <span>{{$match->team2->name}}</span>
                                    </p>
                                    <p>start tijd: <span>{{$match->start_time}}</span></p>
                                </div><!--upcomming-box-->

                                @endforeach

                            </div>
                            @endif
                        </div><!--upcomming-boxes container-->
                        <div class="container">
                            <h3 class="previous-game-header">Top 5 teams</h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Team naam</th>
                                        <th scope="col">Punten</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($matches))
                                        @foreach ($teams->sortByDesc('points')->slice(0, 5) as $key=>$team)
                                        <tr>
                                            <th scope="row">{{++$key}}</th>
                                            <td>{{$team->name}}</td>
                                            <td>{{$team->points}}</td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </main>
                    <footer>
                        <div class="footer-container">
                            <div class="about-us-footer">
                                <h4>Over ons</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima error, amet nulla hic dolores ipsam!</p>
                            </div>
                            <div class="footer-contact">
                                <h4>Contact</h4>
                                <div class="contact-item">
                                    <p>Mail:</p>
                                    <p>school@voetbal.com</p>
                                </div>
                                <div class="contact-item">
                                    <p>Phone:</p>
                                    <p>(123) 1233 21</p>
                                </div>

                            </div>
                            <div class="footer-socials">
                                <h4>Socials</h4>
                                <ul>
                                    <li><a href="https://nl-nl.facebook.com/">Facebook</a></li>
                                    <li><a href="https://www.instagram.com/">Instagram</a></li>
                                </ul>
                            </div>
                        </div>
                    </footer>

                </footer>


                <!-- JavaScript Bundle with Popper -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


            </div>
        </div>
    </div>
</x-app-layout>
