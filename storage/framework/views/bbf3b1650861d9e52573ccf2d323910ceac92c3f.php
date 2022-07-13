<html>
    <head>
        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>/";
        </script>
        <script src="<?php echo e(url('js/home.js')); ?>" defer></script>
        <link rel='stylesheet' href="<?php echo e(url('css/home.css')); ?>">
    </head>
    <body>
        <nav>
        <a id="nome">Spotify-Home</a>
        <ul id="links">
            <li><a>Benvenuto, <?php echo e($username); ?></a></li>
            <li><a href="<?php echo e(url('logout')); ?>">Logout</a></li>
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
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hw22/resources/views/home.blade.php ENDPATH**/ ?>