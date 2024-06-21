{extends file="layout_medico.tpl"}

{block name=content}
    
    <form method="post" action="" style="width: 600px;">
    <h1 style="font-size: 34px;">MODIFICA DATI</h1>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
    <input type="text" id="email" name="email" >
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Costo</label>
    <input type="text" id="costo" name="costo" >
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Immagine Profilo</label>
    <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
    <button type="submit" name="register" style="width: 100px;">MODIFICA</button>
</form>

{/block}