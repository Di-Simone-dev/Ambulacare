{extends file="layout_medico.tpl"}

{block name=content}
    
    <br><br>
    <form method="post" enctype="multipart/form-data" action="/Ambulacare/Medico/setInfoMedico" style="padding:35px;">
    <h1>MODIFICA DATI</h1>
<br>
    <h6>nome:</h6>
    <input type="text" id="nome" name="Nome" required value="{$medico.nome}">
<br><br>
    <h6>Cognome:</h6>
    <input type="text" id="cognome" name="Cognome" required value="{$medico.cognome}">
<br><br>
    <h6>Costo:</h6>
    <input type="text" id="costo" name="Costo" required value="{$medico.costo}">
<br><br>
    <h6>Immagine Profilo:</h6>
    <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
<br><br>
    <button type="submit" name="register" class="btn btn-primary">CONFERMA MODIFICHE</button>
<br><br>
    <a href="/Ambulacare/Medico/formEmailMedico" class="btn btn-primary"> Modifica Email</a>
<br><br>
    <a href="/Ambulacare/Medico/formPasswordMedico" class="btn btn-primary"> Modifica Password</a>
</form>

{/block}