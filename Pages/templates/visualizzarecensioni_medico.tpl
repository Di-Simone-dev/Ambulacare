{extends file="layout_medico.tpl"}

{block name=content}
    
    
    <br><br>
    <div style="padding:35px;">
	<h2>Recensioni</h2>
<br><br>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Paziente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valutazione</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            {foreach $recensioni as $recensione}
                <tr>
                    <td>{$recensione.nominativopaziente}</td>
                    <td>{$recensione.data_creazione}</td>
                    <td>{$recensione.valutazione}/5&#9733;</td>
                    <td><a href="/Ambulacare/Medico/dettagli_recensione/{$recensione.IdRecensione}" class="btn btn-primary">Dettagli</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{/block}