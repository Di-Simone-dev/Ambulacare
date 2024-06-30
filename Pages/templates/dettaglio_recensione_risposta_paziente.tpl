{extends file="layout_medico.tpl"}

{block name=content}
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>{$recensione.titolo}</h2>
                <h3>{$recensione.contenuto}</h3>
                <h3>Data : {$recensione.data_ora}</h3>
		<h3>Valutazione : {$recensione.valutazione}/5&#9733;</h3>
                <br>
		{if $crisposta == TRUE}
                	<h2>Risposta</h2>
			<h3>Medico: {$risposta.nominativomedico}</h3>
                	<h3>Risposta: {$risposta.contenutorisposta}</h3>
                    	</h4>
		{/if}
                    <br><br>
                    <div>
                        <a href="/Ambulacare/Paziente/visualizza_recensioni" class="btn btn-primary" id="annulla">Indietro</a>
                    </div>
        </div>
    </div>
    </div>
{/block}