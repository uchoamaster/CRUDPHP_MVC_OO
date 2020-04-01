<!-- Conteudo da Pagina -->
<section class="content-header">
<h1>
	Dashboard <i class="fa fa-tachometer-alt"></i>
</h1>
</section>

<!-- Main content -->
<section class="content container-fluid">

	<div class="box">
		<div class="box-header">
			<div class="box-title">Listagem</div>
			<div class="box-tools">
				<a href="<?php echo BASE_URL ?>home/add" class="btn btn-success">
					Adicionar
				</a>
			</div>	
	</div>
	<div class="box-body">
		<table class="table table-hover" width="100%" border="0">
			<thead>
				<tr>
					<th>Nome:</th>
					<th>E-mail:</th>
					<th>CPF:</th>
					<th>Dt. de Nascimento:</th>
					<th>Telefone:</th>
					<th>Ações:</th>
				</tr>
			</thead>
			<?php foreach ($list as $people):  ?>
				<tr>
					<td><?php echo $people['name']; ?></td>
					<td><?php echo $people['email']; ?></td>
					<td><?php echo $people['cpf']; ?></td>
					<td><?php echo date('d/m/Y',strtotime($people['birth'])); ?></td>
					<td><?php echo $people['phone']; ?></td>
					<td class="btn-group">
						<a href ="<?php echo BASE_URL. 'home/edit/'.$people['id'] ?>" class="btn btn-xs btn-primary">
						Editar
					</a>
					    <a href ="<?php echo BASE_URL. 'home/delete/'.$people['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Tem certeza que deseja Excluir?')">
						Excluir
					</a>
					</td>
				</tr>
			<?php endforeach; ?>	
		</table>
	</div>

</div>

</section>