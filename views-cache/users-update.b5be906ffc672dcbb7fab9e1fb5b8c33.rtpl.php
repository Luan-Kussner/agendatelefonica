<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Lista de Contatos
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
  	<div class="col-md-12">
  		<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Editar Contato</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="/admin/users/<?php echo htmlspecialchars( $id_contato["id_contato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" method="post">
          <div class="box-body">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" value="<?php echo htmlspecialchars( $user["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?>">
            </div>

            <div class="form-group">
              <label for="id_cargo">Cargo
                <select name="id_cargo" id="id_cargo">
                  <option>Selecione o Cargo</option>
                  <option value="5">SUPORTE TI</option>
                  <option value="6">DEV</option>
                  <option value="7">ESTAGIARIO</option>
                </select>

            <!-- <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite o cargo"> -->
            </label>
            </div>



            <div class="form-group">
              <label for="numero">Telefone</label>
              <input type="tel" class="form-control" id="numero" name="numero" placeholder="Digite o Telefone">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite o E-mail">
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" name="status" value="1"> Status
              </label>
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
  	</div>
  </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->