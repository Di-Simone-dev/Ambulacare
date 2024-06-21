{extends file="layout_admin.tpl"}

{block name=content}

    <br><br>
    <div>
        <h2>Profilo Personale - Amministratore - Andrea Luca di Simone</h2>
        <h4>Informazioni Personali</h4>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>
        <p style='font-size:20px; font-family:monospace;'>{$nome}</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>
        <p style='font-size:20px; font-family:monospace;'>{$cognome}</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>
        <p style='font-size:20px; font-family:monospace;'>{$eamil}</p>
        <a href='' class='btn btn-primary' style='width:195px;'>Logout</a>
        <a href='' class='btn btn-primary' style='width:195px;'>Modifica Dati</a>
        <a href='' class='btn btn-primary' style='width:195px;'>Reimposta Password</a>

    </div>

{/block}