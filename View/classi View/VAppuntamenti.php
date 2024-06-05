<?php


/**
 * Classe che si occupa dell'input-output dei contenuti riguardanti gli appuntamenti.
 * Inoltre fornisce a Smarty contenuti per la popolare i template
 * @package View
 */
class VGestioneAnnunci
{

    private $smarty;

    /**
     * VGestioneAnnunci constructor.
     */
    public function __construct()
    {
        $this->smarty = StartSmarty::configuration();
    }
    /**
     * Funzione che permette di acquisire gli eventuali dati immessi nel campo input, aventi name=spazio
     * @return mixed|null
     */
    public function getSpazio(){
        $value = null;
        if (isset($_POST['spazio']))
            $value = $_POST['spazio'];
        return $value;
    }
    /**
     * Funzione che permette di acquisire gli eventuali dati immessi nel campo input, aventi name=peso
     * @return mixed|null
     */
    public function getPeso(){
        $value = null;
        if (isset($_POST['peso']))
            $value = $_POST['peso'];
        return $value;
    }


    /**
     * Funzione che permette di visualizzare la form di modifica dell'appuntamento
     * @param $annuncio oggetto annuncio i cui valori verranno modificati
     * @throws SmartyException
     */
    public function modificaForm($annuncio){
        $this->smarty->assign('annuncio', $annuncio);
        $this->smarty->assign('userlogged', 'loggato');
        $this->smarty->display('modifica_appuntamento.tpl');

    }
    /**
     * Metodo richiamato quando un cliente o un trasportatore creano un annuncio.
     * In caso di errori nella compilazione dei campi dell'annuncio, verrà ricaricata la stessa pagina con un messaggio esplicativo
     * dell'errore commesso in fase di compilazione.
     * @param $utente oggetto utente che effettua l'inserimento dei dati nei campi dell'annuncio
     * @param $error codice di errore con svariati significati. In base al suo valore verrà eventualmente visualizzato un messaggio
     * di errore nella pagina di creazione dell'annuncio
     * @throws SmartyException
     */
    public function showFormCreation($utente,$error)
    {
        if (get_class($utente) == "ETrasportatore") {
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
            $this->smarty->assign('nome', $utente->getName());
            $this->smarty->assign('cognome', $utente->getSurname());
            $this->smarty->assign('userlogged', "loggato");
            $this->smarty->display('scrivi_annuncio_trasp.tpl');
        }
        elseif (get_class($utente) == "ECliente") {
            $this->stato_form($error);
            $this->smarty->assign('nome', $utente->getName());
            $this->smarty->assign('cognome', $utente->getSurname());
            $this->smarty->assign('userlogged', "loggato");
            $this->smarty->display('scrivi_annuncio_cliente.tpl');
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
