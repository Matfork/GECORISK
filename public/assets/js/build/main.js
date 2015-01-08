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
})();;var FrecuencyJS = (function (){

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
        initialRiskSetUp: function(){
            
            $("#tableRiskFrecuency").DataTable({
                "iDisplayLength": 5,   
                 "aLengthMenu": [[5, 25, 100, -1], [5, 25, 100, "All"]],
            });

             $( '.filters' ).on( 'change', function() {   
                window.location.href=BASE_URL+"/frecuency/risk/"+$("#filter_projectType").val();
            });
            
            $( '.table_frencuency' ).on( 'click','.btnProjectAssociated', function() {
                /*for AJAX Post*/
                var params =  new Object();
                params.id = $(this).data("id");
                params.type = $(this).data("type");
                params.project_type_id = $("#filter_projectType").val();
                
                frecuencySearchAssociations(params);
            });
        },

        initialProjectSetUp: function(){
            
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

        initialDocumentSetUp: function(){
            
            var tableDocumentMain = $("#tableDocumentMain").DataTable({
                "iDisplayLength": 10,
                "sPaginationType": "bs_normal",
                "sDom": '<"row"><"clear"><"row" <"col-md-3" l><"col-md-6 selectForms"><"col-md-3" f>r>t<"row"ip>',
                "bFilter": true,
            });

            var tableTools = new $.fn.dataTable.TableTools( tableDocumentMain, {
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

            $('.container').on('change','#selectRisk , #selectProject',function() { 
                $('#tableDocumentMain').dataTable().fnFilter($(this).val()); 
            });
        },
    }
})();;var RiskProjectJS = (function (){

    var riskProjectSearch = function(params){
            
            $(".content_form").html("");
            $(".ajaxMsg").hide();

            //Ajax by POST Request
            $.ajax({  
                url: BASE_URL+"/riskProject/filterFormByAjax",  
                dataType: 'json',
                data: params,
                type: 'POST',
                success:function(data){
                    console.log(data);

                    if(data.status == 'success'){
                        if (data.numberRows>0){
                            //Using Blade
                            $(".content_form").html(data.data);

                            //Using HandleBars
                            //var source   = $("#riskProkectFiltered").html();
                            //var template = Handlebars.compile(source);
                            //$(".content_form").html(template(data.data));
                        }else{
                            $(".ajaxMsg").html("Whoops! There is no data to display!").show();
                        }
                    }
                }
            })

             //Ajax by GET Request
             /*   $.ajax({  
                    url: "riskProject_/filterFormByAjaxGet/"+paramsString,  
                    dataType: 'json',
                    type: 'GET',
                    success:function(data){
                        console.log(data);
                    }
                })
             */
      
    };

    return {
        initialSetUp: function(){
            
             $( '.filters' ).on( 'change', function() {
                
                $("#filter_risk_project").val("");
              
                /*for AJAX Post*/
                var params =  new Object();
                params.valRisk = $("#filter_risk").val();
                params.valProject = $("#filter_project").val();
                
                /*for AJAX Get
                   var params = JSON.stringify(params);  
                */
                riskProjectSearch(params);
            });


            $( '#filter_risk_project' ).on( 'keyup', function(){

                $("#filter_risk").val(0);
                $("#filter_project").val(0);

                if ($(this).val().length>=4 || $(this).val().length==0){
                    var params =  new Object();
                    params.valSearch = $(this).val().length>=4 ? $(this).val() : "all" ;

                    riskProjectSearch(params);
                }
            }); 
        },
    }
})();