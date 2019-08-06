$(document).ready(function(){
    
    $.ajax({
        url : base_url + 'dashboard/getPendapatan',
        method : 'POST',
        dataType : 'json',
        success:function(response){
            var chart = Highcharts.chart('chart2', {
                 title: {
                    text: 'Grafik Pendapatan'
                },
                 subtitle: {
                    text: 'Plain'
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                },
                yAxis : {
                    labels: {
                        formatter : function(){
                            return this.value;
                        }
                    }
                },
                series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: response,
                    showInLegend: false
                }]

            });


            $('#plain').click(function () {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: false
                    },
                    subtitle: {
                        text: 'Plain'
                    }
                });
            });

            $('#inverted').click(function () {
                chart.update({
                    chart: {
                        inverted: true,
                        polar: false
                    },
                    subtitle: {
                        text: 'Inverted'
                    }
                });
            });

            $('#polar').click(function () {
                chart.update({
                    chart: {
                        inverted: false,
                        polar: true
                    },
                    subtitle: {
                        text: 'Polar'
                    }
                });
            });          
        }
    });
});