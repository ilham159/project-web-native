<?php
if(!defined('OFFDIRECT')) include 'error404.php';

?>
<body class="no-skin">
<?php
  include "base_template_topnav.php";  //akan memanggil file base_template_topnav.php sebagai header
  echo '<div class="main-container ace-save-state" id="main-container">';
  include "menu.php";  //akan memanggil file menu.php sebagai pembuatan menu
?>
<div class="main-content">
<body>
  <link rel="stylesheet" type="text/css" href="style.css">
  <h1 align="center">Librarys Data</h1>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="fa fa-home"></i>
          <a href="<?php echo $baseURL;?>home">Home</a>
        </li>
        <li class="active">Librarys</li>
        <li class="active">Table Librarys</li>
      </ul><!-- /.breadcrumb -->
      <div class="nav-search" id="nav-search">
      </div><!-- /.nav-search -->
    </div>
    <div class="page-content">
      <div class="row">
        <div class="col-xs-12">
          
          <h6 align="right">
          <button class="btn btn-success"  width="10%" href="#pendaftaran" rowspan="2" onclick="return tambah_kategori('0');" class="tooltip-info" data-toggle="modal" data-rel="tooltip" title="Tambah">
              <span class="white">
                <i class="fa fa-plus"></i>
                  Add Borrowing
              </span>
            </button>
            </h6>

          <div class="table-header">

            <i class="fa fa-table"></i>&nbsp;

            <style type="text/css">
                .table-header {
                background-color: #B266FF;
                }
            </style>
            Table Librarys
          </div>
          
          <!-- BATAS HEADER TITLE -->
          <div class="ln_solid"></div>
    
          <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="center" width="5%">No</th>    
                <th class="center" width="10%">ID</th>
                <th class="center" width="*">Books</th>
                <th class="center" width="*">Name_Students</th>    
                <th class="center" width="10%">Dates</th>
                <th class="center" width="10%">Limit</th>
                <th class="center" width="10%">Amount_Borrowing</th>
                <th class="center" width="10%">action</th>
              </tr>
            </thead>          
              <tr>
                <td align="center"></td>
                <td align="center"></td>  
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
                <td align="center"></td>
              </tr>
          </table>

          <div>

          </div>

          <!-- BATAS DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
        </div>
      </div>
    </div>
  </div> 

</div>

<div class="modal fade" id="pendaftaran" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header no-padding">
        <div class="table-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="white">&times;</span>
          </button>
          Form Library Register
        </div>
      </div>
      <div class="modal-body">
        <form name="f_kategori" id="f_kategori" method="post"/>
          <input type="hidden" name="" id="id" value="">
          <div id="konfirmasi"></div>
          <table class="table table-form">
            <tr><td style="width: 25%">ID</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txtid" id="txtid" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Books</td>
              <td style="width: 75%">
                <select class="chosen-select form-control" required name="txtbooks" id="txtbooks" data-placeholder="choose name books...">
                  <option value="">select</option>
                  <?php
                    include 'koneksi.php';
                    $select = mysqli_query($koneksi, "select * from books_library");
                    while ($data = mysqli_fetch_array($select)) {
                      echo '
                      <option value="'.$data['txtid'].'">'.$data['txtname_books'].'</option>';
                    }
                  ?>
                </select>
              </td>
            </tr>
            <tr><td style="width: 25%">Name_Students</td>
              <td style="width: 500%">
                <select class="chosen-select form-control" required name="txtnis_students" id="txtnis_students" data-placeholder="choose name students...">
                  <option value="">select</option>
                  <?php
                    include 'koneksi.php';
                    $select = mysqli_query($koneksi, "select * from students");
                    while ($data = mysqli_fetch_array($select)) {
                      echo '
                      <option value="'.$data['txtnis'].'">'.$data['txtname'].'</option>';
                    }
                  ?>
                </select>
            </tr>
            <tr><td style="width: 25%">Dates</td>
              <td style="width: 75%">
                <input type="date" class="form-control" name="txtbrdt" id="txtbrdt" value="<?=date('Y-m-d')?>" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Limit</td>
              <td style="width: 75%">
                <input type="date" class="form-control" name="txtbrlmt" id="txtbrlmt" value="<?=date('Y-m-d')?>" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Amount_Borrowing</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="amt_borrow" id="amt_borrow" required value="">
              </td>
            </tr>
          </table>
      </div>
      <div class="modal-footer">
        <button class="btn btn-white btn-info btn-bold" type="button" id="btnsave">
          <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> Save</button>
        <button class="btn btn-white btn-danger btn-round" type="reset">
          <i class="fa fa-refresh "></i> Reset</button>
        <button class="btn btn-white btn-default btn-round" data-dismiss="modal" aria-hidden="true">
          <i class="fa fa-minus-circle"></i> Close</button>
      </div>
      </form>
    </div>
  </div>
</div>

</div>

<?php
  include "base_template_footer.php"; //akan memanggil base_template_footer.php sebagai footer
?>

      </div>
    </div>

 
<script type="text/javascript">
$(document).ready(function(){

       var myTable = $('#datatable').DataTable( {
        "ajax":{
          type  : "POST",
          url   : '<?php echo $baseURL;?>data_library/api.keywordstudents.php',
          data  : function(d) {
            d.type= "97";
          }}
          /*"scrollX": true,
          "bAutoWidth": false,
          "iDisplayLength": 10, 
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "columnDefs" : [{"width": "12%", "targets" : [1, 2, 3, 4, 5, 6] },
                {"visible": false, "targets" : [8, 9, 10], "orderable" : false},
                {"className": "center", "targets": "_all"},
                {"orderable": false, "targets": [1,2,3,4,5,6,9]}
                ],
        select : {
          style : 'multi' 
        }*/
      });   

//--------------------------------- TAMBAH DATA -------------------------------------      
    $('datatable tbody').on('clik','.fa-pencil-square-o',function (){
    $("#myModal12").modal('show');

    ID                  = mytable.row($(this).paretns('tr') ).data()[1];
    Books               = mytable.row($(this).paretns('tr') ).data()[2];
    Name_Students       = mytable.row($(this).paretns('tr') ).data()[3];
    Dates               = mytable.row($(this).paretns('tr') ).data()[4];
    Limit               = mytable.row($(this).paretns('tr') ).data()[5];
    Amount_Borrowing    = mytable.row($(this).paretns('tr') ).data()[6];
   


    $('txtid').val(txtid);
    $('txtbooks').val(txtbooks);
    $('txtnis_students').val(txtnis_students);
    $('txtbrdt').val(txtbrdt);
    $('txtbrlmt').val(txtbrlmt);
    $('amt_borrow').val(amt_borrow);

    })


    $('#btnsave').click(function(){
      $.post("<?php echo $baseURL;?>data_library/api.keywordstudents.php", {
        type:1,
        txtid:$('#txtid').val(),
        txtbooks:$('#txtbooks').val(),
        txtnis_students:$('#txtnis_students').val(),
        txtbrdt:$('#txtbrdt').val(),
        txtbrlmt:$('#txtbrlmt').val(),
        amt_borrow:$('#amt_borrow').val()
      
      }, function(data) {


        console.log(data);
      obj = $.parseJSON(data);

      if (obj.msg[0]=="ok") {
        $('#konfirmasi').html(
          '<div class="alert alert-success alert-dismissible fade in" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button>'+
          '<strong>SUKSES</strong><br/>'
          +obj.msg[1]+'</div>'
          );

        setTimeout(function() {
          $('#konfirmasi').html('');
        },5000);
        
        $('#txtid').val('');
        $('#txtbooks').val('');
        $('#txtnis_students').val('');
        $('#txtbrdt').val('');
        $('#txtbrlmt').val('');
        $('#amt_borrow').val('');
      
      }else {
        $('#konfirmasi').html(
          '<div class="alert alert-danger alert-dismissible fade in" role="alert">'+
            '<button type="button" class="close" data-dismiss="alert" aria-label="close"> <span aria-hidden="true">&times;</span></button>'+
          '<strong>ERROR</strong><br/>'
          +obj.msg[1]+'</div>');

        setTimeout(function() {
          $('#konfirmasi').html('');
        },5000);
      }
      
      myTable.ajax.reload();
      });
    });
// #################################### BATAS TAMBAH DATA ###################################

//--------------------------------- HAPUS DATA -------------------------------------
    $('#datatable tbody').on('click', '.fa-trash-o', function ()
    {

      var answer;
      obj= $(this).parents('tr');
      ID= myTable.row($(this).parents('tr')).data()[1];

      answer= confirm("Do you want to delete data?\n"+
        "ID         : "+myTable.row($(this).parents('tr')).data()[1] + "\n" +
        "Books     : "+myTable.row($(this).parents('tr')).data()[2] + "\n" +
        "Name_Students       : "+myTable.row($(this).parents('tr')).data()[3] + "\n" +
        "Dates    : "+myTable.row($(this).parents('tr')).data()[4] + "\n" +
        "Limit      : "+myTable.row($(this).parents('tr')).data()[5] + "\n" +
        "Amount_Borrowing    : "+myTable.row($(this).parents('tr')).data()[6] + "\n" );
        
      if (answer==false){
        exit();
      }

      console.log(txtid);
      $.post("<?php echo $baseURL;?>data_library/api.keywordstudents.php", {type:"2", txtid:ID }, function(data) {
        obj= $.parseJSON(data);
        if (obj.msg[0]=="delete"){
          $("#myModal2").modal('show');

          $('#konfirmasi').html(
            '<div class="alert alert-success alert-dismissible fade in" role="alert">'
            + '<strong>SUKSES !</strong></br>'
            + obj.msg[1]
            + '</div>'
          );

          setTimeout(function(){
            $('#konfirmasi').html('');
            $('#myModal2').modal('hide');
          }, 2000);

          myTable.ajax.reload();
        }
      });
    });
// #################################### BATAS HAPUS DATA ###################################

});

  </script>
</body> 


