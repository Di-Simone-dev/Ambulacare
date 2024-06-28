{extends file="layout_medico.tpl"}

{block name=content}
    
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Medico/ricerca_pazienti" method="post">
                    <div class="form-group" >
                    <h2>Ricerca Pazienti</h2>
                    <br>
                        <input type="text" id="nomepaziente" placeholder="Nome Paziente" name="nome" required>
                        <br><br>
                        <input type="text" id="cognomepaziente" placeholder="Cognome Paziente" name="cognome" required>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Avvia Ricerca Paziente</button>
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
                    <th scope="col">Data Di Nascita</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
            {foreach $pazienti as $paziente}
                <tr>
                    <td>{$paziente.nomepaziente}</td>
                    <td>{$paziente.cognomepaziente}</td>
                    <td>{$paziente.data_nascita}</td>
                    <td><a href="/Ambulacare/Medico/dettagli_storico_paziente/{$paziente.IdPaziente}" class="btn btn-primary">Visualizza Storico Esami</a></td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>

{/block}