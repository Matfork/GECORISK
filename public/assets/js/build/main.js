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
        initialChartProjectRiskSetUp: function(){
            
            Highcharts.data({
                csv: document.getElementById('tsv').innerHTML,
                itemDelimiter: '\t',
                parsed: function (columns) {

                    var brands = {},
                        brandsData = [],
                        versions = {},
                        drilldownSeries = [];

                    // Parse percentage strings
                    columns[1] = $.map(columns[1], function (value) {
                        if (value.indexOf('%') === value.length - 1) {
                            value = parseFloat(value);
                        }
                        return value;
                    });

                    $.each(columns[0], function (i, name) {
                        var brand,
                            version;

                        if (i > 0) {

                            // Remove special edition notes
                            name = name.split(' -')[0];

                            // Split into brand and version
                            version = name.match(/([0-9]+[\.0-9x]*)/);
                            if (version) {
                                version = version[0];
                            }
                            brand = name.replace(version, '');

                            // Create the main data
                            if (!brands[brand]) {
                                brands[brand] = columns[1][i];
                            } else {
                                brands[brand] += columns[1][i];
                            }

                            // Create the version data
                            if (version !== null) {
                                if (!versions[brand]) {
                                    versions[brand] = [];
                                }
                                versions[brand].push(['v' + version, columns[1][i]]);
                            }
                        }

                    });

                    $.each(brands, function (name, y) {
                        brandsData.push({
                            name: name,
                            y: y,
                            drilldown: versions[name] ? name : null
                        });
                    });
                    $.each(versions, function (key, value) {
                        drilldownSeries.push({
                            name: key,
                            id: key,
                            data: value
                        });
                    });

                    // Create the chart
                    $('#container').highcharts({
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Browser market shares. November, 2013'
                        },
                        subtitle: {
                            text: 'Click the columns to view versions. Source: netmarketshare.com.'
                        },
                        xAxis: {
                            type: 'category'
                        },
                        yAxis: {
                            title: {
                                text: 'Total percent market share'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels: {
                                    enabled: true,
                                    format: '{point.y:.1f}%'
                                }
                            }
                        },

                        tooltip: {
                            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
                        },

                        series: [{
                            name: 'Brands',
                            colorByPoint: true,
                            data: brandsData
                        }],
                        drilldown: {
                            series: drilldownSeries
                        }
                    });
                }
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