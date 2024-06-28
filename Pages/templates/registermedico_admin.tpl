{extends file="layout_admin.tpl"}

{block name=content}
    <br><br><br>
    <form method="post" action="/Ambulacare/Amministratore/registrazionemedico" style="width: 600px;">
        <h1 style="font-size: 34px;">REGISTRAZIONE</h1>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Nome</label>
        <input type="text" id="nome" name="nome" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Cognome</label>
        <input type="text" id="cognome" name="cognome" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Email</label>
        <input type="email" id="email" name="email" required>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 16px;font-weight: bold;">Costo</label>
        <input type="number" id="email" name="costo" required>
        <select name="tipologia" id="tipologia" class="form-select">
            {foreach $tipologie as $tipologia}
                <option value="{$tipologia.IdTipologia}">{$tipologia.nome_tipologia}</option>
            {/foreach}
        </select>
        <button type="submit" name="register" style="width: 100px;">REGISTRATI</button>
    </form>

{/block}