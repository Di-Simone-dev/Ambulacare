{extends file="layout_paziente.tpl"}

{block name=content}

    <form method="post" action="register.php" style="width: 600px;">
        <h1 style="font-size: 34px;">REGISTRAZIONE</h1>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
        <input type="text" id="cognome" name="cognome" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
        <input type="text" id="email" name="email" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Codice Fiscale</label>
        <input type="text" id="codicefiscale" name="codicefiscale" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Data di nascita</label>
        <input type="date" id="datanascita" name="datanascita" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Luogo di nascita</label>
        <input type="text" id="luogonascita" name="luogonascita" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Residenza</label>
        <input type="text" id="residenza" name="residenza" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Numero di telefono</label>
        <input type="text" id="numerotelefono" name="numerotelefono" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit" name="register" style="width: 100px;">REGISTRATI</button>
    </form>

{/block}