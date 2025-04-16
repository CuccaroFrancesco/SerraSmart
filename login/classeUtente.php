<?php
class utente
{
    private $username;
    private $nome;
    private $cognome;
    private $ruolo;
    private $idUtente;

    public function __construct($nom,$cognom,$usernam,$ruolo, $ID)
    {
        $this->setNome($nom);
        $this->setCognome($cognom);
        $this->setUsername($usernam);
        $this->setRuolo($ruolo);
        $this->setID($ID);
    }

    public function setNome($nome)
    {
        $this->nome=$nome;
    }
    public function setCognome($cognome)
    {
        $this->cognome=$cognome;
    }
    public function setUsername($username)
    {
        $this->username=$username;
    }
    public function setRuolo($ruolo)
    {
        $this->ruolo=$ruolo;
    }
    public function setID($ID)
    {
        $this->idUtente=$ID;
    }
    
    public function getNome()
    {
        return $this->nome;
    }
    public function getCognome()
    {
        return $this->cognome;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getRuolo()
    {
        return $this->ruolo;
    }
    public function getID()
    {
        return $this->idUtente;
    }
}
?>