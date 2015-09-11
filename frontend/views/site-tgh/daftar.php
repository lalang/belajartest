<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use \yii\db\Query;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

AppAsset::register($this);
/* @var $this yii\web\View */
$this->title = 'Perizinan';
$this->context->layout = 'main-no-landing';
?>

<div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Selamat datang di mode pendaftaran</h2>
                <p>
                    Khusus Pemohon warga DKI Jakarta, Sistem akan otomatis memvalidasi nomor NIK dan KK Anda dengan Data Kependudukan (Sumber : Dinas Kependudukan dan Catatan Sipil Pemprov DKI Jakarta)
                </p>
                
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="index.html">
                            <div class="col-md-9">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="index.html">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-9">
                              <select name="type" class="form-control" id="type" onchange="return changeType(this.value)">
                                <option value="perorangan">Perorangan</option>
                                <option value="badan">Badan Hukum</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">KTP</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="ktp" placeholder="KTP" />
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>


                        
                    </form>
                    
                </div>
            </div>

                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Type</label>
                            <div class="col-sm-9">
                              <select name="type" class="form-control" id="type" onchange="return changeType(this.value)">
                                <option value="perorangan">Perorangan</option>
                                <option value="badan">Badan Hukum</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">KTP</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="ktp" placeholder="KTP" />
                            </div>
                          </div>
                          <div class="form-group perorangan">
                            <label class="col-sm-3 control-label">KK</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="kk" placeholder="KK" />
                            </div>
                          </div>
                          <div class="form-group badan" style="display:none;">
                            <label class="col-sm-3 control-label">NPWP</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="npwp" placeholder="NPWP" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                              <input type="email" name="email" class="form-control" placeholder="Email" />
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="phone" placeholder="Phone" />
                            </div>
                          </div>
                          <hr />
                          <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                              <button type="button" onclick="return submitForm('add-form')" class="btn btn-warning btn-lg">Daftar</button>
                            </div>
                          </div> 
                    </form>
                   
                </div>
            </div>
        </div>

</div>


<script type="text/javascript">

$(function() {
$( ".autocomplete" ).autocomplete({
  source: function( request, response ) {
    $.ajax({
      url: "http://ptsp2.tratapp.com/autocomplete/lokasi",
      dataType: "json",
      data: {
        q: request.term
      },
      success: function( data ) {
        response( data );
      }
    });
  },
  minLength: 3,
  select: function( event, ui ) {
    console.log(ui.item.keterangan);
    $('.autocomplete').val(ui.item.label);
    google_map(ui.item.longtitude,ui.item.latitude,ui.item.label,ui.item.keterangan);
    return false;
  },
  open: function() {
    $( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
  },
  close: function() {
    $( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
  }
});
});


function changeType(valval)
{
	if(valval == 'perorangan'){
		$('.badan').hide();
		$('.perorangan').show();
	}else{
		$('.perorangan').hide();
		$('.badan').show();
	}
}

var pageIDForm = "";

function submitForm(pageID) {
    $('#'+pageID).submit();
    pageIDForm = pageID;
}
 
$('#add-form').ajaxForm({                
    dataType        : 'json',
    beforeSubmit    : ShowRequest,
    success         : SubmitSuccesful,
    error           : AjaxError                              
});

$('#login-form').ajaxForm({                
    dataType        : 'json',
    beforeSubmit    : ShowRequest,
    success         : SubmitSuccesful,
    error           : AjaxError                              
});

function ShowRequest(formData, jqForm, options) {
  var queryString = $.param(formData);
  $("#message-loader").show();
  return true;
}

function AjaxError(){
    alertify.alert("Oppsss, an unknown error has occurred. You need to refresh the browser to see whether your data is saved (or not).");
    //alert(statusText);
}

function SubmitSuccesful(responseText, statusText) {
    $("#message-loader").hide();
    if(responseText.response == "success"){
        // alertify.success(responseText.message);
        window.setTimeout(function(){window.location.replace(responseText.url)},2000);
    }else{
        alertify.error(responseText.message);
    }
}

</script>