{extends file="layout.tpl"}
{block name=content}
        <h1 style="font-size: 45px;text-align: center;">SCELTA UTENTE ACCESSO</h1>
        <div style="display:-webkit-flex;
        display:-moz-flex;
        display:-ms-flex;
        display:flex;
        -webkit-flex-direction:row;
        flex-direction:row;
        -webkit-justify-content:center;
        justify-content:center;
        margin-top: 250px;">
            <a class="w3-btn w3-blue w3-round-xxlarge" href="login.html" style="height: 200px;width: 240px;"><p style="font-family: monospace;font-size: 20px; text-align: center;">PAZIENTE</p></a>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <a class="w3-btn w3-blue w3-round-xxlarge" href="loginmedico.html" style="height: 200px;width: 240px;"><p style="font-family: monospace;font-size: 20px; text-align: center;">MEDICO</p></a>

        </div>
{/block}