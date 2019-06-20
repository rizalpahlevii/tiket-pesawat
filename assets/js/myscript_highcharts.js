$(document).ready(function(){
    $.ajax({
        url : base_url + 'dashboard/getChart',
        method : 'POST',
        dataType : 'json',
        data :{
            id : 'oke'
        },
        success:function(response){
            fungsiChart1(response);      
        }
    });
    $.ajax({
        url : base_url + 'dashboard/getChartPendapatan',
        method : 'POST',
        dataType : 'json',
        data :{
            id : 'oke'
        },
        success:function(response){
            fungsiChart2(response);            
        }
    });

    function fungsiChart2(response){
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

    function fungsiChart1(response){
        new Highcharts.Chart({
            chart : {
                renderTo : 'chart',
                type : 'line'
            },
            title : {
                text : 'Grafik Penjualan Tiket',
                x : -20
            },
            subtitle : {
                text : 'Count Tiket',
                x:-20
            },
            xAxis : {
                categories : [
                    'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des'
                ]
            },
            yAxis:{
                labels: {
                    formatter : function(){
                        return this.value;
                    }
                },
                title :{
                    text : 'Values'
                }
            },
            series: [{
                name : 'Data Dalam Bulan',
                data : response
            }]
        });
    }
});