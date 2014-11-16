<?php
 
/**
 * Classe controller base para todos
 * os controllers do nosso MVC em PHP.
 * Ela serve para compartilhar código
 * entre todos os controllers.
 */
class Controller {
 
    /**
     * Método index padrão usado
     * em todos os controllers.
     */
    public function index() {
        die("Método <strong>index()</strong> do Controller base!");
    }
 
}