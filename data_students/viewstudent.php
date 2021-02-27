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
  <h1 align="center">Students Data</h1>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="fa fa-home"></i>
          <a href="<?php echo $baseURL;?>home">Home</a>
        </li>
        <li class="active">Students</li>
        <li class="active">Table Students</li>
      </ul><!-- /.breadcrumb -->
      <div class="nav-search" id="nav-search">
      </div><!-- /.nav-search -->
    </div>
    <div class="page-content">
      <div class="row">
        <div class="col-xs-12">
          
          <h6 align="left">
          <button class="btn btn-success"  width="10%" href="#pendaftaran" rowspan="2" onclick="return tambah_kategori('0');" class="tooltip-info" data-toggle="modal" data-rel="tooltip" title="Tambah">
              <span class="white">
                <i class="fa fa-plus"></i>
                  Add Students
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
            Table Students
          </div>
          
          <!-- BATAS HEADER TITLE -->
          <div class="ln_solid"></div>
    
          <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="center" width="5%">No</th>    
                <th class="center" width="10%">NIS</th>
                <th class="center" width="*">Name</th>
                <th class="center" width="5%">Gender</th>    
                <th class="center" width="15%">Majors</th>
                <th class="center" width="15%">Phone</th>
                <th class="center" width="20%">EMAIL</th>
                <th class="center" width="*">Address</th>    
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
          Form Students Register
        </div>
      </div>
      <div class="modal-body">
        <form name="f_kategori" id="f_kategori" method="post"/>
          <input type="hidden" name="" id="id" value="">
          <div id="konfirmasi"></div>
          <table class="table table-form">
            <tr><td style="width: 25%">NIS</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txtnis" id="txtnis" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Name</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txtname" id="txtname" required value="">
              </td>
            </tr>
            <tr>
                <td style="width: 25%">Gender</td>
                <td style="width: 75%">
                    <select class="chosen-select form-control" name="txtgender" id="txtgender" class="form-control" >
                      <option value="">- - select - -</option>
                      <option value="L">Male</option>
                      <option value="P">Female</option>
                    </select>
                </td>
            </tr>
            <tr><td style="width: 25%">Majors</td>
              <td style="width: 75%">
                <select class="chosen-select form-control" name="txtmajors" id="txtmajors" class="form-control" >
                      <option value="">- - select - -</option>
                      <option value="Natural Science">Natural Science</option>
                      <option value="Social Science">Social Science</option>
                      <option value="Religion">Religion</option>
                    </select>
              </td>
            </tr>
            
            <tr><td style="width: 25%">Phone</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txtcontact" id="txtcontact" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">EMAIL</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txtemail" id="txtemail" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Address</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txtaddress" id="txtaddress" required value="">
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
          url   : '<?php echo $baseURL;?>data_students/api.keyword.php',
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

    NIS                   = mytable.row($(this).paretns('tr') ).data()[1];
    Name                  = mytable.row($(this).paretns('tr') ).data()[2];
    Gender                = mytable.row($(this).paretns('tr') ).data()[3];
    Majors                = mytable.row($(this).paretns('tr') ).data()[4];
    Phone                 = mytable.row($(this).paretns('tr') ).data()[5];
    EMAIL                 = mytable.row($(this).paretns('tr') ).data()[6];
    Address               = mytable.row($(this).paretns('tr') ).data()[7];


    $('txtnis').val(txtnis);
    $('txtname').val(txtname);
    $('txtgender').val(txtgender);
    $('txtmajors').val(txtmajors);
    $('txtcontact').val(txtcontact);
    $('txtemail').val(txtemail);
    $('txtaddress').val(txtaddress);

    })


    $('#btnsave').click(function(){
      $.post("<?php echo $baseURL;?>data_students/api.keyword.php", {
        type:1,
        txtnis:$('#txtnis').val(),
        txtname:$('#txtname').val(),
        txtgender :$('#txtgender').val(),
        txtmajors:$('#txtmajors').val(),
        txtcontact:$('#txtcontact').val(),
        txtemail:$('#txtemail').val(),
        txtaddress:$('#txtaddress').val()
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
        
        $('#txtnis').val('');
        $('#txtname').val('');
        $('#txtgender').val('');
        $('#txtmajors').val('');
        $('#txtcontact').val('');
        $('#txtemail').val('');
        $('#txtaddress').val('');
      
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
      NIS= myTable.row($(this).parents('tr')).data()[1];

      answer= confirm("Do you want to delete data?\n"+
        "NIS        : "+myTable.row($(this).parents('tr')).data()[1] + "\n" +
        "Name      : "+myTable.row($(this).parents('tr')).data()[2] +  "\n" +
        "Gender        : "+myTable.row($(this).parents('tr')).data()[3] + "\n" +
        "Majors        : "+myTable.row($(this).parents('tr')).data()[4] + "\n" +
        "Phone        : "+myTable.row($(this).parents('tr')).data()[5] + "\n" +
        "EMAIL        : "+myTable.row($(this).parents('tr')).data()[6] + "\n" +
        "Address        : "+myTable.row($(this).parents('tr')).data()[7] + "\n" );

      if (answer==false){
        exit();
      }

      console.log(txtnis);
      $.post("<?php echo $baseURL;?>data_students/api.keyword.php", {type:"2", txtnis:NIS }, function(data) {
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

      NIS     = myTable.row($(this).parents('tr')).data()[1];
      Name      = myTable.row($(this).parents('tr')).data()[2];
      Gender   = myTable.row( $(this).parents('tr')).data()[3];  
      Majors   = myTable.row( $(this).parents('tr')).data()[4];
      Phone   = myTable.row( $(this).parents('tr')).data()[5];
      EMAIL   = myTable.row( $(this).parents('tr')).data()[6];
      Address   = myTable.row( $(this).parents('tr')).data()[7];

      $('#txtnis').val(NIS);
      $('#txtname').val(Name);
      $('#txtgender').val(Gender).prop('selected', true).trigger('chosen:updated');
      $('#txtmajors').val(Majors).prop('selected', true).trigger('chosen:updated');
      $('#txtcontact').val(Phone);
      $('#txtemail').val(EMAIL);
      $('#txtaddress').val(Address);

    });

// ############################## BATAS UBAH DATA ###################################

});

  </script>
</body>