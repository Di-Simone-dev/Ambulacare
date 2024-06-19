{extends file="layout_medico.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group">
                        <h2>Storico Esami</h2>
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
                    <th scope="col">Paziente</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $esami as $esame}
                    <tr>
                        <td>{$esame.paziente}</td>
                        <td>{$esame.data}</td>
                        <td>{$esame.orario}</td>
                        <td>{$esame.categoria}</td>
                        <td>Carica referto | Cancella referto</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}