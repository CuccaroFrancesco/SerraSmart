<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/root.css">
    <link rel="stylesheet" href="css/index.css">
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
<div class="sito" id='inizio'>
    <!-- Header-->
    <div class="header">
        <div class="navbar">
            <!-- Navbar Utente / Admin -->
            <nav id='nav'>
                <div class='logo'><a href='#inizio'><img src="img/logo.png"></a></div>
                <div class='menu'>
                    <li><a href='#inizio'>Home</a></li>
                    <li><a href='#dettagli'>Dettagli</a></li>
                    <?php 
                        if(controllaLogin())
                            echo "<li><a href='dashboard.php'>Dashboard</a></li>";
                    ?>
                    <li><a href='doc.php'>Documentazione</a></li>
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
            <!-- Hero centrale -->
            <div class="hero">
                <div class="hero-title"><span>Serra</span>Smart</div>
                <div class="hero-p">Esplora la serra del futuro!</div>
                <a href='#dettagli'><div class="cta">Scopri di più</div></a>
                <div class="header-button"><a href='#dettagli'><i class="fa-solid fa-chevron-down"></i></a></div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1715410341">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <a name='dettagli'></a>
    <section>
        <div class="model">
        <div class="sketchfab-embed-wrapper"> <iframe title="serr (2)" frameborder="0" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" allow="autoplay; fullscreen; xr-spatial-tracking" xr-spatial-tracking execution-while-out-of-viewport execution-while-not-rendered web-share src="https://sketchfab.com/models/0784e6b13a0843e09aacb7af9bb923fe/embed?autostart=1&preload=1"> </iframe> </div>
        </div>
        <div class="descrizione-3d">
            <h2>Esplora Il Nostro Modello 3D</h2>
            <p>Il nostro modello 3D dettagliato vi permette di esplorare la struttura della serra prima ancora di vederla di persona. Scoprite come questa innovativa serra tecnologica può trasformare la vostra esperienza di coltivazione.</p>
            <hr width=100%>
            <div class="container-3d">
                <div>
                    <h4>Tecnologie Avanzate</h4>
                    <p>La serra è dotata di sensori avanzati che monitorano le condizioni ambientali e del terreno per avere dati sempre aggiornati a portata di click.</p>
                </div>
                <div>
                    <h4>Intelligenza Artificiale</h4>
                    <p>Il sistema di intelligenza artificiale integrato conosce tutte le informazioni della serra e può fornire consigli utili sulla coltivazione delle tue piante.</p>
                </div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1715279376">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
    </section>
    <div class="container-info">
        <h1>Le tecnologie <span>utilizzate</span></h1>
        <p>Scopri tutto ciò che abbiamo usato per creare il codice, il design e il circuito.</p>
        <div class="tecnologie">
            <div class="container-card">
                <div class="card">
                    <div class="card-bg" id='sfondo-codice'>
                        <div class="custom-shape-divider-bottom-1715508521">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-box">
                        <div class="container-icon">
                            <div class="card-icon">
                                <i class="fa-solid fa-code"></i>
                            </div>
                        </div>
                        <div class="card-description">
                            <h2>Codice</h2>
                            <p>Tutte le tecnologie usate per il codice</p>
                            <hr>
                            <div class="lista-tecnologie">
                                <ul>
                                    <li>HTML</li>
                                    <li>CSS</li>
                                    <li>JavaScript</li>
                                    <li>PHP</li>
                                    <li>JQuery</li>
                                    <li>Ajax</li>
                                    <li>C++</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-bg" id='sfondo-design'>
                        <div class="custom-shape-divider-bottom-1715508521">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-box">
                        <div class="container-icon">
                            <div class="card-icon">
                                <i class="fa-solid fa-palette"></i>
                            </div>
                        </div>
                        <div class="card-description">
                            <h2>Design</h2>
                            <p>Tutte le tecnologie usate per il design</p>
                            <hr>
                            <div class="lista-tecnologie">
                                <ul>
                                    <li>Photoshop</li>
                                    <li>Illustrator</li>
                                    <li>Blender</li>
                                    <li>Figma</li>
                                    <li>Sketchfab</li>
                                    <li>Modello 3D</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-bg" id='sfondo-circuito'>
                        <div class="custom-shape-divider-bottom-1715508521">
                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="card-box">
                        <div class="container-icon">
                            <div class="card-icon">
                                <i class="fa-solid fa-plug"></i>
                            </div>
                        </div>
                        <div class="card-description">
                            <h2>Circuito</h2>
                            <p>Tutte le tecnologie usate per il circuito</p>
                            <hr>
                            <div class="lista-tecnologie">
                                <ul>
                                    <li>Arduino</li>
                                    <li>ESP-32</li>
                                    <li>Modulo 4 Relay</li>
                                    <li>Sensore temperatura</li>
                                    <li>Sensore umidità</li>
                                    <li>Sensore terreno</li>
                                    <li>Sensore livello acqua</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="custom-shape-divider-bottom-1715512087">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
            </svg>
        </div>
    </div>
    <div class="team">
        <div class="container-team">
            <h2>Il Team</h2>
            <p>Scopri chi ha collaborato per creare questa serra domotica!</p>
            <div class="membri-team">
                <div class="membro">
                    <div class="membro-img">
                        <div class="container-foto">
                            <div id="francesco-pic"></div>
                        </div>
                    </div>
                    <div class="membro-description">
                        <p>Francesco Cuccaro</p>
                        <ul>
                            <li>Front-End Developer</li>
                            <li>Back-End Developer</li>
                            <li>Database Manager</li>
                        </ul>
                    </div>
                </div>
                <div class="membro">
                    <div class="membro-img">
                        <div class="container-foto">
                            <div id="carmine-pic"></div>
                        </div>
                    </div>
                    <div class="membro-description">
                        <p>Carmine Patella</p>
                        <ul>
                            <li>Web Designer</li>
                            <li>3D Model Creator</li>
                            <li>Project Documentator</li>
                        </ul>
                    </div>
                </div>
                <div class="membro">
                    <div class="membro-img">
                        <div class="container-foto">
                            <div id="vincenzo-pic"></div>
                        </div>
                    </div>
                    <div class="membro-description">
                        <p>Vincenzo Diana</p>
                        <ul>
                            <li>Arduino Coder</li>
                            <li>Circuit Creator</li>
                            <li>Network Connectivity Manager</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer">
            <div class="footer-logo"><img src="img/logo.png"></div>
            <div class="footer-menu">
                <li><a href='#inizio'>Home</a></li>
                <li><a href='#dettagli'>Dettagli</a></li>
                <?php 
                    if(controllaLogin())
                        echo "<li><a href='dashboard.php'>Dashboard</a></li>";
                ?>
                <li><a href='doc.php'>Documentazione</a></li>
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
        <div class="bottone" id='bottone' onclick="attivaBot()">
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
    window.addEventListener("scroll", controlla);
    controllaStile();
</script>
</body>
</html>
