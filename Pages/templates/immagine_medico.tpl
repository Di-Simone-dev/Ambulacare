{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <form method="post" action="/Ambulacare/Medico/setProPicMedico" style="width: 600px;" enctype="multipart/form-data">
        <h1 style="font-size: 34px;">Carica Immagine</h1>
        <input id="imageFile" name="imageFile"  type="file">
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;"></label>
        <button type="submit" name="register" style="width: 100px;">Conferma</button>
    </form>

{/block}