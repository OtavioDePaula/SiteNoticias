<?php
    class Controller
    {
        public $dados;

        public function carregarTemplate($nomeView, $dadosModel = array())
        {
            $this->dados = $dadosModel;
            require 'Template/template.php';
        }
        public function carregarViewNoTemplate($nomeView, $dadosModel = array())
        {
            extract($dadosModel);
            require 'Views/'.$nomeView.'.php';
        }
    }
