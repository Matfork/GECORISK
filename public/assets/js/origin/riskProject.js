 $(function() {
    
    $( '#filter_risk' ).on( 'change', function() {

        var params =  new Object();
        params.val = $(this).val();
        
        var paramsString = JSON.stringify(params);
        
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

                    //Using Blade
                    //$(".content_form").html(data.data);

                    //Using HandleBars
                    if (data.data.length>0){
                        var source   = $("#riskProkectFiltered").html();
                        var template = Handlebars.compile(source);

                        $(".content_form").html(template(data.data));
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

    })
});
