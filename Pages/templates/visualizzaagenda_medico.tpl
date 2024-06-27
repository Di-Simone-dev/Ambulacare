{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <h2>Agenda</h2>
                        <br>
                        <input type="date" id="dataprenot" name="dataprenot" />
                        <br><br>
                        <button type="submit" class="btn btn-primary">Filtra Risultati</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <div>
        <table class="table">
            <thead style="text-align: center;">
                <tr>
                    <th scope="col">Nome e Cognome Paziente</th>
                    <th scope="col">Data e Ora</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $appuntamenti as $appuntamento}
                    <tr>
                        <td>{$appuntamento.nominativo_paziente}</td>
                        <td>{$appuntamento.data_ora_appuntamento}</td>
                        <td>{$appuntamento.costo}</td>
                        <td><a href="/Ambulacare/Medico/dettagli_appuntamento_modifica/{$appuntamento.IdAppuntamento}" class="btn btn-primary">Modifica</a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}