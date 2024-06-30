{extends file="layout_paziente.tpl"}

{block name=content}
    <br><br>
    <form method="post" action="/Ambulacare/Paziente/setInfoPaziente" style="width: 600px;padding:35px;">
    <h1>MODIFICA DATI</h1>
<br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nome</label>
    <input type="text" id="residenza" name="Nome" required value="{$paziente.nome}">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
    <input type="text" id="residenza" name="Cognome" required value="{$paziente.cognome}">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Residenza</label>
    <input type="text" id="residenza" name="Residenza" required value="{$paziente.residenza}">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Luogo di Nascita</label>
    <input type="text" id="residenza" name="LuogoNascita" required value="">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Codice Fiscale</label>
    <input type="text" id="residenza" name="CodiceFiscale" required value="{$paziente.codice_fiscale}">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Data Nascita</label>
    <input type="date" id="residenza" name="DataNascita" required value="{$paziente.data_nascita}">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Numero di telefono</label>
    <input type="tel" id="numerotelefono" name="Numerotelefono" required value="{$paziente.numero_telefono}">
<br><br>
    <button type="submit" name="register" class="btn btn-primary">Conferma Modifiche</button>
<br><br>
    <a href="/Ambulacare/Paziente/formEmail" class="btn btn-primary">Modifica email</a>
<br><br>
    <a href="/Ambulacare/Paziente/formPasswordPaziente" class="btn btn-primary"> Modifica Password</a>
</form>
    
{/block}