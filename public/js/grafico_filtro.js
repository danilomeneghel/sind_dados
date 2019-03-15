$(document).ready(function () {
    $("#unidade").prop("disabled", true);
    $("#categoria").prop("disabled", true);

    $(document).on("change", "#pesquisa", function () {
        carregarUnidades();
    });
    $(document).on("change", "#unidade", function () {
        carregarCategorias();
    });
    $(document).on("change", "#tipo", function () {
        filtro();
    });
    $(document).on("click", "#treeview input[type=checkbox]", function () {
        $("#periodo").prop("disabled", false);
        filtro();
    });
    $(document).on("click", "#treeview a", function () {
        $("#periodo").prop("disabled", false);
        filtro();
    });
    $(document).on("change", "#periodo", function () {
        filtro();
    });

    function carregarUnidades() {
        var url = window.location.href;
		
        $.ajax({
            url: url + "/unidade",
            type: "GET",
            data: {
                pesquisa: $("#pesquisa").val()
            },
            datatype: "JSON",
            cache: true,
            beforeSend: function () {
                $('#unidade').append('<option selected>Carregando...</option>');
                $("#unidade").prop('disabled', true);
            },
            success: function (data) {
                $('#unidade').find('option').remove();
                $('#unidade').append('<option value="">Selecione a Unidade</option>');
                $.each(data, function (k, v) {
                    $('#unidade').append('<option value="' + k + '">' + v + '</option>');
                });
                $("#unidade").prop("disabled", false);
            }
        });
    }

    function carregarCategorias() {
        var url = window.location.href;
		
        $.ajax({
            url: url + "/tree_categoria",
            type: "GET",
            data: {
                pesquisa: $("#pesquisa").val(),
                unidade: $("#unidade").val()
            },
            datatype: "html",
            cache: false,
            beforeSend: function () {
                $('#categoria').attr('placeholder', 'Carregando...');
                $("#categoria").prop('disabled', true);
            },
            success: function (data) {
                $(".tree-menu").empty();
                $(".tree-menu").html(data);
                $('#categoria').attr('placeholder', 'Pesquisar Categoria');
                $("#unidade").prop("disabled", false);
                $("#categoria").prop("disabled", false);
                $("#periodo").prop("disabled", false);
                carregarPeriodos();
            }
        });
    }

    function carregarPeriodos() {
        var url = window.location.href;
		
        $.ajax({
            url: url + "/periodo",
            type: "GET",
            data: {
                pesquisa: $("#pesquisa").val(),
                unidade: $("#unidade").val()
            },
            datatype: "html",
            cache: true,
            success: function (data) {
                $(".periodo-slider").empty();
                $(".periodo-slider").append('<input id="periodo" type="text" data-slider-ticks-labels="" data-slider-value="" data-slider-ticks="" data-slider-lock-to-ticks="true"/>');
                $("#periodo").slider({
                    value: data,
                    ticks: data,
                    ticks_labels: data
                });
            }
        });
    }

    function filtro() {
        var pesquisa = $("#pesquisa option:selected").text();
        var unidade = $("#unidade option:selected").text();
        var tipo = $("#tipo").prop('checked');
        var categoria = [];
        var total_periodo_empresa = [];
        var total_periodo_mercado = [];
        var categ_empresa_anterior = 0;
        var categ_mercado_anterior = 0;
        var variacao_empresa = [];
        var variacao_mercado = [];
        var series1 = [];
        var series2 = [];
        var series3 = [];

        var nome_tipo = (tipo) ? "Mercado" : "Empresa";
        var periodo = $("#periodo").val();
        var periodo1 = [];
        var periodo2 = [];

        if (periodo != "" && periodo != undefined) {
            var periodo_split = periodo.split(",");
            var x;

            for (x = periodo_split[0]; x <= periodo_split[1]; x++) {
                periodo1.push(x);
                if (x != periodo_split[0])
                    periodo2.push(x);
            }
        }

        /*
         * Dados Gráfico Colunas
         */
        $.each($("input[name='categoria[]']:checked"), function () {
            var categ_name = ($(this).attr("class") == "input-show group") ? "" : $(this).data("name");
            var categ_empresa = ($(this).attr("class") == "input-show group") ? "" : $(this).val();
            var categ_mercado = ($(this).attr("class") == "input-show group") ? "" : $(this).data("mercado");
            var categ_empresa2 = categ_empresa.split(", ");
            var categ_mercado2 = categ_mercado.split(", ");
            var categoria_empresa = [];
            var categoria_mercado = [];

            if (categ_empresa != "" && categ_mercado != "") {
                periodo1.map(function (v, k) {
                    categ_empresa2.map(function (vv, kk) {
                        var categ_empresa3 = categ_empresa2[kk].split(": ").map(Number);
                        if (categ_empresa3[0] == v)
                            categoria_empresa.push(categ_empresa3[1]);
                    });

                    categ_mercado2.map(function (vv, kk) {
                        var categ_mercado3 = categ_mercado2[kk].split(": ").map(Number);
                        if (categ_mercado3[0] == v)
                            categoria_mercado.push(categ_mercado3[1]);
                    });
                });

                var categoria = (tipo) ? categoria_mercado : categoria_empresa;

                series1.push({
                    name: categ_name,
                    data: categoria
                });
            }

            if (categ_empresa_anterior != 0) {
                total_periodo_empresa = [];
                categ_empresa_anterior.map(function (valor, chave) {
                    total_periodo_empresa.push(parseFloat(categoria_empresa[chave]) + parseFloat(valor));
                });

                total_periodo_mercado = [];
                categ_mercado_anterior.map(function (valor, chave) {
                    total_periodo_mercado.push(parseFloat(categoria_mercado[chave]) + parseFloat(valor));
                });
            } else {
                total_periodo_empresa = categoria_empresa;
                total_periodo_mercado = categoria_mercado;
            }

            categ_empresa_anterior = total_periodo_empresa;
            categ_mercado_anterior = total_periodo_mercado;
        });

        /*
         * Dados Gráfico Variação
         */
        categ_empresa_anterior = 0;
        total_periodo_empresa.map(function (valor) {
            if (categ_empresa_anterior != 0) {
                var result = ((valor / categ_empresa_anterior) - 1) * 100;
                variacao_empresa.push(parseFloat(result.toFixed(2)));
            }
            categ_empresa_anterior = valor;
        });

        categ_mercado_anterior = 0;
        total_periodo_mercado.map(function (valor) {
            if (categ_mercado_anterior != 0) {
                var result = ((valor / categ_mercado_anterior) - 1) * 100;
                variacao_mercado.push(parseFloat(result.toFixed(2)));
            }
            categ_mercado_anterior = valor;
        });

        series2.push({
            name: "Empresa",
            data: variacao_empresa
        },
        {
            name: "Mercado",
            data: variacao_mercado
        });

        /*
         * Dados Gráfico Market Share
         */
        var marketshare = [];
        total_periodo_empresa.map(function (valor, chave) {
            var result = ((valor / total_periodo_mercado[chave])) * 100;
            marketshare.push(parseFloat(result.toFixed(2)));
        });

        series3.push({
            type: 'area',
            name: "Market Share",
            data: marketshare
        });

        if (pesquisa != "" && periodo1 != "" && unidade != "" && series1 != "") {
            graficoColuna(pesquisa, periodo1, unidade, nome_tipo, series1);
            graficoLinha(pesquisa, periodo2, unidade, series2);
            graficoArea(pesquisa, periodo1, unidade, series3);
        }
    }
});