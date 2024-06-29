{extends file="layout_paziente.tpl"}

{block name=content}
    <div style="padding:35px;">
    <h2> Profilo Personale - Sig. {$nome} {$cognome}</h2>
    <h4>Informazioni Personali </h4>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>
                <p style='font-size:20px; font-family:monospace;'>{$nome}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>
                <p style='font-size:20px; font-family:monospace;'>{$cognome}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>
                <p style='font-size:20px; font-family:monospace;'>{$email}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Codice Fiscale:</p>
                <p style='font-size:20px; font-family:monospace;'>{$codicefiscale}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Data di Nascita:</p>
                <p style='font-size:20px; font-family:monospace;'>{$data}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Luogo di Nascita:</p>
                <p style='font-size:20px; font-family:monospace;'>{$luogonascita}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Residenza:</p>
                <p style='font-size:20px; font-family:monospace;'>{$residenza}</p>
                <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Telefono:</p>
                <p style='font-size:20px; font-family:monospace;'>{$telefono}</p>
                <a href=''><button class='btn btn-primary' style='width:195px;'>Logout</button></a>
                <a href=''><button class='btn btn-primary' style='width:195px;'>Modifica Dati</button></a>
                <a href=''><button class='btn btn-primary' style='width:195px;'>Reimposta Password</button></a>
             </div>
{/block}