{extends file="layout.tpl"}
{block name=body}
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>Medico : Emanuele Papile</h2>
                <br>
                <h2>Categoria : Neurologia &ensp;&ensp;&ensp;&ensp;Costo: 70€</h2>
                <br>
                <h2>Data : 01/06/2024 &ensp;&ensp;&ensp;&ensp; Ora: 11:30</h2>
                <br>
                <form action="#">
                    <div class="form-group"></div>
                    <label for="oggetto">Oggetto : </label>
                    <input id="oggetto" name="oggetto" placeholder="Oggetto" style="width: 800px;height: 35px;">
                    <br><br><label for="contenuto">Contenuto :</label>
                    <input id="contenuto" name="contenuto" placeholder="Scrivi qua" style="width: 800px;height: 170px;">
                    <br><br>
                    <h2>Valutazione : </h2>
                    <br>
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Annulla</button>
                    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                    <button type="submit" class="btn btn-primary" style="width: 140px;height: 35px;">Conferma</button>
            </div>
            </form>
        </div>
    </div>
{/block}