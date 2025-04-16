<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/die.css">
    <link rel="icon" href="img/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accesso Negato</title>
</head>
<body>
    <div class="die">
        <img src="img/die.png">
        <h3>Accesso Negato</h3>
        <p>Mi dispiace, ma non disponi dei permessi necessari per accedere a questa pagina.</p>
        <span id='countdown'>Tra 10s verrai reindirizzato all'homepage</span>
        <a href='../'>Torna alla Home</a>

        <script>
            let countdown = 10;
            
            function aggiornaConto() 
            {
                document.getElementById('countdown').textContent = `Tra ${countdown}s verrai reindirizzato all'homepage`;
            }


            aggiornaConto();
            function intervallo()
            {
                countdown--;
                aggiornaConto();
                if (countdown <= 0) 
                {
                    window.location.href = '../';
                }
            }
            setInterval(intervallo, 1000);
        </script>
    </div>
</body>
</html>