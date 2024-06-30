{extends file="layout_medico.tpl"}

{block name=content}

    <div style="padding:35px;">
	<h2> Profilo Personale - Dr. {$medico.nome} {$medico.cognome}</h2>
        <h4>Informazioni Personali</h4>
	<img class='img' src="data:{$medico.tipoimmagine};base64,{$medico.img}" alt='Foto Profilo' style='width:300px;height:300px;border-radius:50%;float:right; margin-right:150px;'>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Nome:</label>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$medico.nome}</label>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Cognome:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$medico.cognome}</label>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Email:</label>
                <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$medico.email}</label>
<br><br>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 20px;font-weight: bold;"> Costo:</label>
        <label style="font-style: 'Open Sans', sans-serif;font-size: 18px;">{$medico.costo}€</label>
<br><br>
        <a class='btn btn-primary' style='width:195px;' href="/Ambulacare/Medico/formSetInfoMedico">Modifica Dati</a>
    </div>

{/block}