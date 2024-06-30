{extends file="layout_admin.tpl"}

{block name=content}
    <br><br><br>
    <form method="post" action="/Ambulacare/Amministratore/registrazionemedico" >
        <h1>REGISTRAZIONE</h1>
        <h6>Nome</h6>
        <input type="text" id="nome" name="nome" required>
        <h6>Cognome</h6>
        <input type="text" id="cognome" name="cognome" required>
        <h6>Email</h6>
        <input type="email" id="email" name="email" required>
        <h6>Costo</h6>
        <input type="number" id="email" name="costo" required>
        <select name="tipologia" id="tipologia" class="form-select-m">
            {foreach $tipologie as $tipologia}
                <option value="{$tipologia.IdTipologia}">{$tipologia.nome_tipologia}</option>
            {/foreach}
        </select>
        <button type="submit" name="register" style="width: 100px;">REGISTRATI</button>
    </form>

{/block}