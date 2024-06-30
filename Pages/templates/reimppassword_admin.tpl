{extends file="layout_admin.tpl"}

{block name=content}
<br><br>
    <form method="post" action="" style="padding:35px;">
        <h1>REIMPOSTAZIONE PASSWORD</h1>
        {if $error}
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {$error}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        {/if}
        <h6>Nuova Password</h6>
        <input type="password" id="password" name="password" required>
        <button type="submit" name="register" class="btn btn-primary">Reimposta Password</button>
    </form>

{/block}