//Funzione per i termini e condizioni
function toggleCondizioni()
{
    var condizioni = document.getElementById('terms');
    var termini = document.getElementById('termini');
    if(condizioni.style.display=='none')
    {
        termini.style.display='block';
        condizioni.style.display='block';
    }
    else
    {
        termini.style.display='none';
        condizioni.style.display='none';
    }

}

// Funzione per attivare il chatbot

function attivaBot() 
{
    var chatBot = document.getElementById('wrapper');
    var btnChat = document.getElementById('btn-chat');
    chatBot.classList.toggle('active');
    if (btnChat.classList=="svg-inline--fa fa-comments") 
    {
        btnChat.classList="svg-inline--fa fa-xmark";
    }
    else
    {
        btnChat.classList="svg-inline--fa fa-comments";
    }
}

// Funzione per cambiare il tema della pagina

function cambiaTema()
{
    document.body.classList.toggle("dark");
    testo = document.getElementById('span-tema');
    icona = document.getElementById('icona-tema');
    if(testo.innerHTML=="Passa al tema scuro")
    {
        testo.innerHTML="Passa al tema chiaro";
        icona.classList="svg-inline--fa fa-sun";
        localStorage.setItem('tema', 'dark');
    }
    else
    {
        testo.innerHTML="Passa al tema scuro";
        icona.classList="svg-inline--fa fa-moon";
        localStorage.setItem('tema', 'light');
    }
}
function cambiaStile()
{
    document.body.classList.toggle("dark");
    icona = document.getElementById('icona-tema');
    if(document.body.classList.contains("dark"))
    {
        icona.classList="svg-inline--fa fa-sun";
        localStorage.setItem('tema', 'dark');
    }
    else
    {
        icona.classList="svg-inline--fa fa-moon";
        localStorage.setItem('tema', 'light');
    }
}

// Funzione per controllare il tema al caricamento della pagina

function controllaTema() 
{
    const temaAttuale = localStorage.getItem('tema');
    const testo = document.getElementById('span-tema');
    const icona = document.getElementById('icona-tema');
    if (!temaAttuale) 
    {
        localStorage.setItem('tema', 'light');
    }
    else
    {
        if (temaAttuale=='dark') 
        {
            document.body.classList='dark';
            testo.innerHTML = 'Passa al tema chiaro';
            icona.classList='fa-solid fa-sun';
            localStorage.setItem('tema', 'dark');
        } 
        else 
        {
            document.body.classList='';
            testo.innerHTML = 'Passa al tema scuro';
            icona.classList='fa-solid fa-moon';
            localStorage.setItem('tema', 'light');
        }
    } 
}
function controllaStile() 
{
    const temaAttuale = localStorage.getItem('tema');
    const icona = document.getElementById('icona-tema');
    if (!temaAttuale) 
    {
        localStorage.setItem('tema', 'light');
    }
    else
    {
        if (temaAttuale=='dark') 
        {
            document.body.classList='dark';
            icona.classList='fa-solid fa-sun';
            localStorage.setItem('tema', 'dark');
        } 
        else 
        {
            document.body.classList='';
            icona.classList='fa-solid fa-moon';
            localStorage.setItem('tema', 'light');
        }
    } 
}

// Funzione per disattivare il chatbot quando la pagina si trova in alto a tutto

function controlla()
{
    var position = window.scrollY;
    navbar = document.getElementById('nav');
    wrapper = document.getElementById('wrapper');
    bottone = document.getElementById('bottone');
    var btnChat = document.getElementById('btn-chat');
    if(position>100)
    {
        navbar.classList.add('active');
        bottone.classList.add('active');
    }
    else
    {
        navbar.classList.remove('active');
        bottone.classList.remove('active');
        wrapper.classList.remove('active');
        btnChat.classList="svg-inline--fa fa-comments";
    }
}



// Conferma per poter cancellare un utente

function conferma()
{
    var conferma = confirm("Sei sicuro di voler cancellare questo utente?");
    if(conferma)
    {
        return true;
    }
    else
    {
        return false;
    }
}

// Funzione per avvisare l'utente di non poter fare questa operazione

function nonPuoi()
{
    alert('Non puoi fare questa operazione');
}


// Freccietta per dropdown nella sidebar

function opzioniUtente()
{
    icona = document.getElementById('icona-utenti');
    nascosto = document.getElementById('nascosto');
    nascosto.classList.toggle('active');
    if(icona.style.transform=='rotate(-180deg)')
    {
        icona.style.transform='rotate(0deg)';
    }
    else
    {
        icona.style.transform='rotate(-180deg)';
    }
}

//Funzione per sfondo decente

function cambiaSfondo(x)
{
    elementi=document.getElementsByClassName('menu')[0].children[x];
    elementi.classList.add('selezionato'); 
}


