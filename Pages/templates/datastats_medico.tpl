{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Medico/" method="post">
                    <div class="form-group">
                        <h2>Inserire un intervallo di date per visualizzarne le relative statistiche</h2>
                        <br>
                        <input type="date" id="datainizio" placeholder="Data Inizio" name="datainizio" />
                        <br><br><br>
                        <input type="date" id="datafine" placeholder="Data Fine" name="datafine" />
                        <br><br><br>
                        <button class="btn btn-primary" type="submit">Visualizza statistiche <br>nell'intervallo
                            selezionato</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{/block}