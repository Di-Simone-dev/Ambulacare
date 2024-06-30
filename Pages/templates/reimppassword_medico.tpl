{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <form method="post" action="/Ambulacare/Medico/setPasswordMedico" style="padding:35px;">
        <h1>REIMPOSTAZIONE PASSWORD</h1>
        {if $error}
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {$error}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        {/if}
        <h6>Nuova Password</h6>
        <input type="password" id="password" name="password" required>
<br><br>
        <button type="submit" name="register" class="btn btn-primary">Reimposta Password</button>
    </form>

{/block}