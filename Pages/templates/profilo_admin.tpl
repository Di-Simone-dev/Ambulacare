{extends file="layout_admin.tpl"}

{block name=content}
    
    <br><br>
    <div>
        <h2 style="font-size: 25px;"><b>Informazioni Personali</b> </h2>
                    <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Nome:</p>
                    <p style='font-size:20px; font-family:monospace;'>{$admin.nome}</p>
                    <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Cognome:</p>
                    <p style='font-size:20px; font-family:monospace;'>{$admin.cognome}</p>
                    <p style='font-size:20px;font-family: monospace; font-weight:bold;'> Email:</p>
                    <p style='font-size:20px; font-family:monospace;'>{$admin.eamil}</p>
                    <a href='' class='btn btn-primary' style='width:195px;'>Logout</a>
                    <a href='' class='btn btn-primary' style='width:195px;'>Modifica Dati</a>
                    <a href='' class='btn btn-primary' style='width:195px;'>Reimposta Password</a>
                
                 </div>

{/block}