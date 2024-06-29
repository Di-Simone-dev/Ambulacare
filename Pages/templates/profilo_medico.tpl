{extends file="layout_medico.tpl"}

{block name=content}

    <div style="padding:5px;"> <br><br>
	<h2> Profilo Personale - Dr. {$medico.nome} {$medico.cognome}</h2>
        <h4>Informazioni Personali</h4>
	<img class='img' src="{$medico.img}" alt='Foto Profilo' style='width:300px;height:300px;border-radius:50%; float:right; margin-right:150px;'>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>
        <p style='font-size:20px; font-family:monospace;'>{$medico.nome}</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>
        <p style='font-size:20px; font-family:monospace;'>{$medico.cognome}</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>
        <p style='font-size:20px; font-family:monospace;'>{$medico.email}</p>
        <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Costo:</p>
        <p style='font-size:20px; font-family:monospace;'>{$medico.costo}€</p>
        <a class='btn btn-primary' style='width:195px;' href="/Ambulacare/Medico/logout">Logout</a>
        <a class='btn btn-primary' style='width:195px;' href="/Ambulacare/Medico/formSetInfoMedico">Modifica Dati</a>
    </div>

{/block}