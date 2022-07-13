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
                <?php elseif($error == 'bad_passwords'): ?>
                <section class='error'>Le password non corrispondono.</section>
                <?php elseif($error == 'existing'): ?>
                <section class='error'>Nome utente già esistente.</section>
                <?php endif; ?>
                <label class='colore'>Username</label> 
                <label><input name='username' id='username' value='<?php echo e(old("username")); ?>'></label>
                <label class='colore'>Password</label> 
                <label><input type='password' name='password' id='password' value='<?php echo e(old("password")); ?>'></label>
                <label class='colore'>Conferma password</label> 
                <label><input type='password' name='conferma' id='conferma' value='<?php echo e(old("conferma")); ?>'></label>
                <label>&nbsp; <input type='submit' value='Registrati' id="submit"></label>
                <a>Hai già un account?</a> <a href="<?php echo e(url('login')); ?>">Accedi</a>
            </form>
        </main>
    </body>
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hw22/resources/views/register.blade.php ENDPATH**/ ?>