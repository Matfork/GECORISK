var RiskProjectJS = (function (){

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