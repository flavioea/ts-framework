<html>
	<head>
		<!-- 
	        Imprime a variável $titulo armazenada no mecanismo de visão
	    -->
		<title><?php echo $pageTitle; ?></title>
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

		<div class="content">
			<!-- todo -->
			