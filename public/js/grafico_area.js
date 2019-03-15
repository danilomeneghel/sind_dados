function graficoArea(pesquisa, periodo, unidade, series) {
    Highcharts.chart('grafico_area', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Market Share - ' + pesquisa
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
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null,
                dataLabels: {
                    enabled: true,
                    formatter: function () {
                        return Highcharts.numberFormat(this.y, 0) + '%';
                    }
                },
                enableMouseTracking: false
            }
        },
        series: series
    });
}