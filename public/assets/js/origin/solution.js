var SolutionJS = (function (){

	return {

		initSolutionSetUp: function(){

			 $("#tableSolutions").DataTable( {
                "iDisplayLength": -1,
                 "aLengthMenu": [[5, 25, 100, -1], [5, 25, 100, "All"]],
            });

		}
	}

})();