<html>
    <head>
        <script>
            const BASE_URL = "<?php echo e(url('/')); ?>/";
            const collection_id = '<?php echo e($collection->id); ?>';
            const csrf_token = '<?php echo e(csrf_token()); ?>';
        </script>
        <script src="<?php echo e(url('js/collection.js')); ?>" defer></script>
        <link rel='stylesheet' href="<?php echo e(url('css/collection.css')); ?>">
    </head>
    <body>
        <nav>
            <a>Playlist <?php echo e($collection->name); ?></a>
            <ul id="links">
            <li><a href="<?php echo e(url('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(url('logout')); ?>">Logout</a></li>
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
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hw22/resources/views/collection.blade.php ENDPATH**/ ?>