<?php
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    require_once("model/Semestre.php");
    require_once("controller/ProdutoController.php");
    require_once("controller/SemestreController.php");
    $pagina = new Pagina();

    $pagina->incluiCabecalho("Stock Planner - Emprestimo de produtos", "emprestimo");
    $semestreController = SemestreController::getInstance();
?>

<div class="container">
    <!--<select class="custom-select custom-select-sm">
        <option value="20">20%</option>
        <option value="50">50%</option>
        <option value="80">80%</option>
    </select>
    <button type="button" class="btn btn-secondary" id="confirma_porcentagem">Confirmar</button>-->
    <div class="row">
        <div class="col-6 col-md-6 col-xl-6 col-sm-6  col-lg-6 texto-titulo">
            <h5>Selecione os produtos emprestados</h5>
        </div>
        <div class="col-6 col-md-6 col-xl-6 col-sm-6  col-lg-6" id="cor-botao">
            <!-- <a href="formulario-emprestimo.php">-->
                <input class="btn btn-primary" type="button" id ="emprestar" value="Emprestar">
            <!-- </a> -->
        </div>
    </div>
   <div class="form-group">
       <label for="parametroFiltro">Filtro</label>
       <select class="form-control" id="parametroFiltro" name="filtro">
             <option value="1">Nome</option>
             <option value="2">Identificação</option>
             <option value="3">CATMAT</option>
             <option value="4">Categoria</option>
             <!-- <option value="5">Posição</option>
             <option value="6">Estoque Ideal</option> -->
             <option value="7">Quantidade</option>
       </select>
  </div>

    <div class="form-group">
        <label for="busca">Busca</label>
        <input name="busca" type="text" class="form-control" id="busca" aria-describedby="emailHelp" placeholder="Busca">
    </div>
        <!--<div class="col-md-8 col-xl-12 col-sm-2 col-2 col-lg-12">-->
        <div class="col-sm-12">
          <table class="table table-borderless table-responsive-md">
              <thead>
                  <tr>
                      <th class="ordenavel sticky"><img src="img/setaBaixo.png" id="setaVazio" ></th>
                      <th class="ordenavel sticky">Nome<img src="img/setaBaixo.png" id="setaNome" ></th>
                      <th class="sticky">Identificação</th>
                      <th class="sticky">CATMAT</th>
                      <th class="sticky">Categoria</th>
                      <!-- <th class="sticky">Posição</th> -->
                      <!-- <th class="sticky">Estoque Ideal</th> -->
                      <th class="ordenavel sticky">Quantidade<img src="img/setaBaixo.png" id="setaQuantidade" ></th>
                      <th class="sticky"></th>
                      <!-- <th class="sticky"></th> -->
                  </tr>
              </thead>
              <tbody>

              <?php
                  $produtoController = ProdutoController::getInstance();

                  $produtos = $produtoController->getProdutos(null,null, 8, null);//tem que ser a tabela sem as colunas comentadas e com a de selecionar

                  echo $produtos;
              ?>

                  </tbody>
              </table>
        </div>
</div>
<?php
    require_once(Config::FOOTER_TEMPLATE);

?>



