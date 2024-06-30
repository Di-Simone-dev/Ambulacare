{extends file="layout_admin.tpl"}

{block name=content}
    <form method="post" action="/Ambulacare/Amministratore/registrazionemedico"  enctype="multipart/form-data" style="width: 600px;padding:35px;">
        <h1>REGISTRAZIONE MEDICO</h1>
<br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nome</label>
        <input type="text" id="nome" name="nome" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
        <input type="text" id="cognome" name="cognome" required>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
        <input type="email" id="email" name="email" required value="{$email}">
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Costo</label>
        <input type="text" id="costo" name="costo" required>
<br><br>
<label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Tipologia</label>
	<select name="tipologia" class="form-select-m">
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