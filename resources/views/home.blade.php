<html>
    <head>
        <script>
            const BASE_URL = "{{ url('/') }}/";
        </script>
        <script src="{{ url('js/home.js') }}" defer></script>
        <link rel='stylesheet' href="{{ url('css/home.css') }}">
    </head>
    <body>
        <nav>
        <a id="nome">Spotify-Home</a>
        <ul id="links">
            <li><a>Benvenuto, {{ $username }}</a></li>
            <li><a href="{{ url('logout') }}">Logout</a></li>
        </ul>
        </nav>
        <div id="testo">Benvenuto in spotify, qui potrai creare nuove playlist e aggiungere la musica che ti piace!</div>
        <section id="colore">
            <div class='separated'>Le tue playlist</div>
            <div id='collections'></div>
            <div id='add-collection-div'>
                Aggiungi nuova playlist<input id='add-collection-name'> <button id='add-collection-btn'>Ok</button>
            </div>
        </section>
    </body>
</html>