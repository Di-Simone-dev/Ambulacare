{extends file="layout_medico.tpl"}

{block name=content}
    
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="#">
                    <div class="form-group" >
                    <h2>Ricerca Pazienti</h2>
                    <br>
                        <input type="text" id="nomepaziente" placeholder="Nome Paziente" name="nomepaziente" required>
                        <br><br>
                        <input type="text" id="cognomepaziente" placeholder="Cognome Paziente" name="cognomepaziente" required>
                        
                    <br><br>
                        <select name="ordinaricerca" id="ordina" class="form-select" required>
                            <option value="">Ordina per...</option>
                            <option value="nome">Nome</option>
                            <option value="cognome">Cognome</option>
                        </select>
                    <br>
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
                    <td>{$paziente.nome}</td>
                    <td>{$paziente.cognome}</td>
                    <td>{$paziente.datanascita}</td>
                    <td><a href=""><button class="btn btn-primary">Visualizza Storico Esami</button></a></td>
                </tr>
            </tbody>
        </table>
    </div>

{/block}