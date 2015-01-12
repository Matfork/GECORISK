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

    var fillRiskTable = function(dataToFill){
        $.each(dataToFill, function(key, risk){            
            $(".tableRiskMatrix tr.customTrRisk").each(function(i,row){
                var impact = $(row).data('impact');

                $(row).find('td').each(function(i,col){
                    var prob = $(col).data('prob');
                    var risk_level = impact * prob;

                    if(risk_level==risk.risk_level && prob==risk.probability && impact==risk.impact){
                        //console.log(risk.name);
                        $(col).children().children().eq(1).children().eq(0).children().eq(0).append("<li>"+risk.name+"</li>");
                        $(col).children().children().eq(2).html("...");
                    }
                });
            });
        });
    }

    var hideAllPopovers = function() {
       $('.more_info_text').each(function() {
            $(this).popover('hide');
        });  
    };

    var createPopOvers = function(){
        $(".more_info_text").each(function(){
            var textPopOver =  $(this).parent().children().eq(1).children().text();
            var hmtlPopOver =  $(this).parent().children().eq(1).children().html();
            
            if(textPopOver.trim() != ""){
                $(this).popover({
                    content : hmtlPopOver,
                    html: true,
                    title: "Name of Risks",
                    trigger: 'manual',
                    placement: 'right',
                    container: 'body'
                }).on('click', function(e) {
                    $(this).popover('show');
                    e.stopPropagation();
                });
            }else{
                $(this).css('cursor','default');
            }
        });
    }

    /*var initFunctionsAndData = function(){
        alert("bugged!");
    }*/

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

        initialChartRiskMatrixSetUp: function(risksByProject){
            
            var initFunctionsAndData = function(){
                $('[data-toggle="popover"]').popover();
            
                if(risksByProject.length > 0) 
                    $(".riskMatrix").fadeIn(500);
                else                          
                    $(".notFoundMatrix").show();

                $(document).on('click', function(e) {
                    hideAllPopovers();
                });

                $( '.filters' ).on( 'change', function() {   
                    window.location.href=BASE_URL+"/chart/riskMatrix/"+$("#filter_project").val();
                });
            }

            initFunctionsAndData();
            fillRiskTable(risksByProject);
            createPopOvers();
        },
    }
})();