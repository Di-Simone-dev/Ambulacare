{extends file="layout_medico.tpl"}

{block name=content}

    <h2>Profilo Personale - Dott. Emanuele Papile</h2>
    <div>
        <h4>Informazioni Personali</h4>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>
        <p style='font-size:20px; font-family:monospace;'>{$medico.nome}</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>
        <p style='font-size:20px; font-family:monospace;'>{$medico.cognome}</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>
        <p style='font-size:20px; font-family:monospace;'>{$medico.email}</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Costo:</p>
        <p style='font-size:20px; font-family:monospace;'>{$medico.costo}€</p>
        <a href=''><button class='btn btn-primary' style='width:195px;'>Logout</button></a>
        <a href=''><button class='btn btn-primary' style='width:195px;'>Modifica Dati</button></a>
        <a href=''><button class='btn btn-primary' style='width:195px;'>Reimposta Password</button></a>
    </div>

{/block}