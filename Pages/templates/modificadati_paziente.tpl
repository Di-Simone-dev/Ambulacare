{extends file="layout_paziente.tpl"}

{block name=content}
    <br><br>
    <form method="post" action="/Ambulacare/Paziente/setInfoPaziente" style="padding:35px;">
    <h1>MODIFICA DATI</h1>
<br>
    <h6>Nome</h6>
    <input type="text" id="nome" name="Nome" required value="{$paziente.nome}">
<br><br>
    <h6>Cognome</h6>
    <input type="text" id="cognome" name="Cognome" required value="{$paziente.cognome}">
<br><br>
    <h6>Residenza</h6>
    <input type="text" id="residenza" name="Residenza" required value="{$paziente.residenza}">
<br><br>
    <h6>Luogo di Nascita</h6>
    <input type="text" id="luogonascita" name="LuogoNascita" required value="">
<br><br>
    <h6>Codice Fiscale</h6>
    <input type="text" id="codicefiscale" name="CodiceFiscale" required value="{$paziente.codice_fiscale}">
<br><br>
    <h6>Data Nascita</h6>
    <input type="date" id="datanascita" name="DataNascita" required value="{$paziente.data_nascita}">
<br><br>
    <h6>Numero di telefono</h6>
    <input type="tel" id="numerotelefono" name="Numerotelefono" required value="{$paziente.numero_telefono}">
<br><br>
    <button type="submit" name="register" class="btn btn-primary">Conferma Modifiche</button>
<br><br>
    <a href="/Ambulacare/Paziente/formEmail" class="btn btn-primary">Modifica email</a>
<br><br>
    <a href="/Ambulacare/Paziente/formPasswordPaziente" class="btn btn-primary"> Modifica Password</a>
</form>
    
{/block}