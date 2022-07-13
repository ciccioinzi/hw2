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
                @elseif($error == 'bad_passwords')
                <section class='error'>Le password non corrispondono.</section>
                @elseif($error == 'existing')
                <section class='error'>Nome utente già esistente.</section>
                @endif
                <label class='colore'>Username</label> 
                <label><input name='username' id='username' value='{{ old("username") }}'></label>
                <label class='colore'>Password</label> 
                <label><input type='password' name='password' id='password' value='{{ old("password") }}'></label>
                <label class='colore'>Conferma password</label> 
                <label><input type='password' name='conferma' id='conferma' value='{{ old("conferma") }}'></label>
                <label>&nbsp; <input type='submit' value='Registrati' id="submit"></label>
                <a>Hai già un account?</a> <a href="{{ url('login') }}">Accedi</a>
            </form>
        </main>
    </body>
</html>