<?php
    class cadastro_noticiasController extends Controller
    {
        public function index()
        {
            $categoria = new Categoria();
            $dados = $categoria -> exibirCategoriaCombobox();
            $this->carregarTemplate('cadastro_noticias', $dados);
        }

        public function inserirNoticias()
        {
            $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
            $novo_nome_img = md5(time()).$extensao;
    
            $titulo = addslashes($_POST['titulo']);
            $categoria = addslashes($_POST['fk_categoria']);
            $corpo = addslashes($_POST['corpo']);
        
            if ($this->verificarCamposDuplicados(['campo' => 'idnoticia'], "tbl_noticia", "titulonoticia", $titulo) == true)
            {
                $objNoticia = new Noticias();
                $objNoticia -> cadastrarNoticia($titulo, $corpo,  $categoria, $novo_nome_img);
            }
            header("location: cadastro_noticias");
        }
    }
?>