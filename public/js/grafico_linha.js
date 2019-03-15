function graficoLinha(pesquisa, periodo, unidade, series) {
    Highcharts.chart('grafico_linha', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Variação - ' + pesquisa
        },
        subtitle: {
            text: unidade
        },
        xAxis: {
            categories: periodo
        },
        yAxis: {
            title: {
                text: 'Porcentual'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true,
                    formatter: function () {
                        return Highcharts.numberFormat(this.y,0) + '%';
                    }
                },
                enableMouseTracking: false
            }
        },
        series: series
    });
}