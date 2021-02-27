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
  <h1 align="center">Class Schedule Data</h1>
<div class="main-content">
  <div class="main-content-inner">
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
      <ul class="breadcrumb">
        <li>
          <i class="fa fa-home"></i>
          <a href="<?php echo $baseURL;?>home">Home</a>
        </li>
        <li class="active">Class Schedule</li>
        <li class="active">Table Class Schedule</li>
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
                  Schedule
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
            Table Class Schedule
          </div>
          
          <!-- BATAS HEADER TITLE -->
          <div class="ln_solid"></div>
    
          <!--DATAGRID BERDASARKAN DATA YANG AKAN KITA TAMPILKAN -->
          <table id="datatable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="center" width="5%">No</th>    
                <th class="center" width="10%">ID_Class</th>
                <th class="center" width="*">Name_Class</th>
                <th class="center" width="*">Name_Subjects</th>
                <th class="center" width="*">Name_Teachers</th>
                <th class="center" width="10%">Days</th>
                <th class="center" width="10%">Start_Class</th>
                <th class="center" width="10%">End_Class</th>
                <th class="center" width="10%">Action</th>
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
          Form Class Register
        </div>
      </div>
      <div class="modal-body">
        <form name="f_kategori" id="f_kategori" method="post"/>
          <input type="hidden" name="" id="id" value="">
          <div id="konfirmasi"></div>
          <table class="table table-form">
            <tr><td style="width: 25%">ID_Class</td>
              <td style="width: 75%">
                <select class="chosen-select form-control" name="txt_id" id="txt_id" class="form-control" >
                      <option value="">- - select - -</option>
                      <option value="a441">a441</option>
                      <option value="a442">a442</option>
                      <option value="a443">a443</option>
                      <option value="a444">a444</option>
                      <option value="a445">a445</option>
                      <option value="a446">a446</option>
                      <option value="a447">a447</option>
                      <option value="a448">a448</option>
                      <option value="a449">a449</option>
                      <option value="a4410">a4410</option>
                      <option value="b7821">b7821</option>
                      <option value="b7822">b7822</option>
                      <option value="b7823">b7823</option>
                      <option value="b7824">b7824</option>
                      <option value="b7825">b7825</option>
                      <option value="b7826">b7826</option>
                      <option value="b7827">b7827</option>
                      <option value="b7828">b7828</option>
                      <option value="b7829">b7829</option>
                      <option value="b78210">b78210</option>
                      <option value="b78211">b78211</option>
                      <option value="b78212">b78212</option>
                      <option value="b78213">b78213</option>
                      <option value="b78214">b78214</option>
                      <option value="b78215">b78215</option>
                      <option value="b78216">b78216</option>
                      <option value="b78217">b78217</option>
                      <option value="b78218">b78218</option>
                      <option value="b78219">b78219</option>
                      <option value="b78220">b78220</option>
                      <option value="b78221">b78221</option>
                      <option value="b78222">b78222</option>
                      <option value="b78223">b78223</option>
                      <option value="b78224">b78224</option>
                      <option value="b78225">b78225</option>
                      <option value="b78226">b78226</option>
                      <option value="b78227">b78227</option>
                      <option value="b78228">b78228</option>
                      <option value="b78229">b78229</option>
                      <option value="b78230">b78230</option>
                      <option value="b78231">b78231</option>
                    </select>
              </td>
            </tr>
            <tr><td style="width: 25%">Name_Class</td>
              <td style="width: 75%">
                <select class="chosen-select form-control" name="txt_name_class" id="txt_name_class" class="form-control" >
                      <option value="">- - select - -</option>
                      <option value="A 201">A 201</option>41
                      <option value="A 202">A 202</option>
                      <option value="A 203">A 203</option>
                      <option value="A 204">A 204</option>
                      <option value="A 205">A 205</option>
                      <option value="A 201">A 301</option>
                      <option value="A 202">A 302</option>
                      <option value="A 203">A 303</option>
                      <option value="A 204">A 304</option>
                      <option value="A 205">A 305</option>
                      <option value="B 101">B 101</option>
                      <option value="B 102">B 102</option>
                      <option value="B 103">B 103</option>
                      <option value="B 104">B 104</option>
                      <option value="B 105">B 105</option>
                      <option value="B 106">B 106</option>
                      <option value="B 107">B 107</option>
                      <option value="B 108">B 108</option>
                      <option value="B 109">B 109</option>
                      <option value="B 110">B 110</option>
                      <option value="B 201">B 201</option>
                      <option value="B 202">B 202</option>
                      <option value="B 203">B 203</option>
                      <option value="B 204">B 204</option>
                      <option value="B 205">B 205</option>
                      <option value="B 206">B 206</option>
                      <option value="B 207">B 207</option>
                      <option value="B 208">B 208</option>
                      <option value="B 209">B 209</option>
                      <option value="B 210">B 210</option>
                      <option value="B 211">B 211</option>
                      <option value="B 212">B 212</option>
                      <option value="B 213">B 213</option>
                      <option value="B 214">B 214</option>
                      <option value="B 215">B 215</option>
                      <option value="B 301">B 301</option>
                      <option value="B 302">B 302</option>
                      <option value="B 305">B 305</option>
                      <option value="B 306">B 306</option>
                      <option value="B 307">B 307</option>
                      <option value="B 310">B 310</option>
                    </select>
              </td>
            </tr>
            <tr><td style="width: 25%">Name_Subjects</td>
              <td style="width: 75%">
                <select class="chosen-select form-control" name="txt_name_subjects" id="txt_name_subjects" class="form-control" >
                      <option value="">- - select - -</option>
                      <option value="Islamic religions">Islamic religions</option>
                      <option value="Civics">Civics</option>
                      <option value="Mathematics">Mathematics</option>
                      <option value="History of Indonesian">History of Indonesian</option>
                      <option value="Indonesian Language">Indonesian Language</option>
                      <option value="English Language">English Language</option>
                      <option value="Arabian Language">Arabian Language</option>
                      <option value="Japanese Language">Japanese Language</option>
                      <option value="Art and culture">Art and culture</option>
                      <option value="Handicraft">Handicraft</option>
                      <option value="Information and Communication Technologies (ICT)">Information and Communication Technologies (ICT)</option>
                      <option value="Physical health and sports">Physical health and sports</option>
                      <option value="Biology">Biology</option>
                      <option value="Physics">Physics</option>
                      <option value="Chemistry">Chemistry</option>
                      <option value="Geography">Geography</option>
                      <option value="History">History</option>
                      <option value="Sociology">Sociology</option>
                      <option value="Economics">Economics</option>
                      <option value="hadits sciences">hadits sciences</option>
                      <option value="kalam sciences">kalam sciences</option>
                      <option value="sufism">sufism</option>
                      <option value="nahwu shorof sciences">nahwu shorof sciences</option>
              </td>
            <tr><td style="width: 25%">Name_Teachers</td>
              <td style="width: 500%">
                <select class="chosen-select form-control" required name="txtnip_teachers" id="txtnip_teachers" data-placeholder="choose name teachers...">
                  <option value="">select</option>
                  <?php
                    include 'koneksi.php';
                    $select = mysqli_query($koneksi, "select * from teachers");
                    while ($data = mysqli_fetch_array($select)) {
                      echo '
                      <option value="'.$data['txtnip'].'">'.$data['txtname'].'</option>';
                    }
                  ?>
                </select>
            </tr>
            <tr>
                <td style="width: 25%">Days</td>
                <td style="width: 75%">
                    <select class="chosen-select form-control" name="txtdays" id="txtdays" class="form-control" >
                      <option value="">- - select - -</option>
                      <option value="Monday">Monday</option>
                      <option value="Tuesday">Tuesday</option>
                      <option value="Wednesday">Wednesday</option>
                      <option value="Thursday">Thursday</option>
                      <option value="Friday">Friday</option>
                    </select>
                </td>
            </tr>
            </tr><tr><td style="width: 25%">Start_Class</td>
              <td style="width: 75%">
                <input type="time" class="form-control" name="txt_startclass" id="txt_startclass" value="<?=date('H:i')?>" required value="">
              </td>
            </tr>
            <tr><td style="width: 25%">End_Class</td>
              <td style="width: 75%">
                <input type="time" class="form-control" name="txt_endclass" id="txt_endclass" value="<?=date('H:i')?>" required value="">
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
          url   : '<?php echo $baseURL;?>data_class/api.keyword.php',
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

    ID_Class          = mytable.row($(this).paretns('tr') ).data()[1];
    Name_Class        = mytable.row($(this).paretns('tr') ).data()[2];
    Name_Subjects     = mytable.row($(this).paretns('tr') ).data()[3];
    Name_Teachers     = mytable.row($(this).paretns('tr') ).data()[4];
    Days              = mytable.row($(this).paretns('tr') ).data()[5];
    Start_Class       = mytable.row($(this).paretns('tr') ).data()[6];
    End_Class         = mytable.row($(this).paretns('tr') ).data()[7];
   


    $('txt_id')             .val(txt_id);
    $('txt_name_class')     .val(txt_name_class);
    $('txt_name_subjects')  .val(txt_name_subjects);
    $('txtnip_teachers')     .val(txtnip_teachers);
    $('txtdays')            .val(txtdays);
    $('txt_startclass')     .val(txt_startclass);
    $('txt_endclass')       .val(txt_endclass);

    })


    $('#btnsave').click(function(){
      $.post("<?php echo $baseURL;?>data_class/api.keyword.php", {
        type:1,
        txt_id            :$('#txt_id').val(),
        txt_name_class    :$('#txt_name_class').val(),
        txt_name_subjects :$('#txt_name_subjects').val(),
        txtnip_teachers   :$('#txtnip_teachers').val(),
        txtdays           :$('#txtdays').val(),
        txt_startclass    :$('#txt_startclass').val(),
        txt_endclass      :$('#txt_endclass').val()
      
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
        
        $('#txt_id')            .val('');
        $('#txt_name_class')    .val('');
        $('#txt_name_subjects') .val('');
        $('#txtnip_teachers')   .val('');
        $('#txtdays')           .val('');
        $('#txt_startclass')    .val('');
        $('#txt_endclass')      .val('');
      
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
      ID_Class= myTable.row($(this).parents('tr')).data()[1];

      answer= confirm("Do you want to delete data?\n"+
        "ID_Class         : "+myTable.row($(this).parents('tr')).data()[1] + "\n" +
        "Name_Class       : "+myTable.row($(this).parents('tr')).data()[2] + "\n" +
        "Name_Subjects    : "+myTable.row($(this).parents('tr')).data()[3] + "\n" +
        "Name_Teachers    : "+myTable.row($(this).parents('tr')).data()[4] + "\n" +
        "Days             : "+myTable.row($(this).parents('tr')).data()[5] + "\n" +
        "Start_Class      : "+myTable.row($(this).parents('tr')).data()[6] + "\n" +
        "End_Class        : "+myTable.row($(this).parents('tr')).data()[7] + "\n" );
        
      if (answer==false){
        exit();
      }

      console.log(txt_id);
      $.post("<?php echo $baseURL;?>data_class/api.keyword.php", {type:"2", txt_id:ID_Class }, function(data) {
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


