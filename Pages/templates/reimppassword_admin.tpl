{extends file="layout_admin.tpl"}

{block name=content}

    <form method="post" action="" style="width: 600px;padding:35px;">
        <h1>REIMPOSTAZIONE PASSWORD</h1>
        {if($error)}
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {$error}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        {/if}
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" name="register" class="btn btn-primary">Reimposta Password</button>
    </form>

{/block}