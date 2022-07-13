<html>
    <head>
        <link rel='stylesheet' href="<?php echo e(url('css/common.css')); ?>">
    </head>
    <body>
            <main>
                <form method='post'>
                    <?php echo csrf_field(); ?>
                    <?php if($error == 'empty_fields'): ?>
                    <section class='error'>Compilare tutti i campi.</section>
                    <?php elseif($error == 'wrong'): ?>
                    <section class='error'>Credenziali non valide.</section>
                    <?php endif; ?>
                <label class='colore'>Username</label>
                <label><input name='username' id='username' value='<?php echo e(old("username")); ?>'></label>
                <label class='colore'>Password</label>
                <label><input type='password' name='password' id='password'></label>
                <label>&nbsp; <input type='submit' value='Accedi' id="submit"></label>
                <a>Non hai un account?</a> <a href="<?php echo e(url('register')); ?>">Iscriviti</a>
            </form>
        </main>
    </body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hw22/resources/views/login.blade.php ENDPATH**/ ?>