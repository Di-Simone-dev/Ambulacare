{extends file="layout_medico.tpl"}

{block name=content}

    <br>
    <form method="post" action="/Ambulacare/Medico/setPasswordMedico" style="width: 600px;padding:35px;">
        <h1>REIMPOSTAZIONE PASSWORD</h1>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Password</label>
        <input type="password" id="password" name="password" required>
<br><br>
        <button type="submit" name="register" class="btn btn-primary">Reimposta Password</button>
    </form>

{/block}