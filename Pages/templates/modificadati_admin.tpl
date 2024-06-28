{extends file="layout_admin.tpl"}

{block name=content}
    

    <br><br>
    <form method="post" action="modifica_dati_admin.php" style="width: 600px;">
    <h1 style="font-size: 34px;">MODIFICA DATI</h1>
    {if($error)}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {$error}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    {/if}
    <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
    <input type="email" id="email" name="email" required value="{$email}">
    <button type="submit" name="register" style="width: 100px;">MODIFICA</button>
</form>

{/block}