{extends file="layout_paziente.tpl"}

{block name=content}
    <form method="post" action="" style="width: 600px;padding:35px;">
    <h1>REIMPOSTAZIONE PASSWORD</h1>
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Password</label>
    <input type="password" id="password" name="password" required>
<br><br>
    <button type="submit" name="register" class="btn btn-primary">Reimposta Password</button>
</form>
{/block}