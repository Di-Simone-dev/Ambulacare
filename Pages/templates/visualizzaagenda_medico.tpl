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
                    <th scope="col">Nome Paziente</th>
                    <th scope="col">Cognome Paziente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $appuntamenti as $appuntamento}
                    <tr>
                        <td>{$appuntamento.paziente.nome}</td>
                        <td>{$appuntamento.paziente.cognome}</td>
                        <td>{$appuntamento.data}</td>
                        <td>{$appuntamento.orario}</td>
                        <td>{$appuntamento.categoria}</td>
                        <td><a href=""><button
                                    class="btn btn-primary">Modifica</button></a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}