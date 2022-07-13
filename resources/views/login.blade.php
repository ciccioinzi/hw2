<html>
    <head>
        <link rel='stylesheet' href="{{ url('css/common.css') }}">
    </head>
    <body>
            <main>
                <form method='post'>
                    @csrf
                    @if($error == 'empty_fields')
                    <section class='error'>Compilare tutti i campi.</section>
                    @elseif($error == 'wrong')
                    <section class='error'>Credenziali non valide.</section>
                    @endif
                <label class='colore'>Username</label>
                <label><input name='username' id='username' value='{{ old("username") }}'></label>
                <label class='colore'>Password</label>
                <label><input type='password' name='password' id='password'></label>
                <label>&nbsp; <input type='submit' value='Accedi' id="submit"></label>
                <a>Non hai un account?</a> <a href="{{ url('register') }}">Iscriviti</a>
            </form>
        </main>
    </body>
</html>