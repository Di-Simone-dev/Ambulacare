<?php
/* IL FILE è ANCORA IN FASE DI ELABORAZIONE, MOLTE RIGHE DI CODICE SONO STATE COPIATE
DAI FILE DI AGORA E FILLSPACEWEB */ 


/**
 * Classe che si occupa dell'input-output dei contenuti riguardanti gli appuntamenti.
 * Inoltre fornisce a Smarty contenuti per la popolare i template
 * @package View
 */
class VAppuntamenti
{

    private $smarty;

    /**
     * VAppuntamenti constructor.
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }
    /**
     * Funzione che permette di acquisire gli eventuali dati immessi nel campo input, aventi name=data e name=ora
     * @return mixed|null
     */
    public function getDataOra(){
        $value = null;
        if (isset($_POST['data']) && isset($_POST['ora'])){
            $value = $_POST['data'];
            $value = $_POST['ora'];
        }
        return $value;
    }


    /**
     * Funzione che permette di visualizzare la form di modifica dell'appuntamento
     * @param $appuntamento oggetto appuntamento i cui valori verranno modificati
     * @throws SmartyException
     */
    public function modificaForm($appuntamento){
        $this->smarty->assign('appuntamento', $appuntamento);
        $this->smarty->assign('userlogged', 'loggato');
        $this->smarty->display('modifica_appuntamento.tpl');

    }
    /**
     * Metodo richiamato quando un paziente prenota un appuntamento.
     * In caso di errori nella compilazione dei campi dell'appuntamento, verrà ricaricata la stessa pagina con un messaggio esplicativo
     * dell'errore commesso in fase di compilazione.
     * @param $paziente oggetto paziente che effettua l'immissione dei dati nei campi dell'appuntamento
     * @param $error codice di errore con svariati significati. In base al suo valore verrà eventualmente visualizzato un messaggio
     * di errore nella pagina di creazione dell'annuncio
     * @throws SmartyException
     */
    public function showFormCreation($paziente,$error)
    {
        if (get_class($paziente) == "EPaziente") {
            switch ($error) {
                case "type" :
                    $this->smarty->assign('errorType', "errore");
                    break;
                case "size" :
                    $this->smarty->assign('errorSize', "errore");
                    break;
                case "no" :
                    $this->smarty->assign('successo', "si");
                    break;
                case "no_part_arrivo":
                    $this->smarty->assign('part_arrivo', "errore");
                    break;
                case "no_tappe":
                    $this->smarty->assign('tappe', "errore");
                    break;
            }
            $this->smarty->assign('nome', $paziente->getNome());
            $this->smarty->assign('cognome', $paziente->getCognome());
            $this->smarty->assign('userlogged', "loggato");
            $this->smarty->display('prenota_esame.tpl');
        }

    }

    /**
     * Funzione utile per gestire i vari errori possibili dovuti dall'inserimento dei dati nella form
     * @param $error
     */
    public function stato_form($error) {
        switch ($error) {
            case "type" :
                $this->smarty->assign('errorType', "errore");
                break;
            case "size" :
                $this->smarty->assign('errorSize', "errore");
                break;
            case "no" :
                $this->smarty->assign('successo', "si");
                break;
            case "no_part_arrivo":
                $this->smarty->assign('part_arrivo', "errore");
                break;
            case "no_tappe":
                $this->smarty->assign('tappe', "errore");
                break;
        }
    }
}
?>
