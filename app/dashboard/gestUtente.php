<?php
class gestUtenti
{
    // Funzione per poter visualizzare tutti gli utenti

    public function visUtenti()
    {
        include('app/config.php');
        $sql="SELECT * FROM tabUtenti ORDER BY ruolo ASC";
        $tabella=mysqli_query($connessione,$sql);
        ?>
        <div class="container-utenti">
            <div class="container-registro">
                <div class="titolo-registro">Registro utenti</div>
                <div class='registro'>
                    <div class='intestazioni'>
                        <div class='riga'>
                            <div class=th>ID</div>
                            <div class=th>Username</div>
                            <div class=th>Nome</div>
                            <div class=th>Cognome</div>
                            <div class=th>Ruolo</div>
                            <div class=th>Modifica</div>
                            <div class=th>Cancella</div>
                        </div>
                    </div>
        <?php
        $id=1;
        echo "<div class='corpo'>";
        while($riga = mysqli_fetch_array($tabella))
        {
            echo "<div class='riga'>
                        <div class=td>$id</div>
                        <div class=td>".$riga['username']."</div>
                        <div class=td>".$riga['nome']."</div>
                        <div class=td>".$riga['cognome']."</div>
                        <div class=td>".$riga['ruolo']."</div>
                        <div class=td><a href='?id=5&utente=".$riga['idUtente']."' id='tasto-mod'><i class='fa-solid fa-user-pen'></i></a></div>";
                        if($riga['username']==$_SESSION['utente']->getUsername())
                        {
                            echo "<div class=td><a id='tasto-canc-no' onclick='nonPuoi()'><i class='fa-solid fa-user-slash'></i></a></div>";
                        }
                        else
                        {
                            echo "<div class=td><a href='?id=6&utente=".$riga['idUtente']."' id='tasto-canc' onclick='return conferma()'><i class='fa-solid fa-user-slash'></i></a></div>";
                        }
                    echo "</div>";
                    $id++;
        }
        echo "</div></div></div></div>";
    }

    // Funzione per inserire un nuovo utente

    public function insUtente()
    {
        ?>
        <div class="container-utenti">
            <div class="container-registro">
                <div class="titolo-inserimento">Inserimento utenti</div>
                <form action="" method="post">
                    <div class="form">
                        <div class="campo">
                            <label for="username">Username</label>
                            <input type="text" name="username" autocomplete='off' id="username" placeholder="L'username del nuovo utente" required>
                        </div>
                        <div class="campo">
                            <label for="password">Password</label>
                            <input type="text" name="password" id="password" autocomplete='off' placeholder="La password del nuovo utente" required>
                        </div>
                        <div class="campo">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" autocomplete='off' placeholder="Il nome del nuovo utente" required>
                        </div>
                        <div class="campo">
                            <label for="cognome">Cognome</label>
                            <input type="text" name="cognome" id="cognome" autocomplete='off' placeholder="Il cognome del nuovo utente" required>
                        </div>
                        <div class="campo">
                            <label for="ruolo">Ruolo</label>
                            <select name="ruolo" id="ruolo" required>
                                <option class='option' value="utente" selected>Utente</option>
                                <option class='option' value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="campo">
                            <input type="submit" name="invia" value="Invia">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['invia']))
        {
            include('app/config.php');
            $username = $_POST['username'];
            $password = $_POST['password'];
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $ruolo = $_POST['ruolo'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO tabUtenti (nome, cognome, username, pass, ruolo) VALUES ('$nome', '$cognome', '$username', '$password', '$ruolo')";
            mysqli_query($connessione, $sql);
            echo "<script>window.location.href = 'dashboard.php?id=2';</script>";
        }
    }

    // Funzione per poter cancellare un utente

    public function cancUtente($utente)
    {
        include('app/config.php');
        $sql = "DELETE FROM tabUtenti WHERE idUtente = $utente";
        mysqli_query($connessione, $sql);
        echo "<script>window.location.href = 'dashboard.php?id=2';</script>";
    }

    // Funzione per poter modificare un utente

    public function modUtente($utente)
    {
        include('app/config.php');
        $sql = "SELECT * FROM tabUtenti WHERE idUtente = $utente";
        $tabella = mysqli_query($connessione, $sql);
        $riga = mysqli_fetch_array($tabella);
        ?>
        <div class="container-utenti">
            <div class="container-registro">
                <?php
                if($_SESSION['utente']->getUsername()!=$riga['username'])
                {
                    echo "<div class='titolo-inserimento'>Modifica utente</div>";
                }
                else
                {
                    echo "<div class='titolo-inserimento'>Modifica i tuoi dati</div>";
                }
                ?>
                <form action="" method="post">
                    <div class="form">
                        <div class="campo">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" autocomplete='off' value="<?php echo $riga['username']; ?>" required>
                        </div>
                        <div class="campo">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" autocomplete='off' value="<?php echo $riga['nome']; ?>" required>
                        </div>
                        <div class="campo">
                            <label for="cognome">Cognome</label>
                            <input type="text" name="cognome" id="cognome" autocomplete='off' value="<?php echo $riga['cognome']; ?>" required>
                        </div>
                        <?php
                        if($_SESSION['utente']->getUsername()!=$riga['username'])
                        {
                            echo "<div class='campo'>
                                    <label for='ruolo'>Ruolo</label>
                                    <select name='ruolo' id='ruolo' required>
                                        <option value='utente' "; if($riga['ruolo'] == 'utente') echo 'selected'; echo ">Utente</option>
                                        <option value='admin' "; if($riga['ruolo'] == 'admin') echo 'selected'; echo ">Admin</option>
                                    </select>
                                </div>";
                            $_POST['password']=$riga['pass'];
                        }
                        else
                        {
                            $_POST['ruolo']=$_SESSION['utente']->getRuolo();
                            echo "<div class='campo'>
                                    <label for='password'>Password</label>
                                    <input type='text' name='password' id='password' autocomplete='off' placeholder='Cambia o conferma la tua password' required>
                                </div>";
                        }
                        ?>
                        
                        <div class="campo">
                            <input type="submit" name="invia" value="Invia">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['invia']))
        {
            $username = $_POST['username'];
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $ruolo = $_POST['ruolo'];
            if($_SESSION['utente']->getUsername()==$riga['username'])
            {
                $_SESSION['utente']->setUsername($username);
                $_SESSION['utente']->setNome($nome);
                $_SESSION['utente']->setCognome($cognome);
                $_SESSION['utente']->setRuolo($ruolo);
            }
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE tabUtenti SET nome = '$nome', cognome = '$cognome', username = '$username', pass = '$password', ruolo = '$ruolo' WHERE idUtente = $utente";
            mysqli_query($connessione, $sql);
            echo "<script>window.location.href = 'dashboard.php?id=2';</script>";
        }
    }
}
?>