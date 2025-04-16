<script>
  function chatbot() 
    { 
        document.getElementById('send-btn').disabled=true;
        event.preventDefault();
        const formData = new FormData(event.target);
        const prompt = formData.get('data');    

        fetch('arduino/datiSerra.php')
            .then(response => response.json())
            .then(dataFromDatabase => {
                const temp = dataFromDatabase.temp;
                const umidita = dataFromDatabase.umidita;
                const orario = dataFromDatabase.data;
                const terra = dataFromDatabase.terra;
                const acqua = dataFromDatabase.acqua;
                const temperaturaIdeale = dataFromDatabase.temperaturaIdeale;
                const terraIdeale = dataFromDatabase.terraIdeale;
                const umiditaIdeale = dataFromDatabase.umiditaIdeale;
                const ventola = dataFromDatabase.ventola;
                const ventolaStato = ventola === 1 ? 'accesa' : 'spenta';
                const luce = dataFromDatabase.luce;
                const luceStato = luce === 1 ? 'accese' : 'spente';
                const idranti = dataFromDatabase.idranti;
                const idrantiStato = idranti === 1 ? 'accesi' : 'spenti';
                explode = orario.split(" ");
                giorno = explode[0];
                day = giorno.split("-");
                giorno = day[2] + "/" + day[1] + "/" + day[0];
                ora = explode[1];
                
                document.querySelector('.form').innerHTML += `
                    <div class='user-inbox inbox'>
                        <div class='msg-header'>
                            <p>${prompt}</p>
                        </div>
                    </div>`;
                document.getElementById('data').value = '';
                document.getElementById('data').disabled='true';
                document.getElementById('data').placeholder='In attesa di risposta...';
                document.querySelector('.form').innerHTML += `
                        <div class='bot-inbox inbox'>
                            <div class='icona-chatbot'>
                                <i class="fa-solid fa-robot"></i>
                            </div>
                            <div class='msg-header'>
                                <p id='risposta'><span><i class="fa-solid fa-ellipsis fa-beat"></i></span></p>
                            </div>
                        </div>`;
                document.querySelector('.form').scrollTop = document.querySelector('.form').scrollHeight;
                const data = {
                    messages: [
                        {
                            role: 'system',
                            content: 'Il tuo nome è SerraAI <?php if(isset($_SESSION['utente'])) echo "e io mi chiamo ".$_SESSION['utente']->getNome(); ?> sei un assistente per la mia serra. Se sei a conoscenza del mio nome, quando ti chiedo quale sia o come mi chiamo tu dovrai rispondere. Io sono il proprietario di questa serra.  Se ti ringrazio, sii felice dell essermi stato utile. Fai notare all utente quando le domande non sono inerenti alla coltivazione. I dati si riferiscono alla serra. '+
                                'La temperatura attuale equivale a: ' + temp + '°C. La umidità dell aria attuale equivale a: '+ umidita +' %. La umidità della terra attualmente equivale a: '+ terra +' %. L acqua nel serbatoio attualmente equivale a: '+ acqua +' %.  Questi dati sono aggiornati alle: '+ ora +' del giorno '+ giorno +'. Al momento le luci della serra sono '+ luceStato +'. Al momento gli idranti della serra sono '+ idrantiStato +'. Al momento la ventola della serra è '+ ventolaStato
                        },
                        {
                            role: 'user',
                            content: prompt 
                        },
                    ],
                    model: 'gpt-3.5-turbo',
                };
                fetch('https://openrouter.ai/api/v1/chat/completions ', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer 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',
                    },
                    body: JSON.stringify(data),
                })
                .then(response => response.json())
                .then(responseData => {
                    console.log(responseData);
                    const risposta = responseData.choices[0].message.content || 'Nessuna risposta disponibile';
                    var blocco = document.querySelectorAll('#risposta');
                    var ultimoElemento = blocco[blocco.length - 1];
                    ultimoElemento.innerHTML = risposta;
                    document.getElementById('data').placeholder='Scrivi qualcosa...';
                    document.getElementById('data').disabled=false;
                    document.getElementById('send-btn').disabled=false;
                    document.querySelector('.form').scrollTop = document.querySelector('.form').scrollHeight;
                })
                .catch(error => {
                    var blocco = document.querySelectorAll('#risposta');
                    var ultimoElemento = blocco[blocco.length - 1];
                    var risposta = "Mi dispiace, c'è stato un errore nella risposta."
                    ultimoElemento.innerHTML = risposta;
                    document.getElementById('data').placeholder='Scrivi qualcosa...';
                    document.getElementById('data').disabled=false;
                    document.getElementById('send-btn').disabled=false;
                    document.querySelector('.form').scrollTop = document.querySelector('.form').scrollHeight;
                });
            });
    }
</script>