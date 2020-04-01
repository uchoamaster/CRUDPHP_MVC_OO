<!-- Conteudo da Pagina -->
<section class="content-header">
<h1>
	Usuários <i class="fa fa-users"></i>
</h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

	<div class="box">
		<div class="box-header">
			<div class="box-title">Listagem</div>
			<div class="box-tools">

			</div>	
	</div>
	<div class="box-body">
		<table class="table table-hover" width="100%" border="0">
			<thead>
				<tr>
					<th>Nome:</th>
					<th>E-mail:</th>
				<!-- 	<th>Password:</th> -->
					<!-- <th>Ações:</th> -->
				</tr>
			</thead>
			<?php foreach ($list as $user):  ?>
				<tr>
					<td><?php echo $user['name']; ?></td>
					<td><?php echo $user['email']; ?></td>
			
				</tr>
			<?php endforeach; ?>	
		</table>
	</div>

</div>

</section>