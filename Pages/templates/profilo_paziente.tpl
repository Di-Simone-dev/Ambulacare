{extends file="layout_paziente.tpl"}

{block name=content}
    <div style="padding:35px;">
    <h2> Profilo Personale - Sig. {$paziente.nome} {$paziente.cognome}</h2>
    <h4>Informazioni Personali </h4>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Nome:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$paziente.nome}</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Cognome:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$paziente.cognome}</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Email:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$paziente.email}</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Codice Fiscale:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$paziente.codice_fiscale}</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Data di Nascita:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$paziente.data_nascita}</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Luogo di Nascita:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$paziente.luogo_nascita}</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Residenza:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$paziente.residenza}</label>
<br><br>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Telefono:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$paziente.numero_telefono}</label>
<br><br>

        <a class='btn btn-primary' style='width:195px;' href="/Ambulacare/Paziente/formSetInfoPaziente">Modifica Dati</a>
             </div>
{/block}