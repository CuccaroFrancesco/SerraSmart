<head>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/root.css">
    <title>Login - SerraSmart</title>
    <link rel="icon" href="../img/favicon.png">
    <script src="https://kit.fontawesome.com/5dde4e6992.js" crossorigin="anonymous"></script>
</head>
<?php
include('../app/config.php');
include('funzioniLogin.php');

if (controllaLogin()) 
{
    header('location:../index.php');
}

if (isset($_POST['invia'])) 
{
    unset($_POST['invia']);
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    $sql = "SELECT * FROM tabUtenti WHERE username='$user'";
    $risultato = $connessione->query($sql);

    if ($risultato->num_rows > 0) 
    {
        $riga = $risultato->fetch_assoc();
        $hashed_password = $riga['pass'];
        if (password_verify($pass, $hashed_password)) 
        {
            session_start();
            include('classeUtente.php');
            $_SESSION['utente'] = new Utente($riga['nome'], $riga['cognome'], $riga['username'], $riga['ruolo'], $riga['idUtente']);
            header('location:../index.php');
        } 
        else 
        {
            echo ""
            ?>
            <div class="container-login">
                <div class="sfondo-login">
                    <div class="hero-login">
                        <h3>Login</h3>
                        <p class='testo-login'>Effettua ora il login per poter controllare la serra 3.0</p>
                    </div>
                </div>
                <div class="box-login">
                    <form action="" method="post">
                        <h2>Login</h2>
                        <div class="errore-span">Username o password errata</div>
                        <div class="box-input">
                            <p><i class="fa-solid fa-user"></i> <span>Username</span></p>
                            <input type="text" name="username" autocomplete='off' placeholder='Username' required><br>
                        </div>
                        <div class="box-input">
                            <p><i class="fa-solid fa-key"></i> <span>Password</span></p>
                            <input type="password" id='inputPass' name="password" placeholder='Password' required><br>
                            <div class="icon-pass" onclick=mostraPass()>
                                <i class="fa-solid fa-eye" id='iconaPass'></i>
                            </div>
                        </div>
                        <input id='loginSubmit' type="submit" name='invia'>
                    </form>
                    <a href='../index.php' style='text-align: center; width: 100%; display: block;'>Torna alla home</a>
                </div>
            </div>
            <?php ;
        }
    } 
    else 
    {
        echo ""
        ?>
        <div class="container-login">
            <div class="sfondo-login">
                <div class="hero-login">
                    <h3>Login</h3>
                    <p class='testo-login'>Effettua ora il login per poter controllare la serra 3.0</p>
                </div>
            </div>
            <div class="box-login">
                <form action="" method="post">
                    <h2>Login</h2>
                    <div class="errore-span">Username o password errata</div>
                    <div class="box-input">
                        <p><i class="fa-solid fa-user"></i> <span>Username</span></p>
                        <input type="text" name="username" autocomplete='off' placeholder='Username' required><br>
                    </div>
                    <div class="box-input">
                        <p><i class="fa-solid fa-key"></i> <span>Password</span></p>
                        <input type="password" id='inputPass' name="password" placeholder='Password' required><br>
                        <div class="icon-pass" onclick=mostraPass()>
                            <i class="fa-solid fa-eye" id='iconaPass'></i>
                        </div>
                    </div>
                    <input id='loginSubmit' type="submit" name='invia'>
                </form>
                <a href='../index.php' style='text-align: center; width: 100%; display: block;'>Torna alla home</a>
            </div>
        </div>
        <?php ;
    }
} 
else 
{
    echo ""
    ?>
    <div class="container-login">
        <div class="sfondo-login">
            <div class="hero-login">
                <h3>Login</h3>
                <p class='testo-login'>Effettua ora il login per poter controllare la serra 3.0</p>
            </div>
        </div>
        <div class="box-login">
            <form action="" method="post">
                <h2>Login</h2>
                <div class="box-input">
                    <p><i class="fa-solid fa-user"></i> <span>Username</span></p>
                    <input type="text" name="username" autocomplete='off' placeholder='Username' required><br>
                </div>
                <div class="box-input">
                    <p><i class="fa-solid fa-key"></i> <span>Password</span></p>
                    <input type="password" id='inputPass' name="password" placeholder='Password' required><br>
                    <div class="icon-pass" onclick=mostraPass()>
                        <i class="fa-solid fa-eye" id='iconaPass'></i>
                    </div>
                </div>
                <input id='loginSubmit' type="submit" name='invia'>
            </form>
            <a href='../index.php' style='text-align: center; width: 100%; display: block;'>Torna alla home</a>
        </div>
    </div>
    <?php ;
}
?>
