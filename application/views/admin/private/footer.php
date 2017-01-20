</div><!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.0
    </div>
    <strong>Copyright &copy; 2015 <a href="http://domain.com">domain.Com</a>.</strong> All rights reserved.
</footer>
</div>

	<!-- s: back to top -->
	<a href="#0" class="cd-top" style='text-align: left'></a>
	<script src="<?php echo base_url('js/main.js');?>"></script>
	<!-- e: back to top -->

	<!-- s: date_picker -->
	<script type="text/javascript" src="<?php echo base_url('date_picker/js/bootstrap-datetimepicker.js');?>" charset="UTF-8"></script>
	<script type="text/javascript" src="<?php echo base_url('date_picker/js/bootstrap-datetimepicker.id.js');?>" charset="UTF-8"></script>
	<script type="text/javascript">
	 $('.form_date').datetimepicker({
			language:  'id',
			weekStart: 1,
			todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
		});
	</script>
	<!-- e: date_picker -->
	
	

	<!-- jQuery 2.1.4 --//bentrok sama color piker
	<script src="<?php echo base_url('assets_adminlte/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url('assets_adminlte/js/jquery-ui.min.js') ?>"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
	<!-- Bootstrap 3.3.5 -->
	<script src="<?php echo base_url('assets_adminlte/bootstrap/js/bootstrap.min.js') ?>"></script>
	<!-- Morris.js charts -->
	<script src="<?php echo base_url('assets_adminlte/bootstrap/js/raphael-min.js') ?>"></script>
	<script src="<?php echo base_url('assets_adminlte/plugins/morris/morris.min.js') ?>"></script>
	<!-- Sparkline -->
	<script src="<?php echo base_url('assets_adminlte/plugins/sparkline/jquery.sparkline.min.js') ?>"></script>
	<!-- jvectormap -->
	<script src="<?php echo base_url('assets_adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
	<script src="<?php echo base_url('assets_adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url('assets_adminlte/plugins/knob/jquery.knob.js') ?>"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url('assets_adminlte/js/moment.min.js') ?>"></script>
	<script src="<?php echo base_url('assets_adminlte/plugins/daterangepicker/daterangepicker.js') ?>"></script>
	<!-- datepicker -->
	<script src="<?php echo base_url('assets_adminlte/plugins/datepicker/bootstrap-datepicker.js') ?>"></script>
	<!-- Bootstrap WYSIHTML5 -->
	<script src="<?php echo base_url('assets_adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
	<!-- Slimscroll -->
	<script src="<?php echo base_url('assets_adminlte/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url('assets_adminlte/plugins/fastclick/fastclick.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url('assets_adminlte/dist/js/app.min.js') ?>"></script>
	
	<!-- s: ckeditor -->
	<script src="<?php echo base_url('ckeditor/ckeditor.js') ?>"></script>
	<script src="<?php echo base_url('ckeditor/samples/js/sample.js') ?>"></script>

	<script>
		initSample();
	</script>
	<!-- e: ckeditor -->
	
	<!-- s: alert action -->
	<script>
	$(document).ready(function() {
		$('#alertSubmit').show('slow').delay(5000).hide('slow');
			
	});	
	</script>  
	<!-- e: alert action -->






		<script>
	    $(document).ready(function() {

	    	//summernote
	    	$('.summernote').summernote({
	    		 minHeight: 100,
	    	});

	        //data table
	        $('.dataTables-example').dataTable({
	            responsive: true,
	            // scrollX: true,
	            "dom": 'T<"clear">lfrtip',
	            "tableTools": {
	                "sSwfPath": "http://localhost/bbg_sima/assets/kitchen/js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
	            }
	        });

	        //date picker
	        $('.mydate').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'dd-mm-yyyy',
            });

            //chosen-select
            var config = {
                '.chosen-select'           : {},
                '.chosen-select-deselect'  : {allow_single_deselect:true},
                '.chosen-select-no-single' : {disable_search_threshold:10},
                '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
                '.chosen-select-width'     : {width:"95%"}
            }

            for (var selector in config) {
                $(selector).chosen(config[selector]);
            }

	        //Activate the iCheck Plugin
	        // $('input[type="checkbox"]').iCheck({
	        //   checkboxClass: 'icheckbox_flat-blue',
	        //   radioClass: 'iradio_flat-blue'
	        // });
	        //Make the dashboard widgets sortable Using jquery UI
	        $(".connectedSortable").sortable({
	          placeholder: "sort-highlight",
	          connectWith: ".connectedSortable",
	          handle: ".box-header, .nav-tabs",
	          forcePlaceholderSize: true,
	          zIndex: 999999
	        });
	        $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");
	        //jQuery UI sortable for the todo list
	        $(".todo-list").sortable({
	          placeholder: "sort-highlight",
	          handle: ".handle",
	          forcePlaceholderSize: true,
	          zIndex: 999999
	        });

	        //bootstrap WYSIHTML5 - text editor
	        $(".textarea").wysihtml5();

	        $('.daterange').daterangepicker(
	                {
	                  ranges: {
	                    'Today': [moment(), moment()],
	                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
	                    'Last 7 Days': [moment().subtract('days', 6), moment()],
	                    'Last 30 Days': [moment().subtract('days', 29), moment()],
	                    'This Month': [moment().startOf('month'), moment().endOf('month')],
	                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
	                  },
	                  startDate: moment().subtract('days', 29),
	                  endDate: moment()
	                },
	        function (start, end) {
	          alert("You chose: " + start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
	        });

	        /* jQueryKnob */
	        $(".knob").knob();

	        //jvectormap data
	        var visitorsData = {
	          "US": 398, //USA
	          "SA": 400, //Saudi Arabia
	          "CA": 1000, //Canada
	          "DE": 500, //Germany
	          "FR": 760, //France
	          "CN": 300, //China
	          "AU": 700, //Australia
	          "BR": 600, //Brazil
	          "IN": 800, //India
	          "GB": 320, //Great Britain
	          "RU": 3000 //Russia
	        };
	        //World map by jvectormap
	        $('#world-map').vectorMap({
	          map: 'world_mill_en',
	          backgroundColor: "transparent",
	          regionStyle: {
	            initial: {
	              fill: '#e4e4e4',
	              "fill-opacity": 1,
	              stroke: 'none',
	              "stroke-width": 0,
	              "stroke-opacity": 1
	            }
	          },
	          series: {
	            regions: [{
	                values: visitorsData,
	                scale: ["#92c1dc", "#ebf4f9"],
	                normalizeFunction: 'polynomial'
	              }]
	          },
	          onRegionLabelShow: function (e, el, code) {
	            if (typeof visitorsData[code] != "undefined")
	              el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
	          }
	        });

	        //Sparkline charts
	        var myvalues = [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021];
	        $('#sparkline-1').sparkline(myvalues, {
	          type: 'line',
	          lineColor: '#92c1dc',
	          fillColor: "#ebf4f9",
	          height: '50',
	          width: '80'
	        });
	        myvalues = [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921];
	        $('#sparkline-2').sparkline(myvalues, {
	          type: 'line',
	          lineColor: '#92c1dc',
	          fillColor: "#ebf4f9",
	          height: '50',
	          width: '80'
	        });
	        myvalues = [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21];
	        $('#sparkline-3').sparkline(myvalues, {
	          type: 'line',
	          lineColor: '#92c1dc',
	          fillColor: "#ebf4f9",
	          height: '50',
	          width: '80'
	        });

	        //The Calender
	        $("#calendar").datepicker();

	        //SLIMSCROLL FOR CHAT WIDGET
	        $('#chat-box').slimScroll({
	          height: '250px'
	        });

	       
	    });

	  	function CheckNumeric() {
	  	    // if ((event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode==46 || event.keyCode==44) {

	  	    // }else{
	  	    //     return                
	  	    // }
	  	    // event.keyCode >= 48 && event.keyCode <= 57 && event.keyCode==46 && event.keyCode==44
	  	    //return (event.keyCode >= 48 && event.keyCode <= 57) || event.keyCode=46;

	  	    if ((event.keyCode < 48 || event.keyCode > 57)){
	  	         if((event.keyCode == 45 || event.keyCode == 46 )){
	  	          event.returnValue = true;
	  	    }else{
	  	        event.returnValue = false;
	  	       }
	  	    }              
	  	}
	  	
	  	function FormatCurrency(ctrl) {
	      //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
	      if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40)
	      {
	          return;
	      }

	      var val = ctrl.value;

	      val = val.replace(/,/g, "")
	      ctrl.value = "";
	      val += '';
	      x = val.split('.');
	      x1 = x[0];
	      x2 = x.length > 1 ? '.' + x[1] : '';

	      var rgx = /(\d+)(\d{3})/;

	      while (rgx.test(x1)) {
	          x1 = x1.replace(rgx, '$1' + ',' + '$2');
	      }

	      ctrl.value = x1 + x2;
	      // parseFloat(x1 + x2).toFixed(2);
	      //console.log(ctl);
	  	}

	</script>

	<style>
	    body.DTTT_Print {
	        background: #fff;

	    }
	    .DTTT_Print #page-wrapper {
	        margin: 0;
	        background:#fff;
	    }

	    button.DTTT_button, div.DTTT_button, a.DTTT_button {
	        border: 1px solid #e7eaec;
	        background: #fff;
	        color: #676a6c;
	        box-shadow: none;
	        padding: 6px 8px;
	    }
	    button.DTTT_button:hover, div.DTTT_button:hover, a.DTTT_button:hover {
	        border: 1px solid #d2d2d2;
	        background: #fff;
	        color: #676a6c;
	        box-shadow: none;
	        padding: 6px 8px;
	    }

	    .dataTables_filter label {
	        margin-right: 5px;

	    }
	</style>

	<!-- custom script -->

	<script type="text/javascript">

	    function savePost(idform,url,redirect){
	        //script agar ckeditor dapat mem-post value di textarea
	        // for(instance in CKEDITOR.instances) {
	        //     CKEDITOR.instances[instance].updateElement();
	        // }
	        //script ckeditor selesai

	        dataString = $("#"+idform).serialize();
	        $.ajax({
	            type:"POST",
	            url: url,
	            data: dataString,
	            dataType: 'json',
	            success: function(data){
	                if(data.response == "success"){
	                    alertify.success(data.message);
	                    window.setTimeout(function(){window.location = redirect},2000);
	                }else{
	                    alertify.error(data.message);
	                }
	            }
	        });
	    }

	    function HapusData(table,primary,id){
	        var message = "Hapus Data Ini ?";
	        alertify.confirm(message, function (e) {
	            if (e) {
	                var url  = "<?=base_url()?>kitchen/remove_data/"+table+"/"+primary+"/"+id;
	                $.ajax({
	                    type:"POST",
	                    url: url,
	                    dataType: 'json',
	                    success: function(data){
	                        if(data.response == "success"){
	                            alertify.success(data.message);
	                            document.ready(window.setTimeout(function(){location.reload()},2000));
	                        }else{
	                           alertify.error(data.message);
	                        }
	                    }
	                });
	            } else {
	                return false;
	            }
	        });
	    }

	    function SaveOnclick(message,url,redirect){
	        // var message = "Apakah anda yakin akan menghapus data ini ?";
	        alertify.confirm(message, function (e) {
	            if (e) {
	                $.ajax({
	                    type:"POST",
	                    url: url,
	                    dataType: 'json',
	                    success: function(data){
	                        if(data.response == "success"){
	                            alertify.success(data.message);
	                            document.ready(window.setTimeout(function(){window.location = redirect},2000));
	                        }else{
	                           alertify.error(data.message);
	                        }
	                    }
	                });
	            } else {
	                return false;
	            }
	        });
	    }

	    //var pageIDForm = "";

	    function submitForm(pageID) {
	        //tinyMCE.triggerSave();
	        // for(instance in CKEDITOR.instances) {
	        //     CKEDITOR.instances[instance].updateElement();
	        // }
	        
	        $('#'+pageID).submit();
	        pageIDForm = pageID;
	    }
	     
	    $('#post-form').ajaxForm({                
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
	            alertify.success(responseText.message);
	            window.setTimeout(function(){window.location.replace(responseText.url)},2000);
	        }else{
	            alertify.error(responseText.message);
	        }
	    }

		
	</script>
		
		
    </body>
</html>