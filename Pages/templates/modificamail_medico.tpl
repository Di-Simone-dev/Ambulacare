{extends file="layout_medico.tpl"}

{block name=content}

    formEmailMedico
    <form method="post" action="/Ambulacare/Medico/setEmailMedico" style="width: 600px;">
        {if $error}
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {$error}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        {/if}
        <h1 style="font-size: 34px;">Modifica mail</h1>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Email</label>
        <input type="email" id="email" name="Email" required>
        <button type="submit" name="register" style="width: 100px;">Procedi</button>
    </form>

{/block}