<?php
require_once("controller/CategoriaController.php");
require_once("Categoria.php");

class Produto
{
    private $nome, $identificacao, $posicao, $descricao; // string
    private $catmat, $quantidade, $estoqueIdeal; // int
    private $categoria; // Categoria

    public function __construct() {
        $this->categoria = new Categoria();
    }


    public function getCategoria(): Categoria{
        return $this->categoria;
    }

    public function getNome(): string{
        return $this->nome;
    }

    public function getIdentificacao(): string{
        return $this->identificacao;
    }

    public function getPosicao(): string{
        return $this->posicao;
    }

    public function getDescricao(): string{
        return $this->descricao;
    }

    public function getCatmat(): int{
        return $this->catmat;
    }

    public function getQuantidade(): int{
        return $this->quantidade;
    }

    public function getEstoqueIdeal(): int{
        return $this->estoqueIdeal;
    }

    public function setNome(string $nome){
        if($nome != null){
            if(strlen ($nome) <= 100){
                $this->nome = $nome;
                return 1;
            }else{
              
                return -2;
            }
        }else{
            return -3;
        }
        
    }

    public function setIdentificacao(string $identificacao){
        if($identificacao != null){
            if(strlen ($identificacao) <= 50){
                $this->identificacao = $identificacao;
                return 1;
            }else{
                return -2;
            }
        }else{
            return -3;
        }
       
    }

    public function setPosicao(string $posicao){
        if($posicao != null){
            if(strlen ($posicao) <= 3){
                $this->posicao = $posicao;
                return 1;
            }else{
                return -2;
            }
        }else{
            return -3;
        }
    }

    public function setDescricao(string $descricao){
        if($descricao != null){
            $this->descricao = $descricao;
            return 1;
        }else{
            return -3;
        }
    }

    public function setCatmat(int $catmat){
        $catmatString = (string) $catmat;
        if($catmat != null){
            if(isNumeric($catmat)){
                if(strlen ($catmatString) <= 6){
                    $this->catmat = $catmat;
                    return 1;
                }else{

                    return -2;
                }
            }else{
                return -4;
            }
        }else{
            return -3;
        }
        
    }

    public function setQuantidade(int $quantidade){
        $quantidadeString = (string) $quantidade;
        if($quantidade != null){
            if(isNumeric($quantidade)){
                if(strlen ($quantidadeString) <= 6){
                    $this->quantidade = $quantidade;
                    return 1;
                }else{
                    return -2;
                }
            }else{
                return -4;
            }
        }else{
            return -3;
        }
    }

    public function setEstoqueIdeal(int $estoqueIdeal){
        $estoqueIdealString = (string) $estoqueIdeal;
        if($estoqueIdeal != null){
            if(isNumeric($estoqueIdeal)){
                if(strlen ($estoqueIdealString) <= 6){
                    $this->estoqueIdeal = $estoqueIdeal;
                    $mensagemEstoqueIdeal = "";
                    return 1;
                }else{
                    return -2;
                }
            }else{
                return -4;
            }
        }else{
            return -3;
        }
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

}
