{extends file="layout_paziente.tpl"}

{block name=content}
    
    <br>
    <div class="container">
            <div class="row">
                <div class="col">
                        <h2>Dettagli Recensione</h2>
                        <br>
                            <h3>Oggetto: {$oggettoRecensione}</h3>
                            <br>
                            <h3>Contenuto: {$contenutoRecensione}</h3>
                            <br>
                            <div >
                                <button type="submit" class="btn btn-primary" id="annulla">Indietro</button>
                          
                            </div>
                </div>
            </div>
        </div>

{/block}