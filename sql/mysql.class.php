<?php

/**
 * Una simple clase MySQL sin pretenciones. Conectarse y ejecutar una query.
 * Abstenerse para usar en producción...
 */
Class My_Mysql {
    
    public function __construct($user = "root", $pass = "", $host = "localhost", $db = "municipios") {
        $this->user = $user;
        $this->pass = $pass;
        $this->host = $host;
        $this->db = $db;
    }
    
    public function connect() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if($this->link->connect_errno > 0){
            die('No se ha podido conectar a la BD: [' . $this->link->connect_error . ']');
        }
    }
    
    public function run($sql) {
       if(!$this->result = $this->link->query($sql)){
            die('Tienes un error en la consulta SQL: [' . $this->link->error . ']');
        }
    }
    
    public function __destruct() {
        $this->link->close();
    }
    
    public $result;
    
    private $user;
    private $pass;
    private $host;
    private $db;
    private $link;
    
}