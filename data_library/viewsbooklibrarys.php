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
  <h1 align="center">Books Library Data</h1>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="fa fa-home"></i>
          <a href="<?php echo $baseURL;?>home">Home</a>
        </li>
        <li class="active">Books Library</li>
        <li class="active">Table Books Library</li>
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
                <i class="fa fa-pencil"></i>
                  Add Books
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
            Table Teacher Librarys
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
                <th class="center" width="*">Author</th> 
                <th class="center" width="10%">Years</th>
                <th class="center" width="10%">Stock</th>
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
          Form books Library Register
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
                <input type="text" class="form-control" name="txtname_books" id="txtname_books" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Author</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txt_author" id="txt_author" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Years</td>
              <td style="width: 75%">
                <input type="date" class="form-control" name="txtyears" id="txtyears" value="<?=date('Y-m-d')?>" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Stock</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txt_stock" id="txt_stock" required value="">
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
          url   : '<?php echo $baseURL;?>data_library/api.keywordbooks.php',
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
    Author              = mytable.row($(this).paretns('tr') ).data()[3];
    Years               = mytable.row($(this).paretns('tr') ).data()[4];
    Stock               = mytable.row($(this).paretns('tr') ).data()[5];
   


    $('txtid').val(txtid);
    $('txtname_books').val(txtname_books);
    $('txt_author').val(txt_author);
    $('txtyears').val(txtyears);
    $('txt_stock').val(txt_stock);

    })


    $('#btnsave').click(function(){
      $.post("<?php echo $baseURL;?>data_library/api.keywordbooks.php", {
        type:1,
        txtid:$('#txtid').val(),
        txtname_books:$('#txtname_books').val(),
        txt_author:$('#txt_author').val(),
        txtyears:$('#txtyears').val(),
        txt_stock:$('#txt_stock').val()
      
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
        $('#txtname_books').val('');
        $('#txt_author').val('');
        $('#txtyears').val('');
        $('#txt_stock').val('');
      
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
        "Author       : "+myTable.row($(this).parents('tr')).data()[3] +  "\n" +
        "Years    : "+myTable.row($(this).parents('tr')).data()[4] + "\n" +
        "Stock      : "+myTable.row($(this).parents('tr')).data()[5] + "\n" );
        
      if (answer==false){
        exit();
      }

      console.log(txtid);
      $.post("<?php echo $baseURL;?>data_library/api.keywordbooks.php", {type:"2", txtid:ID }, function(data) {
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

//--------------------------------- UBAH DATA -------------------------------------
    $('#datatable tbody').on('click','.fa-pencil-square-o',function ()
    {
      $("#pendaftaran").modal('show');

      ID       = myTable.row($(this).parents('tr')).data()[1];
      Books    = myTable.row($(this).parents('tr')).data()[2];
      Author= myTable.row($(this).parents('tr')).data()[3];
      Years    = myTable.row($(this).parents('tr')).data()[4];
      Stock    = myTable.row($(this).parents('tr')).data()[5];
      

      $('#txtid').val(ID);
      $('#txtname_books').val(Books);
      $('#txt_author').val(Author);
      $('#txtyears').val(Years);
      $('#txt_stock').val(Stock);

    });

// ############################## BATAS UBAH DATA ###################################

});

  </script>
</body> 


