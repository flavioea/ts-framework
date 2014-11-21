<?php 
/**
 * Classe modelo de usuário. tem o objetivo de conectar ao banco de dados
 * recuperar, inserir, alterar e apagar os dados dos usuários existentes lá.
 */
class User  {
 
    /**
     * Método criado para listar os usuários
     * existentes na tabela de usuários do banco de dados.
     */
    public function catalog($conditions = array()) {
        # Cria uma conexão usando a configuração
        # "padrao" da classe Config em Config.php
        $db = Database::create('default');
 
        # Começa a montar o select
        $sql = "SELECT * FROM users";
 
        # Monta o Where de acordo com a
        # lista de condições. Funciona 
        # apenas com o operador =.
        # Você pode melhorar isso... :D
        $where = array();
        foreach($conditions as $key => $value) {
          $where = "{$key} = {$value}";
        }
 
        if ($where != array()) {
          $where = " WHERE " . implode(' AND ', $where);
        }
        else {
          $where = '';
        }
        # Termina de montar o SQL
        $sql .= $where;
 
        # Executa o SQL e retorna a lista de usuarios
        $arrList = array();
        $result = $db->query($sql);
        while ($row = $result->fetch_assoc()) {
          $arrList[] = $row;
        }
 
        return $arrList;
    }
 
    /**
     * Método criado para encontrar um usuário usando seu ID.
     * Usa o método `list` para isso.
     */
    public function find($id) {
        $condition = array('id' => $id);
        $item = self::catalog($condition);
        return $item[0];
    }
 
    /*
     * Aqui você criaria outros métodos como inserir, salvar e apagar, 
     * que não entram em nosso exemplo
     */
 
}