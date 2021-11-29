<main>
    <br><br>
    <div class="registration">
        <h2>Rejestracja:</h2>
        <form METHOD="POST">
            <input type="email" name="mail" placeholder="Adres e-mail:" class="login" required>
            <input type="text" name="login" placeholder="Login:" class="login" required>
            <input type="password" name="password" placeholder="Hasło:" class="login" required>
            <input type="password" name="password2" placeholder="Powtórz hasło:" class="login" required>
            <input type="submit" name="submit" class="buttons">
        </form>
        <?php 
            if($isAdded == true) 
                echo $errorText;
        ?>
        <br><br><br><br>
        <h2>Logowanie:</h2>
        <form METHOD="POST">
            <input type="text" name="loglogin" placeholder="Login:" class="login" required>
            <input type="password" name="logpassword" placeholder="Hasło:" class="login" required>
            <input type="submit" name="logsubmit" class="buttons">
        </form>
        <?php 
            if($checkIf == true) 
                echo $error;
        ?>
    </div>
    <img class="big-circle" src="static/images/big-eclipse.svg" alt=""/>
</main> 