<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Http\Models\Usuario;
use App\Http\Models\Cliente;
use App\Http\Requests;

class IndexController extends Controller {

    public function index() {
        /*
         * To do: Retornar do banco os dados da combo pesquisa
         */

        $pesquisa = [
            1 => "Pesquisa 1",
            2 => "Pesquisa 2",
            3 => "Pesquisa 3",
        ];

        return view("index", ["pesquisa" => $pesquisa]);
    }

    public function unidade(Request $request) {
        $pesquisa = $request->get("pesquisa");

        /*
         * To do: Retornar do banco os dados da combo unidade
         */

        $unidade = [
            1 => [
                1 => "Volume",
                2 => "Quantidade",
                3 => "Valor"
            ],
            2 => [
                1 => "Volume",
                3 => "Valor"
            ],
            3 => [
                1 => "Volume",
                2 => "Quantidade",
            ]
        ];
        $dados = $unidade[$pesquisa];

        return response()->json($dados);
    }

    public function tree_categoria(Request $request) {
        $pesquisa = $request->get("pesquisa");
        $unidade = $request->get("unidade");

        $dados = $this->getDados($pesquisa, $unidade);

        return view("tree_categoria", ["dados" => $dados]);
    }

    public function periodo(Request $request) {
        $pesquisa = $request->get("pesquisa");
        $unidade = $request->get("unidade");

        /*
         * To do: Retornar do banco os dados da combo periodo
         */

        $periodo = [
            1 => [2010, 2011, 2012, 2013, 2014],
            2 => [2012, 2013, 2014],
            3 => [2010, 2011, 2012, 2013, 2014, 2015],
        ];

        $dados = $periodo[$unidade];

        return response()->json($dados);
    }

    public function getDados($pesquisa, $unidade) {
        /*
         * To do: Retornar do banco todos os dados do filtro
         */

        $categoria_periodo = [
            1 => [
                0 => [
                    "name" => "Higiene",
                    "empresa" => "2010: 33, 2011: 25, 2012: 23, 2013: 26, 2014: 25",
                    "mercado" => "2010: 133, 2011: 125, 2012: 123, 2013: 126, 2014: 125",
                    "children" => [
                        0 => [
                            "name" => "Sabonete",
                            "empresa" => "2010: 28, 2011: 23, 2012: 19, 2013: 19, 2014: 23",
                            "mercado" => "2010: 128, 2011: 123, 2012: 119, 2013: 119, 2014: 123",
                            "children" => [
                                0 => [
                                    "name" => "Glicerina",
                                    "empresa" => "2010: 15, 2011: 13, 2012: 14, 2013: 17, 2014: 12",
                                    "mercado" => "2010: 15, 2011: 13, 2012: 14, 2013: 17, 2014: 12",
                                    "children" => ""
                                ],
                                1 => [
                                    "name" => "Coco",
                                    "empresa" => "2010: 7, 2011: 2, 2012: 5, 2013: 4, 2014: 3",
                                    "mercado" => "2010: 17, 2011: 12, 2012: 15, 2013: 14, 2014: 13",
                                    "children" => ""
                                ],
                                2 => [
                                    "name" => "Camomila",
                                    "empresa" => "2010: 6, 2011: 8, 2012: 2, 2013: 3, 2014: 2",
                                    "mercado" => "2010: 16, 2011: 18, 2012: 12, 2013: 13, 2014: 12",
                                    "children" => ""
                                ]
                            ],
                        ],
                        1 => [
                            "name" => "Fralda",
                            "empresa" => "2010: 2, 2011: 4, 2012: 5, 2013: 1, 2014: 3",
                            "mercado" => "2010: 12, 2011: 14, 2012: 15, 2013: 11, 2014: 13",
                            "children" => ""
                        ]
                    ],
                ],
                1 => [
                    "name" => "Limpeza",
                    "empresa" => "2010: 15, 2011: 16, 2012: 18, 2013: 18, 2014: 6",
                    "mercado" => "2010: 215, 2011: 216, 2012: 218, 2013: 218, 2014: 26",
                    "children" => [
                        0 => [
                            "name" => "Desinfetante",
                            "empresa" => "2010: 6, 2011: 6, 2012: 7, 2013: 5, 2014: 2",
                            "mercado" => "2010: 26, 2011: 26, 2012: 27, 2013: 25, 2014: 22",
                            "children" => ""
                        ],
                        1 => [
                            "name" => "Detergente",
                            "empresa" => "2010: 5, 2011: 8, 2012: 6, 2013: 6, 2014: 1",
                            "mercado" => "2010: 25, 2011: 28, 2012: 26, 2013: 26, 2014: 21",
                            "children" => ""
                        ],
                        2 => [
                            "name" => "Agua Sanitaria",
                            "empresa" => "2010: 4, 2011: 2, 2012: 5, 2013: 7, 2014: 3",
                            "mercado" => "2010: 24, 2011: 22, 2012: 25, 2013: 27, 2014: 23",
                            "children" => ""
                        ]
                    ],
                ],
                2 => [
                    "name" => "Barbeador",
                    "empresa" => "2010: 5, 2011: 5, 2012: 8, 2013: 7, 2014: 7",
                    "mercado" => "2010: 15, 2011: 15, 2012: 18, 2013: 17, 2014: 17",
                    "children" => ""
                ],
                3 => [
                    "name" => "Pente",
                    "empresa" => "2010: 4, 2011: 3, 2012: 4, 2013: 3, 2014: 1",
                    "mercado" => "2010: 34, 2011: 33, 2012: 34, 2013: 33, 2014: 31",
                    "children" => ""
                ]
            ],
            2 => [
                0 => [
                    "name" => "Escova",
                    "empresa" => "2010: 5, 2011: 8, 2012: 6, 2013: 6, 2014: 1",
                    "mercado" => "2010: 25, 2011: 28, 2012: 26, 2013: 26, 2014: 21",
                    "children" => ""
                ],
                1 => [
                    "name" => "Toalha",
                    "empresa" => "2010: 5, 2011: 5, 2012: 8, 2013: 7, 2014: 7",
                    "mercado" => "2010: 15, 2011: 15, 2012: 18, 2013: 17, 2014: 17",
                    "children" => ""
                ]
            ],
            3 => [
                0 => [
                    "name" => "Camiseta",
                    "empresa" => "2010: 5, 2011: 8, 2012: 6, 2013: 6, 2014: 1",
                    "mercado" => "2010: 25, 2011: 28, 2012: 26, 2013: 26, 2014: 21",
                    "children" => ""
                ],
                1 => [
                    "name" => "Tênis",
                    "empresa" => "2010: 4, 2011: 2, 2012: 5, 2013: 7, 2014: 3",
                    "mercado" => "2010: 24, 2011: 22, 2012: 25, 2013: 27, 2014: 23",
                    "children" => ""
                ]
            ]
        ];

        $dados = $categoria_periodo[$unidade];

        return $dados;
    }

}
