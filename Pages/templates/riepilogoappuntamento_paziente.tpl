{extends file="layout_paziente.tpl"}

{block name=content}

    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Riepilogo Dettagli Appuntamento</h2>
                        <br>
                            <h3>Esame: Visita Cardiologica</h3>
                            <br>
                            <h3>Medico: Emanuele Papile&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;5/5</h3>
                            <br>
                            <h3>Costo: 70€</h3>
                            <br>
                            <h3>Data: 07/08/24</h3>
                            <br>
                            <h3>Ora: 11:30</h3>
                            <br><br><br>
                            <div >
                                <button type="submit" class="btn btn-primary" id="annulla">Annulla</button>
                                &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                         </div>
                </div>

            </div>
        </div>
    </div>

{/block}