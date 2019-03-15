function graficoColuna(pesquisa, periodo, unidade, nome_tipo, series) {
    Highcharts.chart('grafico_coluna', {
        chart: {
            type: 'column'
        },
        title: {
            text: pesquisa + ' (' + nome_tipo + ')'
        },
        subtitle: {
            text: unidade
        },
        xAxis: {
            categories: periodo
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total ' + unidade
            },
            stackLabels: {
                enabled: true,
                style: {
                    fontWeight: 'bold',
                    color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                }
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                }
            }
        },
        series: series
    });
}