{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <form method="post" action="/Ambulacare/Medico/setPasswordMedico" style="width: 600px;">
        <h1 style="font-size: 34px;">Carica Immagine</h1>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Password</label>
        <button type="submit" name="register" style="width: 100px;">Carica</button>
    </form>

{/block}