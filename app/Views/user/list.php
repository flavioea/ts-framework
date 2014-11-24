<html>
<head>
<title>Lista de Usuários</title>
	<meta charset="utf-8" />

	<style>
		body {
			margin:40px;
		}
		.tabela {
			width: 100%;
			border:1px solid #dedede;
			margin:0;
			padding:0;
			border-collapse: collapse;
		}

		.tabela tr th, .tabela tr td {
			padding:5px;
			border:1px solid #dedede;
		}

		.tabela tr th {
			background-color: #323232;
			color:#fff;
		}

		.tabela tr:nth-child(even) {
			background-color: #f8f8f8;
		}
	</style>
</head>
<body>
	<h1>Lista de Usuários</h1>

	<table class="tabela" align="center">
		<tr>
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>Login</th>
		</tr>
        <!-- a variável lista que colocamos
        dentro da visão -->
        <?php foreach($list as $value['User']) : ?>
        	<tr>
        		<td><?php echo $value['User']->name; ?></td>
        		<td><?php echo $value['User']->last_name; ?></td>
        		<td><?php echo $value['User']->login; ?></td>
        	</tr>
        <?php endforeach; ?>
    </table>
</body>
</html>