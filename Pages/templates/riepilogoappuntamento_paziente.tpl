{extends file="layout_paziente.tpl"}

{block name=content}

    <br>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Riepilogo Dettagli Appuntamento</h1>
                <br>
                <h2>Esame: {$esame.nome}</h2>
                <br>
                <h2>Medico: {$esame.medico.nome}&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;Valutazione:{$esame.medico.valutazione}/5</h2>
                <br>
                <h2>Costo: {$esame.costo}€</h2>
                <br>
                <h2>Data: {$esame.data}</h2>
                <br>
                <h2>Ora: {$esame.orario}</h2>
                <br><br><br>
                <div>
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                </div>

            </div>
        </div>
    </div>

{/block}