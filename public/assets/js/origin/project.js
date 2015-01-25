var ProjectJS = (function (){

	return {

		initProjectSetUp: function(){

			 $("#tableProjects").DataTable( {
                "iDisplayLength": -1,
                 "aLengthMenu": [[5, 25, 100, -1], [5, 25, 100, "All"]],
            });

		}
	}

})();