{extends file="layout_admin.tpl"}

{block name=content}
<br><br>
    <form method="post" action="/Ambulacare/Amministratore/registrazionemedico"  enctype="multipart/form-data" style="padding:35px;">
        <h1>REGISTRAZIONE MEDICO</h1>
<br>
        <h6>Nome</h6>
        <input type="text" id="nome" name="nome" required>
<br><br>
        <h6>Cognome</h6>
        <input type="text" id="cognome" name="cognome" required>
<br><br>
        <h6>Email</h6>
        <input type="email" id="email" name="email" required value="{$email}">
<br><br>
        <h6>Costo</h6>
        <input type="text" id="costo" name="costo" required>
<br><br>
<h6>Tipologia</h6>
	<select name="tipologia" class="form-select">
                            {foreach $tipologie as $tipologia}
                                <option value="{$tipologia.IdTipologia}" {if $tipologia.IdTipologia == $Idtipologia}
                                    selected="selected" {/if}>{$tipologia.nome_tipologia}</option>
                            {/foreach}
                        </select>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Password</label>
        <input type="password" id="password" name="password" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Conferma Password</label>
        <input type="password" id="password" name="cpassword" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Immagine Profilo</label>
        <input type="file" id="imgprofilo" name="imgprofilo" style="background-color: white;">
<br><br>
        <button type="submit" name="register" class="btn btn-primary">REGISTRA MEDICO</button>
    </form>
{/block}