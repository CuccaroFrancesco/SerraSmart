
// Funzione per controllare i dispositivi ad ogni click

function controllaDispositivi()
{
    $.ajax({
        url: 'arduino/output.json',
        dataType: 'json',
        success: function(data) {
            localStorage.setItem('millisecondi', data.millisecondi);
    
            // Funzione per aggiornare lo stato e l'aspetto di un dispositivo
            function updateStato(deviceName, valore, $idStato, $bottone) 
            {
                $idStato.text(valore === 1 ? 'Accesa' : 'Spenta');
                $bottone.toggleClass('active', valore === 1);
            }
    
            // Aggiorna lo stato e l'aspetto di ogni dispositivo
            updateStato('ventola', data.ventola, $('#stato-ventola'), $('#btn-ventola'));
            updateStato('luce', data.luce, $('#stato-luce'), $('#btn-luce'));
            updateStato('idranti', data.idranti, $('#stato-idranti'), $('#btn-idranti'));
        }
    });
    
}

function updateDispositivo(dispositivo)
{
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'arduino/controlli.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('dispositivo=' + dispositivo);
}

function esegui(dispositivo)
{
    updateDispositivo(dispositivo);
}