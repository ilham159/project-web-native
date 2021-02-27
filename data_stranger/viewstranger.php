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
  <h1 align="center">visitors Data</h1>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="fa fa-home"></i>
          <a href="<?php echo $baseURL;?>home">Home</a>
        </li>
        <li class="active">Visitors</li>
        <li class="active">Table Visitors</li>
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
                  Add Visitors
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
            Table Visitors
          </div>
          
          <!-- BATAS HEADER TITLE -->
          <div class="ln_solid"></div>
    
          <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="center" width="5%">No</th>    
                <th class="center" width="10%">No_Identity</th>
                <th class="center" width="*">Name</th>
                <th class="center" width="5%">Gender</th>    
                <th class="center" width="20%">Address</th>
                <th class="center" width="10%">Phone</th>
                <th class="center" width="*">School_Origin</th>
                <th class="center" width="10%">Information</th>    
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
          Form Strangers Register
        </div>
      </div>
      <div class="modal-body">
        <form name="f_kategori" id="f_kategori" method="post"/>
          <input type="hidden" name="" id="" value="">
          <div id="konfirmasi"></div>
          <table class="table table-form">
            <tr><td style="width: 25%">No_Identity</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txt_identity" id="txt_identity" required value="">
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
            <tr><td style="width: 25%">Address</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txtaddress" id="txtaddress" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Phone</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txtcontact" id="txtcontact" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">School_Origin</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txt_student" id="txt_student" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">Information</td>
              <td style="width: 75%">
                <input type="text" class="form-control" name="txt_info" id="txt_info" required value="">
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
          url   : '<?php echo $baseURL;?>data_stranger/api.keyword.php',
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

    No_Identity      = mytable.row($(this).paretns('tr') ).data()[1];
    Name        = mytable.row($(this).paretns('tr') ).data()[2];
    Gender        = mytable.row($(this).paretns('tr') ).data()[3];
    Address        = mytable.row($(this).paretns('tr') ).data()[4];
    School_Origin        = mytable.row($(this).paretns('tr') ).data()[6];
    Information= mytable.row($(this).paretns('tr') ).data()[7];



    $('txtnis').val(txtnis);
    $('txtname').val(txtname);
    $('txtgender').val(txtgender);
    $('txtaddress').val(txtaddress);
    $('txtcontact').val(txtcontact);
    $('txt_student').val(txt_student);
    $('txt_info').val(txt_info);

    })


    $('#btnsave').click(function(){
      $.post("<?php echo $baseURL;?>data_stranger/api.keyword.php", {
        type:1,
        txt_identity:$('#txt_identity').val(),
        txtname:$('#txtname').val(),
        txtgender :$('#txtgender').val(),
        txtaddress:$('#txtaddress').val(),
        txtcontact:$('#txtcontact').val(),
        txt_student:$('#txt_student').val(),
        txt_info:$('#txt_info').val()
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
        
        $('#txt_identity').val('');
        $('#txtname').val('');
        $('#txtgender').val('');
        $('#txtaddress').val('');
        $('#txtcontact').val('');
        $('#txt_student').val('');
        $('#txt_info').val('');
      
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
      No_Identity= myTable.row($(this).parents('tr')).data()[1];

      answer= confirm("Do you want to delete data?\n"+
        "No_Identity        : "+myTable.row($(this).parents('tr')).data()[1] + "\n" +
        "Name      : "+myTable.row($(this).parents('tr')).data()[2] +  "\n" +
        "Gender        : "+myTable.row($(this).parents('tr')).data()[3] + "\n" +
        "Address        : "+myTable.row($(this).parents('tr')).data()[4] + "\n" +
        "Phone        : "+myTable.row($(this).parents('tr')).data()[5] + "\n" +
        "School_Origin        : "+myTable.row($(this).parents('tr')).data()[6] + "\n" +
        "Information        : "+myTable.row($(this).parents('tr')).data()[7] + "\n" );

      if (answer==false){
        exit();
      }

      console.log(txt_identity);
      $.post("<?php echo $baseURL;?>data_stranger/api.keyword.php", {type:"2", txt_identity:No_Identity }, function(data) {
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

      No_Identity     = myTable.row($(this).parents('tr')).data()[1];
      Name      = myTable.row($(this).parents('tr')).data()[2];
      Gender   = myTable.row( $(this).parents('tr')).data()[3];
      Address   = myTable.row( $(this).parents('tr')).data()[4];
      Phone   = myTable.row( $(this).parents('tr')).data()[5];
      School_Origin   = myTable.row( $(this).parents('tr')).data()[6];
      Information   = myTable.row( $(this).parents('tr')).data()[7];

      $('#txt_identity').val(No_Identity);
      $('#txtname').val(Name);
      $('#txtgender').val(Gender).prop('selected', true).trigger('chosen:updated');
      $('#txtaddress').val(Address);
      $('#txtcontact').val(Phone);
      $('#txt_student').val(School_Origin);
      $('#txt_info').val(Information);

    });

// ############################## BATAS UBAH DATA ###################################

});

  </script>
</body>