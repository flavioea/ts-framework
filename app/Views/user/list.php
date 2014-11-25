
<h1>Lista de Usuários</h1>

<table class="tabela" align="center">
	<tr>
		<th>Nome</th>
		<th>Sobrenome</th>
		<th>Login</th>
	</tr>
    <!-- a variável lista que colocamos dentro da visão -->
    <?php foreach($list as $value['User']) : ?>
    	<tr>
    		<td><?php echo $value['User']->name; ?></td>
    		<td><?php echo $value['User']->last_name; ?></td>
    		<td><?php echo $value['User']->login; ?></td>
    	</tr>
    <?php endforeach; ?>
</table>
