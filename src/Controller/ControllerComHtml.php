<?php

/* isolar o html (view) em um controller para não precisar copiar o caminho completo da view e garante que a view
terá acesso às variáveis necessárias (só têm acesso às variáveis que o Controller definir = + segurança)

ob_start e ob_get_clean: Funcões que conseguem recuperar em uma variável o conteúdo que o interpretador PHP normalmente
ignoraria e enviaria para o servidor como texto */

namespace Alura\Cursos\Controller;

abstract class ControllerComHtml
{
    public function renderizaHtml(string $caminhoTamplate, array $dados): string
    {
        extract($dados);
        ob_start();
        require __DIR__.'/../../view/' . $caminhoTamplate;
        $html = ob_get_clean();

       return $html;
    }
}