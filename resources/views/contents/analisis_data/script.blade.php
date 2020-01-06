
<!-- ECharts -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts-gl/dist/echarts-gl.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts-stat/dist/ecStat.min.js"></script>

<script type="text/javascript">
    $('#regresi').on('change', function(){
        let url = "{{URL::to('analisisdata/:id')}}";
        url = url.replace(':id', this.value);
        $(location).attr('href',url);
    });

    let dom = document.getElementById("container");
    let myChart = echarts.init(dom);
    let app = {};
    option = null;

    const jsonDetail = @json($detail);
    let data = new Array();
    Object.keys(jsonDetail).forEach(function(k){
            data[k] = new Array();
            data[k].push(parseInt(jsonDetail[k].datax));
            data[k].push(parseInt(jsonDetail[k].datay));
    });
    let myRegression = ecStat.regression('linear', data);
    
    myRegression.points.sort(function(a, b) {
        return a[0] - b[0];
    });
    
    option = {
        title: {
            text: 'Diagram Scalar Regresi',
            subtext: 'By ecStat.regression',
            sublink: 'https://github.com/ecomfe/echarts-stat',
            left: 'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross'
            }
        },
        xAxis: {
            type: 'value',
            splitLine: {
                lineStyle: {
                    type: 'dashed'
                }
            },
        },
        yAxis: {
            type: 'value',
            min: 1.5,
            splitLine: {
                lineStyle: {
                    type: 'dashed'
                }
            },
        },
        series: [{
            name: 'scatter',
            type: 'scatter',
            label: {
                emphasis: {
                    show: true,
                    position: 'left',
                    textStyle: {
                        color: 'blue',
                        fontSize: 16
                    }
                }
            },
            data: data
        }, {
            name: 'line',
            type: 'line',
            showSymbol: false,
            data: myRegression.points,
            markPoint: {
                itemStyle: {
                    normal: {
                        color: 'transparent'
                    }
                },
                label: {
                    normal: {
                        show: true,
                        position: 'left',
                        formatter: myRegression.expression,
                        textStyle: {
                            color: '#333',
                            fontSize: 14
                        }
                    }
                },
                data: [{
                    coord: myRegression.points[myRegression.points.length - 1]
                }]
            }
        }]
    };;
    if (option && typeof option === "object") {
        myChart.setOption(option, true);
    }
</script>