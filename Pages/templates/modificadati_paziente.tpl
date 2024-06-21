{extends file="layout_paziente.tpl"}

{block name=content}
    
    <form method="post" action="" style="width: 600px;">
    <h1 style="font-size: 34px;">MODIFICA DATI</h1>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
    <input type="text" id="email" name="email" >
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Residenza</label>
    <input type="text" id="residenza" name="residenza" >
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Numero di telefono</label>
    <input type="text" id="numerotelefono" name="numerotelefono" >
    <button type="submit" name="register" style="width: 100px;">MODIFICA</button>
</form>
    
{/block}