<?php

// Funzione per creare la pagina di visualizzazione dei dati 

function visDati()
{
    
    ?>
        <div class="container-dati">
            <div class="mini-list">
                <div class="dato">
                    <div class="destra">
                        <div class="valore-ideale" id='ideale-temp'></div>
                        <div class="variazione" id='v-temp'></div>
                    </div>
                    <div class="sinistra">
                        <div class="icon"><i class="fa-solid fa-temperature-three-quarters"></i></div>
                        <div class="info" id='temp'></div>
                        <label>Temperatura</label>
                    </div>
                </div>
                <div class="dato">
                    <div class="destra">
                        <div class="valore-ideale" id='ideale-umid'></div>
                        <div class="variazione" id='v-aria'></div>
                    </div>
                    <div class="sinistra">
                        <div class="icon"><i class="fa-solid fa-wind"></i></div>
                        <div class="info" id='aria'></div>
                        <label>Umidità aria</label>
                    </div>
                </div>
                <div class="dato">
                    <div class="destra">
                        <div class="valore-ideale" id='ideale-terra'></div>
                        <div class="variazione" id='v-terra'></div>
                    </div>
                    <div class="sinistra">
                        <div class="icon"><i class="fa-solid fa-seedling"></i></div>
                        <div class="info" id='terra'></div>
                        <label>Umidità terreno</label>
                    </div>
                </div>
                <div class="dato">
                    <div class="destra">
                        <div class="valore-ideale" id='ideale-acqua'></div>
                        <div class="variazione" id='v-acqua'></div>
                    </div>
                    <div class="sinistra">
                        <div class="icon"><i class="fa-solid fa-droplet"></i></div>
                        <div class="info" id='acqua'></div>
                        <label>Acqua serbatoio</label>
                    </div>
                </div>
            </div>
            <div class="storico">
                <div class="titolo">Storico Dati</div>
                <div class='table'>
                    <div class="intestazioni">
                        <div class='riga'>
                            <div class='th'>ID</div>
                            <div class='th'>Orario</div>
                            <div class='th'>Temperatura</div>
                            <div class='th'>Umidità</div>
                            <div class='th'>Terreno</div>
                            <div class='th'>Serbatoio</div>
                        </div>
                    </div>
                    <div class="corpo">
                        <div class="riga"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php
}

// Funzione per creare la pagina dei controlli per i dispositivi 

function controlli()
{
    ?>
    <div class="controlli">
        <h1>Controlla la tua <span>serra!</span></h1>
        <p>Utilizza i tasti qui sotto per gestire tutta la tua serra.</p>

    </div>
    <div class="container-controlli">
        <div class="dispositivo" id='btn-ventola' onclick='esegui("ventola")'>
            <div class="icona"><i class="fa-solid fa-fan"></i></div>
            <div class="nome">Ventola</div>
            <div id="stato-ventola" class='stato'></div>
        </div>
        <div class="dispositivo" id='btn-luce' onclick='esegui("luce")'>
            <div class="icona"><i class="fa-solid fa-lightbulb"></i></div>
            <div class="nome">Luce</div>
            <div id="stato-luce" class='stato'></div>
        </div>
        <div class="dispositivo" id='btn-idranti' onclick='esegui("idranti")'>
            <div class="icona"><i class="fa-solid fa-droplet"></i></div>
            <div class="nome">Idranti</div>
            <div id="stato-idranti" class='stato'></div>
        </div>
    </div>
    <?php
}

// Funzione per creare il chatbot in basso a destra

function chatbot()
{
    ?>
    <div class="chatbot">
        <div class="bottone" id='btn' onclick="attivaBot()">
            <i class="fa-solid fa-comments" id='btn-chat'></i>
        </div>
        <div class="wrapper" id="wrapper">
            <div class="title">Serra AI</div>
            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icona-chatbot">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <div class="msg-header">
                        <p>Ciao <?php if(isset($_SESSION['utente'])) echo $_SESSION['utente']->getNome(); ?>, sono Serra AI, come posso aiutarti?</p>
                    </div>
                </div>
            </div>
            <div class="typing-field">
                <div class="input-data">
                    <form id="chatForm" action="" method="post" onsubmit="chatbot()">
                        <input id="data" type="text" name='data' autocomplete="off" placeholder="Scrivi qualcosa..." required>
                        <input id="send-btn" type='submit' name='invia' value='Invia'>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
}

// Funzione per creare la pagina delle impostazioni
function impostazioni()
{
    ?>
    <div class="container-impostazioni">
        <div class="titolo-impostazioni">Impostazioni</div>
        <div class="gruppo-impostazioni">
            <div class="elemento-impostazioni">
                <div class="image">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>
                <div class="descrizion">
                    <div class="titolo-sezione">Frequenza di aggiornamento:</div>
                    <p>Modifica la frequenza con la quale i dati vengono aggiornati </p>
                    <form action="" method='POST' >
                        <input type="number" name="minuti" id="minuti" value="1" required> m
                        <input type="number" name="secondi" id="secondi" value="0" required> s
                    </form>
                </div>
            </div>
            <div class="elemento-impostazioni">
                <div class="image">
                    <i class="fa-solid fa-temperature-three-quarters"></i>
                </div>
                <div class="descrizion">
                    <div class="titolo-sezione">Temperatura ideale:</div>
                    <p>Modifica la temperatura ideale all'interno della serra</p>
                    <form action="" method='POST'>
                        <input type='number' name='temperaturaIdeale' id='temperaturaIdeale' placeholder='Temperatura ideale' required> °C
                    </form>
                </div>
            </div>
            <div class="elemento-impostazioni">
                <div class="image">
                    <i class="fa-solid fa-wind"></i>
                </div>
                <div class="descrizion">
                    <div class="titolo-sezione">Umidità ambiente ideale:</div>
                    <p>Modifica l'umidità ideale all'interno della serra</p>
                    <form action="" method='POST'>
                        <input type='number' name='umiditaIdeale' id='umiditaIdeale' placeholder='Umidità ideale' required> %
                    </form>
                </div>
            </div>
            <div class="elemento-impostazioni">
                <div class="image">
                    <i class="fa-solid fa-seedling"></i>
                </div>
                <div class="descrizion">
                    <div class="titolo-sezione">Umidità terreno ideale:</div>
                    <p>Modifica l'umidità ideale del terreno</p>
                    <form action="" method='POST'>
                    <input type='number' name='terraIdeale' id='terraIdeale' placeholder='Umidità terra ideale' required> %
                    </form>
                </div>
            </div>
        </div>
        
        <button onclick="cambiaImpostazioni()"><i class="fa-solid fa-arrows-rotate"></i> Aggiorna</button>
    </div>
    <script>
        document.addEventListener('keydown',function(event)
        {
            if(event.key=='Enter')
                cambiaImpostazioni();
        });

        function controllaIdeali()
        {
            $.ajax({
                url: 'arduino/output.json',
                dateType: 'json',
                success: function(data) 
                {
                    millisecondi = data.millisecondi;
                    document.getElementById('minuti').value = Math.floor(millisecondi / 60000);
                    document.getElementById('secondi').value = Math.floor((millisecondi % 60000) / 1000);
                    document.getElementById('temperaturaIdeale').value = data.temperaturaIdeale;
                    document.getElementById('terraIdeale').value = data.terraIdeale;
                    document.getElementById('umiditaIdeale').value = data.umiditaIdeale;
                }
            });
        }
        controllaIdeali();
        

        function cambiaImpostazioni()
        {
            var minuti = parseInt(document.getElementById('minuti').value);
            var secondi = parseInt(document.getElementById('secondi').value);
            var millisecondi = (minuti * 60 + secondi) * 1000;
            var temperatura = document.getElementById('temperaturaIdeale').value;
            var umidita = document.getElementById('umiditaIdeale').value;
            var terra = document.getElementById('terraIdeale').value;
            try
            {
                if(millisecondi < 10000)
                {
                    throw new Error('La frequenza di aggiornamento deve essere minimo di 10 secondi');
                }
                if(temperatura < 0 || temperatura > 40)
                {
                    throw new Error('La temperatura ideale deve essere compresa tra 0 e 40 gradi');
                }
                if(umidita < 0 || umidita > 100)
                {
                    throw new Error("L'umidità ideale deve essere compresa tra 0 e 100 %");
                }
                if(terra < 0 || terra > 100)
                {
                    throw new Error("L'umidità del terreno ideale deve essere compresa tra 0 e 100 %");
                }
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'arduino/impostazioni.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    xhr.send('umiditaIdeale=' + encodeURIComponent(umidita) + '&temperaturaIdeale=' + encodeURIComponent(temperatura) + '&terraIdeale=' + encodeURIComponent(terra) + '&millisecondi=' + encodeURIComponent(millisecondi));
                    alert('Impostazioni cambiate con successo');
                    setTimeout(controllaIdeali,1000);
            } 
            catch (error)
            {
               alert(error.message);
               controllaIdeali();
            }
        }


    </script>

    <?php
}
?>