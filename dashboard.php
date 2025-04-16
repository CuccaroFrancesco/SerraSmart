<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SerraSmart</title>
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="icon" href="img/favicon.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/5dde4e6992.js" crossorigin="anonymous"></script>
    <script src="app/dashboard/dispositivi.js"></script>
    <script src="app/dashboard/dati.js"></script>
    <script src="app/funzioni.js"></script>
</head>
<body>
<?php
include('login/classeUtente.php');
session_start();
include('login/funzioniLogin.php');
include('app/dashboard/funzioniDash.php');
include('app/dashboard/config.php');
include('app/chatbot.php');
include('app/dashboard/gestUtente.php');
$utenti=new gestUtenti();
if(!controllaLogin())
{
    echo "<script>window.location.href = 'die.php';</script>";
}
?>
    <div class="sito-dash">
        <div class="sidebar">
            <div class="logo"><img src="img/logo.png"></div>
            <div class="menu">
                <li><a href="index.php"><i class="fa-solid fa-house"></i><span>Home</span></a></li>
                <li><a href="?id=0"><i class="fa-solid fa-chart-simple"></i><span>Dati</span></a></li>
                <li><a href="?id=1"><i class="fa-solid fa-sliders"></i><span>Controlli</span></a></li>
                <?php
                    if(controllaRuolo('admin'))
                    {
                        ?>
                            <li id='utenti' onclick='opzioniUtente()'><i class="fa-solid fa-user"></i><span>Utenti<i class="fa-solid fa-chevron-down" id='icona-utenti'></i></span></li>
                            <li class='nascosto' id='nascosto'>
                                <a href="?id=2"><i class="fa-solid fa-users"></i><span>Visualizza Utenti</span></a>
                                <a href="?id=3"><i class="fa-solid fa-user-plus"></i><span>Inserisci Utente</span></a>
                            </li>
                            <li><a href="?id=4"><i class="fa-solid fa-gear"></i><span>Impostazioni</span></a></li>
                        <?php
                    }
                ?>
            </div>
            <div class="servizi">
                <div class="cambio-tema" onclick='cambiaTema()'><i class="fa-solid fa-moon" id='icona-tema'></i><span id='span-tema'>Passa al tema scuro</span></div>
                <div class="logout">
                    <a href='login/logout.php'>
                        <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="dashboard">
            <div class="nav">
                <div class="dash-title">Dashboard <?php if(controllaRuolo('admin')) echo "Amministratore"; else echo "Utente"; ?></div>
                <div class="utente">
                    <div class="dati-utente">
                        <div class="nome"> <?php echo $_SESSION['utente']->getNome()." ".$_SESSION['utente']->getCognome(); ?> </div>
                        <div class="ruolo"> <?php echo $_SESSION['utente']->getRuolo(); ?></div>
                    </div>
                    <?php
                    if(controllaRuolo('admin'))
                        echo "<a href='?id=5&utente=".$_SESSION['utente']->getID()."' id='icona-utente'><div class='utente-icona'><i class='fa-solid fa-user'></i></div></a>";
                    else
                        echo "<a id='icona-utente'><div class='utente-icona'><i class='fa-solid fa-user'></i></div></a>";
                    ?>
                </div>
            </div>
                <?php
                $id=$_GET['id'];
                switch($id)
                {
                    case 0:
                        ?>
                        <script>
                            cambiaSfondo(1);
                        </script>
                        <?php
                        chatbot();
                        visDati();
                        break;
                    case 1:
                        ?>
                        <script>
                            cambiaSfondo(2);
                        </script>
                        <?php
                        controlli();
                        chatbot();
                        break;
                    case 2:
                        ?>
                        <script>
                            cambiaSfondo(3);
                        </script>
                        <?php
                        chatbot();
                        if (controllaRuolo('admin'))
                            $utenti->visUtenti();
                        else
                            echo "<script>window.location.href = 'die.php';</script>";
                        break;
                    case 3:
                        ?>
                        <script>
                            cambiaSfondo(3);
                        </script>
                        <?php
                        if (controllaRuolo('admin'))
                            $utenti->insUtente();
                        else
                            echo "<script>window.location.href = 'die.php';</script>";
                        break;
                    case 4:
                        ?>
                        <script>
                            cambiaSfondo(5);
                        </script>
                        <?php
                        chatbot();
                        if (controllaRuolo('admin'))
                            impostazioni();
                        else
                            echo "<script>window.location.href = 'die.php';</script>";
                        break;
                    case 5:
                        ?>
                        <script>
                            cambiaSfondo(3);
                        </script>
                        <?php
                        $utente = $_GET['utente'];
                        if (controllaRuolo('admin'))
                            $utenti->modUtente($utente);
                        else
                            echo "<script>window.location.href = 'die.php';</script>";
                        break;
                    case 6:
                        $utente = $_GET['utente'];
                        if (controllaRuolo('admin'))
                            $utenti->cancUtente($utente);
                        else
                            echo "<script>window.location.href = 'die.php';</script>";
                        break;
                }
                ?>
        </div>
    </div>
    <script>
        // Controlla se il tema è scuro o chiaro
        
        controllaTema();
        $(document).ready(function() 
        {
            controllaDispositivi();
            setInterval(controllaDispositivi,200);
        });
        

        // Funzione per controllare i dispositivi al caricamento della pagina
    </script>
</body>
</html>