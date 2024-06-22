{extends file="layout_admin.tpl"}

{block name=content}

    <form method="post" action="" style="width: 600px;">
        <h1 style="font-size: 34px;">REIMPOSTAZIONE PASSWORD</h1>
        {if($error)}
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {$error}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        {/if}
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nuova Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" name="register" style="width: 100px;">REIMPOSTA</button>
    </form>

{/block}