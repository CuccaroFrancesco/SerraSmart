<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/doc.css">
    <title>Home - SerraSmart</title>
    <link rel="icon" href="img/favicon.png">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://kit.fontawesome.com/5dde4e6992.js" crossorigin="anonymous"></script>
    <script src="app/funzioni.js"></script>
</head>
<body>
<?php
include('login/classeUtente.php');
include('login/funzioniLogin.php');
session_start();
include('app/chatbot.php');
?>
    <div class="sito" id="inizio">
            <div class="navbar">
                <!-- Navbar Utente / Admin -->
                <nav id='nav' class='active'>
                    <div class='logo'><a href='index.php'><img src="img/logo.png"></a></div>
                    <div class='menu'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='index.php#dettagli'>Dettagli</a></li>
                        <?php 
                            if(controllaLogin())
                                echo "<li><a href='dashboard.php'>Dashboard</a></li>";
                        ?>
                        <li><a href='#inizio'>Documentazione</a></li>
                        <li ><a onclick='cambiaStile()' style="cursor: pointer;"><i class="fa-solid fa-moon" id='icona-tema'></i></a></li>
                        <li>
                            <a href='login/logout.php'>
                                <?php 
                                if(controllaLogin())
                                    echo "<i class='fa-solid fa-right-from-bracket'></i>";
                                    else 
                                    echo "<i class='fa-solid fa-right-to-bracket'></i>"; 
                                ?>
                            </a>
                        </li>
                    </div>
                </nav>
            </div>
            <div class="documentazione">
                <div class="sidebar">
                    <div class="container-sidebar">
                        <div class="lista-elementi">
                            <ul>
                                <li><span class="section-title"><a href="#inizio">INTRODUZIONE</a></span></li>
                            </ul>
                            <ul>
                                <li><span class="section-title"><a href="#struttura-tecnica">STRUTTURA TECNICA</a></span></li>
                                <li><a class="section-link" href="#front-end">Front-end</a></li>
                                <li><a class="section-link" href="#back-end">Back-end</a></li>
                                <li><a class="section-link" href="#data-access">Data Access Layer</a></li>
                                <li><a class="section-link" href="#arduino">Arduino</a></li>
                                <li><a class="section-link" href="#esp32">ESP32</a></li>
                            </ul>
                            <ul>
                                <li><span class="section-title"><a href="#sensori-utilizzati">SENSORI UTILIZZATI</a></span></li>
                                <li><a class="section-link" href="#sensore-temp">Sensore temperatura e umidità</a></li>
                                <li><a class="section-link" href="#sensore-umid">Sensore umidità terreno</a></li>
                                <li><a class="section-link" href="#sensore-acqua">Sensore livello acqua</a></li>
                            </ul>
                            <ul>
                                <li><span class="section-title"><a href="#dashboard">DASHBOARD</a></span></li>
                                <li><a class="section-link" href="#valori-attuali-e-ideali">Valori attuali e ideali</a></li>
                                <li><a class="section-link" href="#storico-dati">Storico Dati</a></li>
                                <li><a class="section-link" href="#frequenza-di-aggiornamento">Frequenza di Aggiornamento</a></li>
                                <li><a class="section-link" href="#valori-ideali">Valori ideali</a></li>
                                <li><a class="section-link" href="#gestione-utenti">Gestione Utenti</a></li>
                            </ul>
                            <ul>
                                <li><span class="section-title"><a href="#strumenti-di-sviluppo">STRUMENTI DI SVILUPPO</a></span></li>
                                <li><a class="section-link" href="#programmi">Perché questi programmi</a></li>
                                <li><a class="section-link" href="#come">Come funzionano</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container-doc">
                <article id="inizio">
                    <div class="titolo-doc">
                        <span>Documentazione</span>
                        <p>Introduzione</p>
                    </div>
                    <div class="descrizione-doc">
                        <div class="elemento-doc">
                            <h1>Cos'è <span>Serra</span><span>Smart?</span></h1>
                            <p>SerraSmart è un progetto innovativo che combina tecnologie avanzate di monitoraggio e controllo per ottimizzare la gestione delle coltivazioni all'interno di una serra. L'obiettivo principale è quello di creare un ambiente ideale per le piante, migliorando l'efficienza e la produttività attraverso l'uso di sensori, microcontrollori e una piattaforma web interattiva. <br>Utilizzando Arduino come unità centrale di controllo, il sistema raccoglie dati in tempo reale su temperatura, umidità e livelli d'acqua, inviandoli a un server tramite la scheda ESP32. Questi dati vengono poi visualizzati e gestiti attraverso una dashboard web, permettendo agli utenti di monitorare e controllare la serra da remoto.</p>
                        </div>
                        <div class="elemento-doc">
                            <h1>Tecnologie usate</h1>
                            <p>SerraSmart utilizza una combinazione di tecnologie hardware e software per fornire un controllo completo e personalizzato della serra. Arduino funge da cervello del sistema, gestendo i sensori e i dispositivi di controllo. La scheda ESP32 funge da modulo di rete, inviando i dati raccolti al server tramite richieste POST. <br>Il front-end della piattaforma web è sviluppato utilizzando HTML, CSS e JavaScript, con l'uso di Ajax e jQuery per aggiornamenti asincroni e interattivi. PHP gestisce il back-end, inclusi la gestione degli utenti, il database e l'elaborazione dei dati. La piattaforma è ospitata su Altervista e sviluppata con l'ausilio di Visual Studio Code e WinSCP.</p>
                        </div>
                    </div>
                </article>
                <article id="struttura-tecnica">
                    <div class="titolo-doc">
                        <p>Struttura tecnica</p>
                    </div>
                </article>
                <article id="front-end">
                    <div class="elemento-doc">
                        <h1>Front-end</h1>
                        <p>Il front-end del sito web è sviluppato utilizzando HTML, CSS e JavaScript. Prima di passare allo sviluppo della pagina web è stato effettuato un lungo processo di progettazione del design dell'interfaccia utente e dell'esperienza utente attraverso l'uso di programmi quali Figma e Photoshop. La dinamica della pagina è gestita attraverso l'uso di Ajax e jQuery, permettendo l'aggiornamento asincrono delle informazioni. Questo approccio consente di aggiornare i dati visualizzati dagli utenti senza dover ricaricare l'intera pagina, migliorando l'esperienza dell'utente. Ajax viene utilizzato per richiamare pagine in modo asincrono e ottenere dati in formato JSON. Questi dati vengono poi elaborati e utilizzati per aggiornare la pagina in tempo reale. Questo metodo è particolarmente utile per visualizzare i dati dei dispositivi, lo storico dei dati e le informazioni provenienti dall'intelligenza artificiale.</p>
                    </div>
                </article>
                <article id="back-end">
                    <div class="elemento-doc">
                        <h1>Back-end</h1>
                        <p>Il back-end del nostro sito è sviluppato in PHP e svolge un ruolo cruciale nella gestione dei dispositivi della serra domotica, come luci, ventole e idranti. Attraverso un'interfaccia intuitiva, gli utenti possono controllare ogni dispositivo tramite tasti dedicati. Questa struttura consente un'interazione fluida e immediata con i vari elementi della serra, facilitando l'automazione e il monitoraggio in tempo reale. Il back-end è progettato per garantire un alto livello di affidabilità e sicurezza, permettendo una gestione efficace dei comandi e delle operazioni quotidiane.</p>
                    </div>
                </article>
                <article id='data-access'>
                    <div class="elemento-doc">
                        <h1>Data Access Layer</h1>
                        <p>Il sistema accede a un database per eseguire operazioni sugli utenti, sui dispositivi e sui dati raccolti. Questi dati provengono da sensori collegati ad Arduino e sono trasferiti tramite JSON. Il Data Access Layer gestisce la comunicazione tra il back-end e il database, garantendo che i dati siano correttamente memorizzati, aggiornati e recuperati in modo efficiente. Una tabella degli utenti consente di amministrare i profili, assicurando una gestione sicura e strutturata delle informazioni. Questo strato di accesso ai dati è fondamentale per mantenere l'integrità e la coerenza dei dati, supportando le funzioni operative del sistema di gestione della serra.</p>
                    </div>
                </article>
                <article id="arduino">
                    <div class="elemento-doc">
                        <h1>Arduino</h1>
                        <p>L'Arduino assume un ruolo centrale nella funzionalità della nostra serra, fungendo da fulcro per il controllo e il monitoraggio delle operazioni all'interno dell'ambiente della serra. Utilizzando un linguaggio di programmazione simile al C++ e l'ambiente di sviluppo Arduino IDE, siamo stati in grado di implementare una vasta gamma di funzionalità. Queste includono il coordinamento delle attività di controllo, come l'emissione di impulsi e l'attivazione/disattivazione di dispositivi come le luci, la ventola e gli idranti per la gestione ambientale. Inoltre, Arduino svolge un ruolo fondamentale nella raccolta e nell'analisi dei dati provenienti dai sensori dislocati all'interno della serra, fornendo un ambiente ottimale per la crescita e la gestione delle piante.</p>
                    </div>
                </article>
                <article id="esp32">
                    <div class="elemento-doc">
                        <h1>ESP32</h1>
                        <p>L'ESP32 rappresenta un componente vitale per l'infrastruttura di comunicazione della nostra piattaforma. Essa è una scheda di rete che permette la scambio di dati tra la serra e il sito web. Questa scheda offre un'eccellente capacità di connettività wireless, consentendo una trasmissione affidabile e veloce dei dati raccolti dai sensori presenti nella serra. Utilizzando il metodo POST, l'ESP32 invia i dati acquisiti a una pagina PHP che poi li carica nel database. Inoltre grazie a delle richieste GET è capace di leggere informazioni da file JSON che contengono impostazioni e attivazione/disattivazione dei dispositivi. </p>
                    </div>
                </article>
                <article id="sensori-utilizzati">
                    <div class="titolo-doc">
                        <p>Sensori utilizzati</p>
                    </div>
                </article>
                <article id="sensore-temp">
                    <div class="elemento-doc">
                        <h1>Sensore della temperatura e dell'umidità</h1>
                        <p>Il primo sensore utilizzato nella nostra serra è un dispositivo versatile in grado di misurare sia la temperatura che l'umidità dell'aria. Questo sensore è cruciale per mantenere condizioni ambientali ottimali, essenziali per la crescita delle piante. La rilevazione accurata della temperatura consente di monitorare e regolare il clima interno, mentre la misurazione dell'umidità dell'aria aiuta a prevenire condizioni che potrebbero favorire la proliferazione di muffe o funghi. Integrato con Arduino, questo sensore fornisce dati in tempo reale che possono essere utilizzati per automatizzare i sistemi di ventilazione e umidificazione, garantendo così un ambiente stabile e controllato.</p>
                    </div>
                </article>
                <article id="sensore-umid">
                    <div class="elemento-doc">
                        <h1>Sensore dell'umidità del terreno</h1>
                        <p>Il secondo sensore è dedicato al monitoraggio dell'umidità del terreno, un parametro fondamentale per la salute delle piante. Questo sensore misura la quantità di umidità presente nel suolo, fornendo informazioni vitali per determinare quando è necessario irrigare. La sua integrazione con Arduino permette di automatizzare l'irrigazione, assicurando che le piante ricevano la quantità d'acqua ottimale senza eccessi o carenze. Questo sistema di monitoraggio continuo aiuta a mantenere il terreno in condizioni ideali, migliorando l'efficienza idrica e contribuendo a una crescita vegetale più sana e vigorosa.</p>
                    </div>
                </article>
                <article id="sensore-acqua">
                    <div class="elemento-doc">
                        <h1>Sensore per il livello dell'acqua</h1>
                        <p>Il terzo sensore è utilizzato per misurare la quantità di acqua presente nel serbatoio, elemento chiave per la gestione delle risorse idriche. Questo sensore rileva il livello dell'acqua, permettendo di monitorare costantemente le riserve idriche della serra. Collegato ad Arduino, fornisce dati in tempo reale che possono essere utilizzati per avvisare quando il livello dell'acqua scende al di sotto di una soglia predefinita, garantendo che le riserve siano sempre sufficienti per soddisfare le esigenze di irrigazione. Inoltre grazie al sensore è possibile verificare quando il serbatoio ha già raggiunto la sua capienza massima emettendo un suono.</p>
                    </div>
                </article>
                <article id="dashboard">
                    <div class="titolo-doc">
                        <p>Funzioni della Dashboard</p>
                    </div>
                </article>
                <article id="valori-attuali-e-ideali">
                    <div class="elemento-doc">
                        <h1>Valori attuali e ideali</h1>
                        <p>Questa dashboard fornisce un riepilogo in tempo reale dei principali parametri ambientali, aggiornato ogni secondo grazie ad AJAX. I parametri monitorati includono la temperatura, l'umidità dell'aria, l'umidità del terreno e il livello dell'acqua nel serbatoio. Ogni riquadro mostra il valore corrente del parametro, il valore ideale di riferimento e un'indicazione visiva delle variazioni rispetto all'ideale, utilizzando frecce per evidenziare gli aumenti o le diminuzioni. Inoltre, lo stato dell'acqua nel serbatoio è indicato come "Sufficiente" o "Riempire". Questa interfaccia permette un monitoraggio continuo e preciso delle condizioni ambientali, facilitando interventi tempestivi per mantenere i parametri entro i limiti ottimali.</p>
                    </div>
                </article>
                <article id="storico-dati">
                    <div class="elemento-doc">
                        <h1>Storico dei dati</h1>
                        <p>La sezione dello storico dati della dashboard presenta un registro dettagliato dei parametri ambientali monitorati nel tempo. Ogni riga del registro rappresenta un'istantanea dei dati raccolti in un determinato momento, visualizzata in una tabella. I dati vengono aggiornati ogni secondo grazie alla tecnologia AJAX, garantendo un monitoraggio continuo e accurato. Questa sezione permette di tracciare le variazioni nel tempo e analizzare le tendenze dei parametri ambientali per una gestione ottimale delle risorse.</p>
                    </div>
                </article>
                <article id="frequenza-di-aggiornamento">
                    <div class="elemento-doc">
                        <h1>Frequenza di aggiornamento</h1>
                        <p>La sezione "Frequenza di aggiornamento" consente di modificare l'intervallo con cui i dati vengono aggiornati. Con frequenza di aggiornamento si intende il tempo che deve passare tra l'ultimo invio dei dati grazie ad Arduino ed ESP32 e il precedente invio dei dati. È possibile impostare il tempo di aggiornamento in minuti e secondi, garantendo una flessibilità totale per adattarsi alle esigenze specifiche del monitoraggio ambientale. La frequenza di aggiornamento minima corrisponde a 1 minuto.</p>
                    </div>
                </article>
                <article id="valori-ideali">
                    <div class="elemento-doc">
                        <h1>Valori ideali</h1>
                        <p>Questa sezione permette di configurare i valori ideali per vari parametri ambientali, assicurando che le condizioni siano ottimizzate secondo le necessità specifiche. È possibile impostare la temperatura ideale, la quale deve avere un valore compreso tra 20 e 40 gradi. L'umidità ideale dell'ambiente può essere regolata, con un valore che può raggiungere il 100%. Infine, l'umidità ideale del terreno può essere impostata, la quale può raggiungere il 100%. Nonostante la possibilità di impostare valori ideali molto grandi, è implicito la non efficienza di tale azione. Queste impostazioni permettono un controllo preciso e personalizzato delle condizioni ambientali.</p>
                    </div>
                </article>
                <article id="gestione-utenti">
                    <div class="elemento-doc">
                        <h1>Gestione degli utenti</h1>
                        <p>Sempre nella dashboard esiste una sezione in particolare dedicata alla gestione degli utenti. Questa sessione è visibile solo dagli amministratori della serra e permette la visualizzazione dei vari utenti, l'inserimento, la cancellazione e la modifica di ogni utente. Inoltre sono stati verificati diversi controlli per evitare che l'amministratore modifichi i suoi stessi controlli o elimini utenti senza alcuna verifica. Grazie alla gestione degli utenti è possibile organizzare tutti i lavoratori della serra ed avere un controllo totale su chi può modificare le impostazioni di quest'ultima.</p>
                    </div>
                </article>
                <article id="strumenti-di-sviluppo">
                    <div class="titolo-doc">
                        <p>Strumenti di sviluppo</p>
                    </div>
                </article>
                <article id="programmi">
                    <div class="descrizione-doc">
                        <div class="elemento-doc">
                            <h1>Perché abbiamo scelto questi programmi?</h1>
                            <p>Abbiamo selezionato Visual Studio Code, WinSCP, Arduino IDE, Photoshop e Figma per il loro contributo alla nostra efficienza e produttività durante lo sviluppo del sito. Visual Studio Code è stato scelto come IDE principale grazie alla sua interfaccia intuitiva, estensibilità e supporto per molteplici linguaggi di programmazione. WinSCP è stato scelto per la sua capacità di garantire un trasferimento sicuro e rapido dei file tra l'ambiente di sviluppo locale e il server remoto. L'Arduino IDE è stato selezionato per la sua compatibilità con Arduino, permettendoci di programmare i microcontrollori in modo semplice ed efficace. Photoshop è stato scelto per la modifica e l'ottimizzazione delle immagini, garantendo un design visivamente accattivante. Infine, Figma è stato scelto per la progettazione collaborativa del design del sito, offrendo strumenti potenti per la prototipazione e il feedback in tempo reale.</p>
                        </div>
                </article>
                <article id='come'>
                        <div class="elemento-doc">
                            <h1>Come funzionano</h1>
                                <li>
                                    Visual Studio Code è un IDE che facilita la scrittura e la gestione del codice, supportando il debugging integrato e la facile lettura del codice, rendendo lo sviluppo più organizzato e collaborativo.
                                </li>
                                <li>
                                    WinSCP è un client FTP che permette di trasferire file in modo sicuro e sincronizzare le directory tra il computer locale e il server remoto situato su altervista, essenziale per implementare e aggiornare il sito su Altervista.
                                </li>
                                <li>
                                    L'Arduino IDE è utilizzato per programmare Arduino e la scheda ESP32, consentendo di scrivere, caricare e testare il codice che controlla i dispositivi della serra.
                                </li>
                                <li>
                                    Photoshop serve per la modifica delle immagini, migliorando la qualità visiva del sito attraverso l'ottimizzazione e la personalizzazione delle risorse grafiche.
                                </li>
                                <li>
                                Figma è uno strumento di design collaborativo che permette di ideare, prototipare e raccogliere feedback sul layout e l'interfaccia del sito, facilitando la comunicazione tra i membri del team e garantendo un design coerente e user-friendly.
                                </li> 
                        </div>
                    </div>
                </article>
                </div>
            </div>
    </div>
    <footer>
        <div class="footer">
            <div class="footer-logo"><img src="img/logo.png"></div>
            <div class="footer-menu">
                <li><a href='index.php'>Home</a></li>
                <li><a href='index.php#dettagli'>Dettagli</a></li>
                <?php 
                    if(controllaLogin())
                        echo "<li><a href='dashboard.php'>Dashboard</a></li>";
                ?>
                <li><a href='#inizio'>Documentazione</a></li>
            </div>
            <div class="info">
                <span onclick='toggleCondizioni()'>Termini e condizioni</span>
            </div>
        </div>
        <div class="copyright">
            Copyright &copy SerraSmart 2023-<script>document.write(new Date().getFullYear());</script> 
        </div>
    </footer>

    <!-- Pulsante + SerraAI -->
    <div class="chatbot">
        <div class="bottone active" id='bottone' onclick="attivaBot()">
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

    <!-- Termini e Condizioni -->
    <div class="termini" id='termini' style="display: none;">
        <div id="terms" style="display: none;">
            <h2><strong>Termini e Condizioni di Utilizzo</strong></h2>
            <ol>
                <li><strong>Accettazione dei Termini</strong>: Utilizzando il sito web SerraSmart e i suoi servizi, accetti di essere vincolato dai seguenti Termini e Condizioni. Se non sei d'accordo con alcune parti di questi Termini, ti preghiamo di non utilizzare il nostro sito.</li>
                <li><strong>Diritti di Proprietà Intellettuale</strong>: Il sito web SerraSmart, insieme a tutti i suoi contenuti originali, funzionalità e design, sono di proprietà esclusiva di SerraSmart. Tutti i diritti di proprietà intellettuale sono riservati.</li>
                <li><strong>Utilizzo del Sito</strong>: Il nostro sito è destinato all'uso personale e non commerciale. Non è consentito copiare, distribuire o modificare qualsiasi parte del sito senza il consenso scritto di SerraSmart.</li>
                <li><strong>Raccolta dei Dati</strong>: Utilizzando SerraSmart, accetti la raccolta e l'uso dei tuoi dati personali in conformità con la nostra Informativa sulla Privacy. Assicuriamo la massima riservatezza e sicurezza dei tuoi dati.</li>
                <li><strong>Limitazioni di Responsabilità</strong>: SerraSmart non è responsabile per eventuali danni o perdite derivanti dall'uso del sito o dei suoi servizi. L'utente utilizza il sito a proprio rischio.</li>
                <li><strong>Modifiche ai Termini e Condizioni</strong>: Ci riserviamo il diritto di modificare questi Termini e Condizioni in qualsiasi momento. Le modifiche saranno efficaci immediatamente dopo la pubblicazione sul sito.</li>
                <li><strong>Legge Applicabile</strong>: Questi Termini e Condizioni sono regolati dalle leggi della Regione Campania, Italia.</li>
                <li><strong>Requisiti di sistema</strong>: L'uso ottimale di SerraSmart potrebbe richiedere determinati requisiti hardware e software. Assicurati di soddisfare questi requisiti per un'esperienza ottimale.</li>
                <li><strong>Sospensione o Cancellazione dell'Account</strong>: Ci riserviamo il diritto di sospendere o cancellare l'account di un utente in caso di violazione dei Termini e Condizioni o per motivi di sicurezza.</li>
                <li><strong>Utilizzo dei Dati della Serra</strong>: SerraSmart potrebbe raccogliere dati ambientali e operativi dalla serra tramite sensori e dispositivi connessi. Questi dati vengono utilizzati esclusivamente per migliorare le funzionalità e le prestazioni di SerraSmart e non vengono condivisi con terze parti senza il tuo consenso.</li>
                <li><strong>Contattaci</strong>: Per domande o commenti riguardanti questi Termini e Condizioni, ti preghiamo di contattarci all'indirizzo email: <a href="mailto:francesco.cuccaro.alunno@gmail.com">Clicca qui</a>.</li>
            </ol>
            <p>Continuando a utilizzare il nostro sito, confermi di aver letto e accettato i presenti Termini e Condizioni.</p>
            <p>Grazie per aver scelto SerraSmart!</p>
            <p onclick='toggleCondizioni()' id='tasto'>Chiudi questa schermata</p>
        </div>
    </div>
</div>
<script>
    controllaStile();
        // JavaScript per gestire l'effetto di scorrimento
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('article');
            const sidebarLinks = document.querySelectorAll('.lista-elementi li a');

            let currentSection = "";

            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (window.pageYOffset >= sectionTop - 50) 
                { 
                    currentSection = section.getAttribute('id');
                }
            });

            sidebarLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + currentSection) {
                    link.classList.add('active');
                }
            });
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            const targetElement = document.querySelector(this.getAttribute('href'));
            const navbarHeight = document.querySelector('.navbar').offsetHeight;

            window.scrollTo({
                top: targetElement.offsetTop - navbarHeight,
                behavior: 'smooth'
            });
        });
    });
    </script>
</body>
</html>