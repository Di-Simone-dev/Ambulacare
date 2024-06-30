{extends file="layout_medico.tpl"}

{block name=content}
    
    <br>
    <form method="post" enctype="multipart/form-data" action="/Ambulacare/Medico/setInfoMedico" style="width: 600px;padding:35px;">
    <h1>MODIFICA DATI</h1>
<br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">nome</label>
    <input type="text" id="nome" name="Nome" required value="{$medico.nome}">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
    <input type="text" id="nome" name="Cognome" required value="{$medico.cognome}">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Costo</label>
    <input type="text" id="costo" name="Costo" required value="{$medico.costo}">
<br><br>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Immagine Profilo</label>
    <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
<br><br>
    <button type="submit" name="register" class="btn btn-primary">CONFERMA MODIFICHE</button>
<br><br>
    <a href="/Ambulacare/Medico/formEmailMedico" class="btn btn-primary"> Modifica Email</a>
<br><br>
    <a href="/Ambulacare/Medico/formPasswordMedico" class="btn btn-primary"> Modifica Password</a>
</form>

{/block}