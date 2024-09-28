<?php
class ErrorView{
    public function __construct()
    {
        
    }
    public function seeError($error, $redir){
        require_once './templates/error.phtml';
    }
        
}