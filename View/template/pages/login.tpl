{extends file="layout.tpl"}
{block name=body}
    <form method="post" action="login.php">
        <h1>ACCESSO</h1>
        <input type="text" id="email" placeholder="Email" name="email">
        <input type="password" id="Password" placeholder="Password" name="password">
        <button type="submit" name="login">ACCEDI</button>
    </form>