{extends file="layout_medico.tpl"}

{block name=content}
    
    <br><br><br>
    <form method="post" action="" style="width: 600px;">
    <h1 style="font-size: 34px;">MODIFICA DATI</h1>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">nome</label>
    <input type="text" id="nome" name="nome" required value="{$medico.nome}">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
    <input type="text" id="nome" name="nome" required value="{$medico.cognome}">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Costo</label>
    <input type="text" id="costo" name="costo" required value="{$medico.costo}">
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Immagine Profilo</label>
    <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
    <button type="submit" name="register" style="width: 100px;">MODIFICA</button>
    <a href="/Ambulacare/Medico/formEmailMedico" class="btn btn-primary"> Modifica Email</a>
    <a href="/Ambulacare/Medico/formPasswordMedico" class="btn btn-primary"> Modifica Password</a>
</form>

{/block}