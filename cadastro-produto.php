<?php
    require_once("model/Config.php");
    require_once("model/Pagina.php");
    require_once("model/Categoria.php");
    require_once("controller/CategoriaController.php");
    require_once("controller/SemestreController.php");

    $pagina = new Pagina();
    $categoriaController = new CategoriaController();
    $semestreController = new SemestreController();

    $pagina->incluiCabecalho("Stock Planner - Cadastro de produtos", "cadastro-produto");
?>

<div class="container">
    <!-- Criar as linhas e colunas de acordo com necessidade -->

    <div id="principal">
        <form class="formulario-produto" method="post" action="processa-produto.php">
            <input type="text" name="semestre" hidden value="<?= $semestreController->getSemestreAtual(); ?>">
            <div class="form-row">
                <div class="form-group col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
                    <label for="semestre">O produto será cadastrado no</label>
                    <?php
                        if($semestreController->getSemestreAtual()['status'] == 200){
                            echo $semestreController->getSemestreAtual()['dados']->getId();
                        }else{
                            echo "Erro ao buscar o semestre atual";
                        }
                     ?>
                </div>
            </div>
            
        	<div class="form-row">
        		<div class="form-group col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
          			<label for="nome">Nome:</label>
            		<input type="text" class="form-control" name="nome" id="nome" placeholder="">
                    <div class="feedback" id="feedback-nome">

                    </div>
        		</div>
        		<div class="form-group col-md-1"></div>
            <div class="form-group col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
                <label for="catmat">CATMAT:</label>
                <input type="text" class="form-control" name="catmat" id="catmat" placeholder="">
                <div class="feedback" id="feedback-catmat">

                </div>
            </div>
        	</div>

        	<div class="form-row">
        		<div class="form-group col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
          			<label for="identificacao">Identificação:</label>
            		<input type="text" class="form-control" name="identificacao" id="identificacao" placeholder="">
                    <div class="feedback" id="feedback-identificacao">

                    </div>
        		</div>
        		<div class="form-group col-md-1"></div>
            <div class="form-group col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
                <label for="posicao">Localização:</label>
                <input type="text" class="form-control" name="posicao" id="posicao" placeholder="">
                <div class="feedback" id="feedback-posicao">

                </div>
            </div>
        	</div>
        	<div class="form-row">
        		<div class="form-group col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
                    <label for="descricao">Descrição:</label>
                    <textarea class="form-control" name="descricao" id="descricao" placeholder="" ></textarea>
                    <div class="feedback" id="feedback-descricao">
                        okay!
                    </div>
        		</div>

        		<div class="form-group col-md-1"></div>

        		<div class="form-group col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
                    <label for="estoque_ideal">Estoque ideal:</label>
                    <input type="text" class="form-control" name="estoqueIdeal" id="estoque_ideal" placeholder="">
                    <div class="feedback" id="feedback-estoque_ideal">
                    </div>
                </div>
        	</div>
        	<div class="form-row">
        		<div class="form-group col-md-4 col-xl-4 col-sm-9 col-9 col-lg-4">
                   <label for="categoria">Categoria:</label>
                   <select name="categoria" class="custom-select custom-select-sm" id="categoria">
                    <?php

                        $categorias = $categoriaController->getCategorias();
                        if($categorias['status'] == 200){

                            foreach ($categorias['dados'] as $categoria) {
                                echo "<option value = '" . $categoria->getNome()."'>" . $categoria->getNome(). "</option>";
                            }
                        }else{
                            echo "Erro ao buscar as categorias";
                        }
  
                    ?>
                    </select>
                    <div class="feedback">
                        okay!
                    </div>
        		</div>
            <div class="form-group col-md-1 col-xl-1 col-sm-1 col-1 col-lg-1">
                <button id="formato-botao-mais" type="button" data-toggle="modal" data-target="#exampleModal">
                  <i class="material-icons">add</i>
                </button>
            </div>
                <div class="form-group col-md-1">
                </div>



                <div class="form-group col-md-5 col-xl-5 col-sm-10 col-10 col-lg-5">
                <label for="quantidade">Quantidade:</label>
                    <input type="text" class="form-control" name="quantidade" id="quantidade" placeholder="">
                    <div class="feedback" id="feedback-quantidade">

                    </div>
                </div>
        		</div>



        	<div class="row">
        		<br>
        	</div>

        	<div class="row">
        		<div class="col-xl-10">

            	</div>
            	<div class="col-xl-1" id="cor-botao">
            		<input class="btn btn-primary" type="submit" value="Salvar">
            	</div>
            	<div class="col-xl-1">

            	</div>
        	</div>
        </form>
	</div>
</div>

<?php
    require_once(Config::FOOTER_TEMPLATE);
?>
