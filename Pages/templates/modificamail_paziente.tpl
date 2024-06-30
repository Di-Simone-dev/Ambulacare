{extends file="layout_paziente.tpl"}

{block name=content}
<br><br>

    <form method="post" action="/Ambulacare/Paziente/setEmailPaziente" style="padding:35px;">
        {if $error}
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {$error}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        {/if}
        <h1 >Modifica E-mail</h1>
<br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Email</label>
        <input type="email" id="email" name="Email" required>
<br><br>
        <button type="submit" name="register" class="btn btn-primary">Conferma modifica</button>
    </form>

{/block}