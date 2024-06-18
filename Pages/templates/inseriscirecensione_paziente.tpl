{extends file="layout_paziente.tpl"}

{block name=content}

    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Medico : {$esame.medico}</h2>
                <br>
                <h2>Categoria : {$esame.categoria} &ensp;&ensp;&ensp;&ensp;Costo: {$esame.costo}€</h2>
                <br>
                <h2>Data : {$esame.data} &ensp;&ensp;&ensp;&ensp; Ora: {$esame.orario}</h2>
                <form action="#">
                    <div class="form-group"></div>
                    <h4><label>Oggetto : </label>
                        <input id="oggetto" name="oggetto" style="width: 800px;height: 35px;">
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
                        <input type="radio" id="star5b" name="ratingB" value="5" />
                        <label class="full" for="star5b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 5 stelle su 5</span>
                        </label>
                        <input type="radio" id="star4b" name="ratingB" value="4" checked />
                        <label class="full" for="star4b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 4 stelle su 5</span>
                        </label>
                        <input type="radio" id="star3b" name="ratingB" value="3" />
                        <label class="full" for="star3b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 3 stelle su 5</span>
                        </label>
                        <input type="radio" id="star2b" name="ratingB" value="2" />
                        <label class="full" for="star2b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 2 stelle su 5</span>
                        </label>
                        <input type="radio" id="star1b" name="ratingB" value="1" />
                        <label class="full" for="star1b">
                            <svg class="icon icon-lg">
                                <use href="bootstrap-italia/svg/sprites.svg#it-star-full"></use>
                            </svg>
                            <span class="visually-hidden">Valuta 1 stelle su 5</span>
                        </label>
                    </fieldset>
                    <br><br><br>
                    <div style="position: absolute;left: 550px;">
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                        &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                        <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
    </div>

{/block}