{extends file="layout_paziente.tpl"}

{block name=content}
<br><br>
    <form method="post" action="/Ambulacare/Paziente/registrazionepaziente" style="padding:35px;">
        <h1>REGISTRAZIONE PAZIENTE</h1>
<br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nome</label>
        <input type="text" id="nome" name="nome" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
        <input type="text" id="cognome" name="cognome" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
        <input type="email" id="email" name="email" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Codice Fiscale</label>
        <input type="text" id="codicefiscale" name="codice_fiscale" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Data di nascita</label>
        <input type="date" id="datanascita" name="data_nascita" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Luogo di nascita</label>
        <input type="text" id="luogonascita" name="luogo_nascita" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Residenza</label>
        <input type="text" id="residenza" name="residenza" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Numero di telefono</label>
        <input type="tel" id="numerotelefono" name="numero_telefono" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Password</label>
        <input type="password" id="password" name="password" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Conferma Password</label>
        <input type="password" id="cpassword" name="cpassword" required>
<br><br>
        <button type="submit" name="register" class="btn btn-primary">REGISTRATI</button>
    </form>

{/block}