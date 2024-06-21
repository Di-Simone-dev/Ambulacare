{extends file="layout_paziente.tpl"}

{block name=content}
    <div>
    <h2> Profilo Personale - Sig. Andrea Iannotti</h2>
    <h4>Informazioni Personali </h4>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>
                <p style='font-size:20px; font-family:monospace;'>{$paziente.nome}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>
                <p style='font-size:20px; font-family:monospace;'>{$paziente.cognome}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>
                <p style='font-size:20px; font-family:monospace;'>{$paziente.email}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Codice Fiscale:</p>
                <p style='font-size:20px; font-family:monospace;'>{$paziente.codicefiscale}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Data di Nascita:</p>
                <p style='font-size:20px; font-family:monospace;'>{$paziente.data}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Luogo di Nascita:</p>
                <p style='font-size:20px; font-family:monospace;'>{$paziente.luogonascita}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Residenza:</p>
                <p style='font-size:20px; font-family:monospace;'>{$paziente.residenza}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Telefono:</p>
                <p style='font-size:20px; font-family:monospace;'>{$paziente.telefono}</p>
                <a href=''><button class='btn btn-primary' style='width:195px;'>Logout</button></a>
                <a href=''><button class='btn btn-primary' style='width:195px;'>Modifica Dati</button></a>
                <a href=''><button class='btn btn-primary' style='width:195px;'>Reimposta Password</button></a>
             </div>
{/block}