// Initialize DataTables API object and configure table
var table = $('#memListTable').DataTable({
    "searching": false,
    "processing": true,
    "serverSide": true,
    "ajax": {
       "url": "getData.php",
       "data": function ( d ) {
         return $.extend( {}, d, {
           "search_keywords": $("#searchInput").val().toLowerCase(),
           "filter_option": $("#sortBy").val().toLowerCase()
         } );
       }
     }
});

$(document).ready(function(){
    // Redraw the table
    table.draw();
    
    // Redraw the table based on the custom input
    $('#searchInput,#sortBy').bind("keyup change", function(){
        table.draw();
    });
});
