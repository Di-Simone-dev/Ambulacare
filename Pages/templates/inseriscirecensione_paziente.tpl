{extends file="layout_paziente.tpl"}

{block name=content}

    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Medico : {$medico.nome} {$medico.cognome}</h2>
                <br>
                <h2>Categoria : {$medico.nometipologia} &ensp;&ensp;&ensp;&ensp;Costo: {$medico.costo}€</h2>
                <br>
                <form action="/Ambulacare/Paziente/conferma_recensione" method="post">
                    <div class="form-group"></div>
                    <h4><label>Oggetto : </label>
                        <input id="oggetto" name="titolo" style="width: 800px;height: 35px;">
                    </h4>
                    <br><br>
                    <h4><label>Contenuto :</label>
                        <input id="contenuto" name="contenuto" style="width: 800px;height: 170px;">
                    </h4>
                    <br><br>
                    <h4><label>Valutazione : </label></h4>
                    <fieldset class="rating rating-label">
                        <legend><span class="visually-hidden">Valutazione</span> <span class="visually-hidden">4
                                stelle</span> <span class="visually-hidden">su 5</span></legend>
                        <input type="radio" id="star5b" name="voto" value="5" />
                        <label class="full" for="star5b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 5 stelle su 5</span>
                        </label>
                        <input type="radio" id="star4b" name="voto" value="4" checked />
                        <label class="full" for="star4b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 4 stelle su 5</span>
                        </label>
                        <input type="radio" id="star3b" name="voto" value="3" />
                        <label class="full" for="star3b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 3 stelle su 5</span>
                        </label>
                        <input type="radio" id="star2b" name="voto" value="2" />
                        <label class="full" for="star2b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 2 stelle su 5</span>
                        </label>
                        <input type="radio" id="star1b" name="voto" value="1" />
                        <label class="full" for="star1b">
                            <svg class="icon icon-lg">
                                <use href="/Ambulacare/Pages/bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 1 stelle su 5</span>
                        </label>
                    </fieldset>
                    <input type="hidden" name="IdMedico" value="{$medico.IdMedico}">
                    <br><br><br>
                    <div>
                    <input type="hidden" name="IdMedico" value="{$medico.IdMedico}">
                        <a href="/Ambulacare/Paziente/visualizza_appuntamenti_effettuati" class="btn btn-primary" id="annulla">Annulla</a>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" id="conferma">Conferma</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

{/block}