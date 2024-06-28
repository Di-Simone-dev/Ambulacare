{extends file="layout_paziente.tpl"}

{block name=content}

    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Riepilogo Appuntamento</h2>
                <br>
                <h3>Esame: {$nomeEsame}</h3>
                <br>
                <h3>Medico: {$nomeMedico}&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;{$valutazioneMedico}/5</h3>
                <br>
                <h3>Costo: {$costo}€</h3>
                <br>
                <h3>Data: {$data}</h3>
                <br>
                <h3>Ora: {$orario}</h3>
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