var ChartJS = (function (){

    var frecuencySearchAssociations = function(params){
            
            $(".table_associated").html("");
            $(".ajaxMsg").hide();

            //Ajax by POST Request
            $.ajax({  
                url: BASE_URL+"/frecuency/searchAssociations",  
                dataType: 'json',
                data: params,
                type: 'POST',
                success:function(data){
                    if(data.status == 'success'){
                        console.log(data);
                        if (data.numberRows>0){
                            //Using Blade
                            $(".table_associated").html(data.data);
                            $("#tableProjectAssociation").DataTable( {
                                "iDisplayLength": 5,
                                 "aLengthMenu": [[5, 25, 100, -1], [5, 25, 100, "All"]],
                            });
                        }else{
                            $(".ajaxMsg").html("Whoops! There is no data to display!").show();
                        }
                    }
                }
            })
      
    };

    return {
        initialChartProjectRiskSetUp: function(main_list,drillDown_list){
           
            // Create the chart
            var chart = new Highcharts.Chart({
                chart: {
                    type: 'column',
                    renderTo: 'container',
                    events: {
                        drilldown: function(e) {
                            chart.setTitle({ text: 'All risks for ' + e.point.name });
                            chart.yAxis[0].setTitle({ text: 'Risk Level' });
                            //chart.xAxis[0].setTitle({ text: 'All Risks' });
                        },
                        drillup: function(e) {
                            chart.setTitle({ text: 'Risk by Projects' });
                            chart.yAxis[0].setTitle({ text: 'Number of Risks' });
                            //chart.xAxis[0].setTitle({ text: 'List of Projects' });
                        }
                    }
                },
                title: {
                    text: 'Risk by Projects'
                },
                xAxis: {
                    /*title: {
                        text: 'List of Projects'
                    },*/
                    type: 'category'
                },
                yAxis: {
                    title: {
                        text: 'Number of Risks'
                    },
                },

                legend: {
                    enabled: false
                },

                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true
                        }
                    }
                },

                series: [{
                    name: 'Risk by Projects',
                    colorByPoint: true,
                    data: main_list
                }],

                drilldown: {
                    series: drillDown_list
                }
            });

             $( '.filters' ).on( 'change', function() {   
                window.location.href=BASE_URL+"/chart/projectRisk/"+$("#filter_projectType").val();
            });

        },

        initialChartRiskMatrixSetUp: function(){
            
            var tableProjectFrecuency = $("#tableProjectFrecuency").DataTable({
                "iDisplayLength": 5,
                 "aLengthMenu": [[5, 25, 100, -1], [5, 25, 100, "All"]],
                "dom": '<"row export"><"clear">lfrtip',   
            });

            var tableTools = new $.fn.dataTable.TableTools( tableProjectFrecuency, {
                "sSwfPath": BASE_URL+"/assets/bower_components/datatables-tabletools/swf/copy_csv_xls_pdf.swf",
                 "aButtons": [ 
                     {
                        "sExtends": "xls",
                        "sCharSet": "utf8",
                        "sFileName": 'excelExport.xls',
                        "sButtonText": "XLS"
                     },
                     {
                        "sExtends": "csv",
                        "sCharSet": "utf8",
                        "sFileName": 'csvExport.csv',
                        "sButtonText": "CSV"
                     },
                     {
                        "sExtends": "pdf",
                        "sCharSet": "utf8",
                        "sFileName": 'PDF_Export.pdf',
                        "sButtonText": "PDF"
                     },
                 ]
            });
              
            $('.exportNav').html(tableTools.fnContainer());

            $( '.table_frencuency' ).on( 'click','.btnProjectAssociated', function() {
                /*for AJAX Post*/
                var params =  new Object();
                params.id = $(this).data("id");
                params.type = $(this).data("type");
                
                frecuencySearchAssociations(params);
            });
 
        },
    }
})();