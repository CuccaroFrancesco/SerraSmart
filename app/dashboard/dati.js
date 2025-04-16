
// Funzione per stampare i dati della serra nei 3 riquadri

function stampaDati() 
{
    $.ajax({
        url: 'arduino/datiSerra.php',
        dataType: 'json',
        success: function (data) 
        {
            temp=data.temp+" °C";
            $('#temp').html(temp);
            umidita=data.umidita+" %";
            $('#aria').html(umidita);
            terra=data.terra+" %";
            $('#terra').html(terra);
            acqua=data.acqua+" %";
            $('#acqua').html(acqua);
            $('#ideale-temp').html("Ideale: "+data.temperaturaIdeale + " °C");
            $('#ideale-umid').html("Ideale: "+data.umiditaIdeale + " %");
            $('#ideale-terra').html("Ideale: "+data.terraIdeale + " %");
            $('#ideale-acqua').html("Ideale: 60% +");
            //Variazioni temperatura

            diffTemp = data.temp - data.temperaturaIdeale;
            diffTemp = Math.round(diffTemp);

            var classeColore = (diffTemp > 4 || diffTemp < -4) ? 'down' : 'up';
            var direzioneFreccia = (diffTemp > 0 ) ? 'up' : 'down';

            if (diffTemp === 0) 
            {
                classeColore = 'up';
                diffTemp = 'Ideale';
                direzioneFreccia = 'fa-check';
                modifica = "<span class='" + classeColore + "'><i class='fa-solid" + direzioneFreccia + "'></i> " + diffTemp + "</span>";
            }
            else
                modifica = "<span class='" + classeColore + "'><i class='fa-solid fa-arrow-" + direzioneFreccia + "'></i> " + diffTemp + " °C</span>";

            $('#v-temp').html(modifica);

            //Variazioni umidità aria

            diffAria = data.umidita - data.umiditaIdeale;
            diffAria = Math.round(diffAria);

            var classeColore = (diffAria > 10 || diffAria < -10) ? 'down' : 'up';
            var direzioneFreccia = (diffAria > 0 ) ? 'up' : 'down';

            if (diffAria === 0) 
            {
                classeColore = 'up';
                diffAria = 'Ideale';
                direzioneFreccia = 'fa-check';
                modifica = "<span class='" + classeColore + "'><i class='fa-solid" + direzioneFreccia + "'></i> " + diffAria + "</span>";
            }
            else
                modifica = "<span class='" + classeColore + "'><i class='fa-solid fa-arrow-" + direzioneFreccia + "'></i> " + diffAria + " %</span>";

            $('#v-aria').html(modifica);

            //Variazioni umidità terra

            diffTerra = data.terra - data.terraIdeale;
            diffTerra = Math.round(diffTerra);

            var classeColoreTerra = (diffTerra > 5 || diffTerra < -5) ? 'down' : 'up';
            var direzioneFrecciaTerra = (diffTerra > 0 ) ? 'up' : 'down';

            if (diffTerra === 0) 
            {
                classeColoreTerra = 'up';
                diffTerra = 'Ideale';
                direzioneFrecciaTerra = 'fa-check';
                modifica = "<span class='" + classeColoreTerra + "'><i class='fa-solid" + direzioneFrecciaTerra + "'></i> " + diffTerra + "</span>";
            }
            else
                modifica = "<span class='" + classeColoreTerra + "'><i class='fa-solid fa-arrow-" + direzioneFrecciaTerra + "'></i> " + diffTerra + " %</span>";

            $('#v-terra').html(modifica);

            //Variazioni livello acqua

            if (data.acqua > 60) 
            {
                direzioneFrecciaAcqua = 'fa-check';
                modifica = "<span class='up'>Sufficiente</span>";
            }
            else
            modifica = "<span class='down'>Riempire</span>";

            $('#v-acqua').html(modifica);
        },
    });
}

// Funzione per aggiornare lo storico dei vari dati

function storico() 
{
    var funzione = 
    {
        url: 'arduino/vis.php',
        dataType: 'json',
        success: function (data) 
        {
            $('.table .corpo').empty();
            var id = 1;

            $.each(data, function (index, row) 
            {
                orario = row.data.split(" ");
                var rigaHTML = '<div class="riga">' +
                    '<div class="td">' + id + '</div>' +
                    '<div class="td">' + orario[1] + '</div>' +
                    '<div class="td">' + row.temp + ' °C </div>' +
                    '<div class="td">' + row.umidita + ' %</div>' +
                    '<div class="td">' + row.terra + ' %</div>' +
                    '<div class="td">' + row.acqua + ' %</div>' +
                    '</div>';
                id++;

                $('.table .corpo').append(rigaHTML);
            });
        },
    }

    $.ajax(funzione);
}

// Richiami delle funzioni all'apertura della pagina + ogni secondo
stampaDati();
setInterval(stampaDati, 1000);

storico();
setInterval(storico, 1000);