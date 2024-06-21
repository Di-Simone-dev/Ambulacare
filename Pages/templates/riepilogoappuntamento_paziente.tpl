{extends file="layout_paziente.tpl"}

{block name=content}

    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Riepilogo Dettagli Appuntamento</h2>
                <br>
                <h3>Esame: {$esame.nome}</h3>
                <br>
                <h3>Medico: {$esame.medico.nome}&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;{$esame.medico.valutazione}/5</h3>
                <br>
                <h3>Costo: {$esame.costo}€</h3>
                <br>
                <h3>Data: {$esame.data}</h3>
                <br>
                <h3>Ora: {$esame.orario}</h3>
                <br><br><br>
                <div>
                    <form action="" method="post">
                        <a href="" class="btn btn-primary" id="annulla">Annulla</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>

{/block}