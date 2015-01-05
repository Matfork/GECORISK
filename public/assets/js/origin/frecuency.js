var FrecuencyJS = (function (){

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
                /*"bFilter": true,
                "sDom":'l<"selects">frtip'*/
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

            /*$("div.selects").html("<select name='select1' id='select1'>
                <option value='asd'>asd</option>
                <option value='31'>31</option>
                <option value=''>all</option>
            </select>");

            var oTable;
              oTable = $('#tableRiskFrecuency').dataTable();

            $('#select1').change( function() { 
                    oTable.fnFilter( $(this).val(),2); 
            });*/
        },

        initialProjectSetUp: function(){
            
            $("#tableProjectFrecuency").DataTable({
                "iDisplayLength": 5,   
            });
            

            $( '.table_frencuency' ).on( 'click','.btnProjectAssociated', function() {
                /*for AJAX Post*/
                var params =  new Object();
                params.id = $(this).data("id");
                params.type = $(this).data("type");
                
                frecuencySearchAssociations(params);
            });
 
        },

        initialDocumentSetUp: function(){
            $("#tableDocumentMain").DataTable({
                "iDisplayLength": 10,   
            });
        },
    }
})();