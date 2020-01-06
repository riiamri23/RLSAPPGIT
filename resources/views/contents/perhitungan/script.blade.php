<!-- MathJax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-AMS_HTML-full"></script>


<script>
        
$(document).ready(function(){
    $("#nilaix").on("keyup", function() {
        var hasil = $(this).val() != 0?$(this).data('a') + $(this).data('b') * $(this).val():0;
        $('#hasily').html(hasil!=0?"\\\[  \\hat{Y} = "+ $(this).data('a') +" +"+ $(this).data('b') +"(" +$(this).val() +") = " + hasil + "\\\]":"");
        MathJax.Hub.Queue(['Typeset',MathJax.Hub,'hasily']);
    });
    
});

</script>

<!-- ECharts -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts-gl/dist/echarts-gl.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts-stat/dist/ecStat.min.js"></script>

<script type="text/javascript">
    var dom = document.getElementById("container");
    var myChart = echarts.init(dom);
    var app = {};
    option = null;

    const jsonDetail = @json($detail);
    var data = new Array(); 
    // console.log(data[0][0]);
    Object.keys(jsonDetail).forEach(function(k){
        data[k] = new Array();
        data[k].push(parseFloat(jsonDetail[k].datax));
        data[k].push(parseFloat(jsonDetail[k].datay));
    });
    // console.log(data);
    // var data2 = [
    //     [2, 50],
    //     [3, 60],
    //     [1, 30],
    //     [4, 70],
    //     [1, 40],
    //     [3, 50],
    //     [2, 40],
    //     [2, 35],
    // ];
    // console.log(data2);
    
    // See https://github.com/ecomfe/echarts-stat
    var myRegression = ecStat.regression('linear', data);
    
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