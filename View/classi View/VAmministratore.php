<?php

/**
 * La classe VAmministratore si occupa dell'input-output per la sezione privata dell'amministratore
 */
class VAdmin
{
    private $smarty;
    /**
     * Funzione che inizializza e configura smarty.
     */
    function __construct ()
    {
        $this->smarty = StartSmarty::configuration();
    }

    /**
     * Restituisce l'email dell'utente da bannare/riattivare dal campo hidden input
     * Inviato con metodo post
     * @return string contenente l'email dell'utente
     */
    function getEmail(){
        $value = null;
        if (isset($_POST['email']))
            $value = $_POST['email'];
        return $value;
    }

    /**
     * Restituisce l'id della recensione da eliminare (proviene dal campo input hidden)
     * Inviato con metodo post
     * @return string contenente l'id della recensione
     */
    function getId(){
        $value = null;
        if (isset($_POST['valore']))
            $value = $_POST['valore'];
        return $value;
    }

	/**
	 * Funzione che permette di visualizzare la pagina home dell'admin (contenente tutti gli utenti della piattaforma),divisi in attivi e bannati.
	 * @param $utentiAttivi array di utenti attivi
	 * @param $utentiBannati array di utenti bannati
	 * @param $img_attivi array di immagini degli utenti attivi
	 * @param $img_bann array di immagini degli utenti bannati
	 * @throws SmartyException
	 */
    public function HomeAdmin($utentiAttivi, $utentiBannati,$img_attivi,$img_bann) {
		list($typeA,$pic64att) = $this->SetImageRecensione($img_attivi);
		if ($typeA == null && $pic64att == null)
			$this->smarty->assign('immagine', "no");
		if (isset($img_attivi)) {
			if (is_array($img_attivi)) {
				$this->smarty->assign('typeA', $typeA);
				$this->smarty->assign('pic64att', $pic64att);
				$this->smarty->assign('n_attivi', count($img_attivi) - 1);
			}
			else {
				$this->smarty->assign('typeA', $typeA);
				$this->smarty->assign('pic64att', $pic64att);
			}
		}
		else
			$this->smarty->assign('n_attivi', 0);
		list($typeB,$pic64ban) = $this->SetImageRecensione($img_bann);
		if ($typeB == null && $pic64ban == null)
			$this->smarty->assign('immagine_1', "no");
		if (isset($img_bann)) {
			if (is_array($img_bann)) {
				$this->smarty->assign('typeB', $typeB);
				$this->smarty->assign('pic64ban', $pic64ban);
				$this->smarty->assign('n_bannati', count($img_bann) - 1);
			}
			else {
				$this->smarty->assign('typeB', $typeB);
				$this->smarty->assign('pic64ban', $pic64ban);
			}
		}
		else
			$this->smarty->assign('n_bannati', 0);
        $this->smarty->assign('utenti',$utentiAttivi);
        $this->smarty->assign('utentiBan',$utentiBannati);
        $this->smarty->display('admin_HP.tpl');
    }


	/**
	 * Funzione che permette di visualizzare la lista delle recensioni presenti nel database
	 * @param $rec array di recensioni
	 * @param $img array di immagini
	 * @throws SmartyException
	 */
    public function showRevPage($rec,$img){

		list($typeA,$pic64att) = $this->SetImageRecensione($img);
		if ($typeA == null && $pic64att == null)
			$this->smarty->assign('immagine', "no");
		if (isset($img)) {
			if (is_array($img)) {
				$this->smarty->assign('typeA', $typeA);
				$this->smarty->assign('pic64att', $pic64att);
				$this->smarty->assign('n_attivi', count($img) - 1);
			}
			else {
				$this->smarty->assign('typeA', $typeA);
				$this->smarty->assign('pic64att', $pic64att);
			}
		}
        $this->smarty->assign('recensioni',$rec);
        $this->smarty->display('admin_recensioni.tpl');
    }

	







}
