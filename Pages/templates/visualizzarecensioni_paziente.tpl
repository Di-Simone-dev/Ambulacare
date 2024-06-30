{extends file="layout_paziente.tpl"}

{block name=content}
    
    <br><br>
    <div style="padding:35px;">
	<h2>Le mie Recensioni</h2>
<br><br>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Medico</th>
                    <th scope="col">Data e Ora</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            {foreach $recensioni as $recensione}
                <tr>
                    <td><img style="padding:2px" class="rounded-circle ml-3" width="60" height="60" src="data:{$medico.tipoimmagine};base64,{$medico.img}" alt="profile picture" />{$recensione.nominativomedico}</td>
                    <td>{$recensione.data_ora}</td>
                    <td>{$recensione.valutazione}/5&#9733;</td>
                    <td><a href="/Ambulacare/Admin/recensione/{$recensione.id}" class="btn btn-primary">Dettagli</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{/block}