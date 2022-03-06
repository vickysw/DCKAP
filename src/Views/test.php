<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>User List</title>
  </head>
  <body>
    <div class="container p-3 my-3 border">
        <div class="row float-right">
            <div class="col-auto float-right">
                 <a href="<?php echo ACTION_PATH.'/test/signout' ?>" type="button" class="btn btn-info">Signout</a>
            </div>
        </div>
        <div class="row">
             <div class="col align-self-start">
                <h1>User List</h1>
            </div>
            <div class="col-auto mr-auto">
                <a href="<?php echo $_SERVER['SCRIPT_NAME'].'/test/addUser' ?>" type="button" class="btn btn-primary">Add User</a>
            </div>
        </div>
            <table id="userList" width="100%" class="display">
                <thead>
                    <tr>
                        <th>Profile Pic</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
    </div>
  </body>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</html>
<script>
var PATH = '<?php echo ACTION_PATH;?>';

$(document).ready( function () {
     var postdata ={};
      if($.fn.dataTable.isDataTable('#userList'))
        {
            $('#userList').DataTable().destroy();
        }
        $('#userList thead tr:eq(0) th').each( function () {
        var title = $(this).text();
        if(title != 'Action' && title != 'Profile Pic')
        {
               $(this).html( '<input type="text" style="width:100% !important" placeholder="'+title+' Search" class="column_search" />' );
        }
    });

    $('#userList').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax":{
                url :PATH + "/test/get_user_list", 
                data: postdata,
                type: "post",    
                dataType: 'json',                     
                error: function(){
                },
                dataSrc: function ( json ) 
                {
                    $('.dataTables_wrapper #userList_filter').css("display","none");
                    $(".dataTables_info").css("text-align","center");
                    return json.data;
                }
            },
             columnDefs: [{
                        "defaultContent": "-",
                        "targets": "_all"
                      }],
                 "columns": [
                        { "data": "profile_pic"} ,
                        { "data": "name"} ,
                        { "data": "email" } ,
                        { "data": "age" } ,
                        { "data": "status" },
                        { "data": "action" }
                    ]   
    });

    $('#userList thead').on( 'keyup', ".column_search",function () {
     
          $('#userList').DataTable()
              .column( $(this).parent().index() )
              .search( this.value )
              .draw();
    } );
} );

function deleteUser(id)
{
    if(confirm('Are yo sure want to delete?'))
    {
        $.ajax({
            url :PATH + "/test/deleteUser", 
            data: {id:id},
            type: "post",        
            error: function(){
            },
            success: function ( json ) 
            {
               location.reload();
            }
        });
    }
}
</script>