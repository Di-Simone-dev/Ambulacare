{extends file="layout.tpl"}
{block name=content}
<div style="padding:35px;">
    <form method="post" action="/Ambulacare/Paziente/checkLogin" >
        <h1>ACCESSO PAZIENTE</h1>
        {if $error}
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {$error}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        {/if}
        <h6>Email</h6>
        <input type="email" id="email" name="email" required value="{$email}">
        <h6>Password</h6>
        <input type="password" id="Password" name="password" required>
        <br><br>
        <button type="submit" name="login" class="btn btn-primary">ACCEDI</button>
    </form>
</div>
{/block}