<!-- Conteudo da Pagina -->
<section class="content-header">
<h1>
	Novo Usuário <i class="fa fa-users"></i>
</h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

	<form method="POST"  action="<?php echo BASE_URL ?>users/add_action_user">
	
	

	<div class="box">
		<div class="box-header">
			<div class="box-title">Adicionar</div>
			<div class="box-tools">
				<input type="submit" value="Salvar" class="btn btn-success">
			</div>	
	</div>
	<div class="box-body">

		<label for="name">
			Nome:
		</label>
		<input type="text" name="name" id="name" class="form-control"><br>
		<label for="email">
			E-mail:
		</label>
		<input type="email" name="email" id="email" class="form-control"><br>
		<label for="password">
			Password:
		</label>
		<input type="password" name="password" id="password" class="form-control"><br>

	</div>

</div>

</form>

</section>

<script type="text/javascript" src="<?php echo BASE_URL ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('input[name=cpf]').mask("000.000.000-00");
		$('input[name=phone]').mask("(00) 00000-0000");
	});
</script>