<html>
    <head>
        <script>
            const BASE_URL = "{{ url('/') }}/";
            const collection_id = '{{ $collection->id }}';
            const csrf_token = '{{ csrf_token() }}';
        </script>
        <script src="{{ url('js/collection.js') }}" defer></script>
        <link rel='stylesheet' href="{{ url('css/collection.css') }}">
    </head>
    <body>
        <nav>
            <a>Playlist {{ $collection->name }}</a>
            <ul id="links">
            <li><a href="{{ url('home') }}">Home</a></li>
            <li><a href="{{ url('logout') }}">Logout</a></li>
            </ul>
        </nav>
        <section>
            <div id='songs'></div>
        </section>
        <section>
            <h3 id="nome">Cerca una canzone e premi per aggiungerla ai preferiti, premi sulla X per rimuoverla </h3>
            <div id='search'>
                Ricerca <input id='search-text'> <button id='search-btn'>Ok</button>
            </div>
            <div id='search_result'></div>
        </section>
    </body>
</html>