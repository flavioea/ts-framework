<?php
 
/**
 * A classe View é responsável por armazenar dados
 * para apresentação num determinado arquivo de
 * visão PHP.
 */

class View {
	
	/**
     *  Lista de dados para serem recuperados e impressos dentro de uma View.
     */
    public $data = array();

    /**
     * Adiciona o valor de uma variável com um nome dentro da lista de dados.
     * 
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function set($name, $value) {
        $this->data[$name] = $value;
    }

    /**
     * Faz a mesma coisa que o método set, mas usando referências, permitindo que 
     * as alterações na variável fora da classe sejam realizadas também no valor
     * armazenado na lista de dados.
     *
     * @param string $name
     * @param mixed $value
     * @return void
     */
    public function bind($name, &$value) {
        # Armazena o valor da variável como referência.
        $this->data[$name] = &$value;
    }

    /**
     * Recupera um valor armazenado na lista de dados através de seu nome.
     *
     * @param string $name
     * @return mixed
     */
    public function get($name = '') {
 
        # Se não existir nenhuma variável com o nome indicado como parâmetro,
        # o método retorna uma string vazia.
        if ($name == '') {
            return $this->data;
        }
        else {
            if (isset($this->data[$name]) && ($this->data[$name] != '')) {
                return $this->data[$name];
            }
            else {
                return '';
            }
        }
    }

    /**
     * Renderiza um arquivo de visão específico com as variáveis armazenadas 
     * internamente. Como resultado, envia conteúdo HTML para o navegador do usuário.
     *
     * @param string $filename
     * @return void
     */
    public function render($filename) {
        # Transforma cada item armazenado na lista de dados em variáveis locais
        foreach($this->get() as $key => $item) {
            $$key = $item;
        }
 
        # Procura o arquivo php dentro da pasta `Views`. Se o arquivo existir, inclui 
        # o mesmo dentro da função, executando e rederizando o conteúdo dele.
        if (file_exists(APP . DS . 'Views' . DS . $filename . '.php')) {
            include APP . DS . 'Views' . DS . $filename . '.php';
        }
    }

}