{extends file="layout_paziente.tpl"}

{block name=content}
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="/Ambulacare/Paziente/ricercaesame" method="post">
                    <div class="form-group">
                        <br><br>
                        <h2><label>Prenotazione Appuntamenti</label></h2>
                        <br>
                        <select name="tipologia" class="form-select-m">
                            {foreach $tipologie as $tipologia}
                                <option value="{$tipologia.IdTipologia}" {if $tipologia.IdTipologia == $Idtipologia}
                                    selected="selected" {/if}>{$tipologia.nome_tipologia}</option>
                            {/foreach}
                        </select>
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
                    <th scope="col">Medico</th>
                    <th scope="col">Tipologia</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Recensioni</th>
                    <th scope="col">Azione</th>
                </tr>
            </thead>
            <tbody style="text-align: center;">
                {foreach $medici as $medico}
                    <tr>
                        <td><img style="padding:2px" class="rounded-circle ml-3" width="60" height="60"
                                src="data:{$medico.tipoimmagine};base64,{$medico.img}" alt="profile picture" />{$medico.nome} {$medico.cognome}</td>
                        <td>{$medico.nometipologia}</td>
                        <td>{$medico.costo}</td>
                        <td>{if $medico.valutazione.IdMedico}
                                {$medico.valutazione.valutazione}
                            {else}0
                            {/if}/5&#9733;</td>
                        <td><a href="/Ambulacare/Paziente/dettagli_prenotazione/{$medico.IdMedico}"
                                class="btn btn-primary">Prenota</a></td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>

{/block}