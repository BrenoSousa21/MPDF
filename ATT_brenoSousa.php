<?php

use Mpdf\HTMLParserMode;
require_once 'vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$produtos = [
    [
        'nome' => 'caderno Universitário',
        'categoria' => 'papelaria',
        'preco' => 54.00,
        'descricao' => 'caderno universitario 200 folhas pautadas',
    ],
    [
        'nome' => 'caderno de desenho',
        'categoria' => 'papelaria',
        'preco' => 20.00,
        'descricao' => 'caderno de desenho 100 folhas em branco',
    ],
    [
        'nome' => 'caneta azul',
        'categoria' => 'papelaria',
        'preco' => 3.50,
        'descricao' => 'caneta esferografica de tinta azul',
    ],
    [
        'nome' => 'caneta preta',
        'categoria' => 'papelaria',
        'preco' => 3.50,
        'descricao' => 'caneta esferografica de tinta preta',
    ],
    [
        'nome' => 'borracha branca',
        'categoria' => 'papelaria',
        'preco' => 2.50,
        'descricao' => 'borracha escolar de latex',
    ],
    [
        'nome' => 'régua',
        'categoria' => 'papelaria',
        'preco' => 5.00,
        'descricao' => 'régua de 30cm trasparente',
    ],
    [
        'nome' => 'lapiseira',
        'categoria' => 'papelaria',
        'preco' => 7.00,
        'descricao' => 'lapiseira 0.7 preta',
    ],
    [
        'nome' => 'lápis',
        'categoria' => 'papelaria',
        'preco' => 2.00,
        'descricao' => 'lápis HB',
    ],
];

$html = '

<table border="1">
<tr>
<th>Nome</th>
<th>Categoria</th>
<th>Preco</th>
<th>Descrição</th>
</tr>';

foreach ($produtos as $produto) {
    $html .= '
    <tr>
        <td>' . $produto['nome'] . '</td>
        <td>' . $produto['categoria'] . '</td>
        <td>' . $produto['preco'] . '</td>
        <td>' . $produto['descricao'] . '</td>
    </tr>';
}

$html .= '</table>';

$stylesheet = file_get_contents('CSS/style.css');
$mpdf->WriteHTML($stylesheet, HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, HTMLParserMode::HTML_BODY);

$mpdf->Output();
