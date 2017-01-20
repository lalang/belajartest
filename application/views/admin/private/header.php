<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminCP | <?php echo $title_page; ?></title>
		
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.5 -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/bootstrap/css/bootstrap.min.css') ?>"/>
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/font-awesome-4.7.0/css/font-awesome.min.css') ?>"/>
		<!-- Ionicons -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/ionicons/-2.0.1/css/ionicons.min.css') ?>"/>
		<!-- Theme style -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/dist/css/AdminLTE.min.css') ?>"/>
		<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/dist/css/skins/_all-skins.min.css') ?>"/>
		<!-- iCheck -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/plugins/iCheck/flat/blue.css') ?>"/>
		<!-- Morris chart -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/plugins/morris/morris.css') ?>"/>
		<!-- jvectormap -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>"/>
		<!-- Date Picker -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/plugins/datepicker/datepicker3.css') ?>"/>
		<!-- Daterange picker -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/plugins/daterangepicker/daterangepicker-bs3.css') ?>"/>
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="<?php echo base_url('assets_adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>"/>
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<!-- s: Upload Preview -->
		<script type="text/javascript" src="<?php echo base_url('assets/js/j_upload_img/jquery.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/script.js');?>"></script>
		
		<script>
		$(document).on('change', '.btn-file :file', function() {
		  var input = $(this),
			  numFiles = input.get(0).files ? input.get(0).files.length : 1,
			  label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		  input.trigger('fileselect', [numFiles, label]);
		});

		$(document).ready( function() {
			$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
				
				var input = $(this).parents('.input-group').find(':text'),
					log = numFiles > 1 ? numFiles + ' files selected' : label;
				
				if( input.length ) {
					input.val(log);
				} else {
					if( log ) alert(log);
				}
				
			});
		});
		</script>
		
		<style>
		    .btn-file {
			  position: relative;
			  overflow: hidden;
			}
			.btn-file input[type=file] {
			  position: absolute;
			  top: 0;
			  right: 0;
			  min-width: 100%;
			  min-height: 100%;
			  font-size: 100px;
			  text-align: right;
			  filter: alpha(opacity=0);
			  opacity: 0;
			  background: red;
			  cursor: inherit;
			  display: block;
			}
			input[readonly] {
			  background-color: white !important;
			  cursor: text !important;
			}
		</style>
	
		<!-- e: Upload Preview -->
		
		<!-- s: Datepicker-->
		<link rel="stylesheet" href="<?php echo base_url('assets/css/datepicker.css');?>" type='text/css'>
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
		<link rel="stylesheet" href="<?php echo base_url('date_picker/bootstrap-datetimepicker.min.css');?>" type='text/css'>
		<!-- e: Datepicker-->
		
		<!-- s: Editor -->
		<script type="text/javascript" src="<?php echo base_url('tinymcpuk/jscripts/tiny_mce/tiny_mce.js');?>"></script>
		<?php if(!empty($editor)){ $editor="$editor";}else{$editor="";}?>
		<?php if($editor=="first_editor"){?>
		<script type="text/javascript" src="<?php echo base_url('tinymcpuk/jscripts/tiny_mce/tiny_first_lalangdesign.js');?>"></script>		
		<?php }else{?>
		<script type="text/javascript" src="<?php echo base_url('tinymcpuk/jscripts/tiny_mce/tiny_second_lalangdesign.js');?>"></script>
		<?php }?>
		<!-- e: Editor -->
		
		<!-- s: style lalang -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style_admin_private.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/animate.css');?>" />
		<!-- e: style lalang -->
		
		<!-- s: style sosial -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/sosial_network.css');?>" />
		<!-- e: style sosial -->
		
		<!-- s: mata uang -->
		<script>
		function FormatCurrency(objNum)
		{
		   var num = objNum.value
		   var ent, dec;
		   if (num != '' && num != objNum.oldvalue)
		   {
			 num = HapusTitik(num);
			 if (isNaN(num))
			 {
			   objNum.value = (objNum.oldvalue)?objNum.oldvalue:'';
			 } else {
			   var ev = (navigator.appName.indexOf('Netscape') != -1)?Event:event;
			   if (ev.keyCode == 190 || !isNaN(num.split('.')[1]))
			   {
				 alert(num.split('.')[1]);
				 objNum.value = TambahTitik(num.split('.')[0])+'.'+num.split('.')[1];
			   }
			   else
			   {
				 objNum.value = TambahTitik(num.split('.')[0]);
			   }
			   objNum.oldvalue = objNum.value;
			 }
		   }
		}
		function HapusTitik(num)
		{
		   return (num.replace(/\./g, ''));
		}

		function TambahTitik(num)
		{
		   numArr=new String(num).split('').reverse();
		   for (i=3;i<numArr.length;i+=3)
		   {
			 numArr[i]+='.';
		   }
		   return numArr.reverse().join('');
		} 
				
		function formatCurrency(num) {
		   num = num.toString().replace(/\$|\./g,'');
		   if(isNaN(num))
		   num = "0";
		   sign = (num == (num = Math.abs(num)));
		   num = Math.floor(num*100+0.50000000001);
		   cents = num0;
		   num = Math.floor(num/100).toString();
		   for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
		   num = num.substring(0,num.length-(4*i+3))+'.'+
		   num.substring(num.length-(4*i+3));
		   return (((sign)?'':'-') + num);
		}
		</script>
		<!-- e: mata uang -->
	
		<!-- s: back to top-->
		<style>
		.cd-top {
		  display: inline-block;
		  height: 40px;
		  width: 40px;
		  position: fixed;
		  bottom: 40px;
		  right: 10px;
		  box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
		  /* image replacement properties */
		  overflow: hidden;
		  text-indent: 100%;
		  white-space: nowrap;
		  background: #c0c0c0 url(<?php echo base_url('img/cd-top-arrow.svg');?>) no-repeat center 50%;
		  visibility: hidden;
		  opacity: 0;
		  -webkit-transition: opacity .3s 0s, visibility 0s .3s;
		  -moz-transition: opacity .3s 0s, visibility 0s .3s;
		  transition: opacity .3s 0s, visibility 0s .3s;
		}
		.cd-top.cd-is-visible, .cd-top.cd-fade-out, .no-touch .cd-top:hover {
		  -webkit-transition: opacity .3s 0s, visibility 0s 0s;
		  -moz-transition: opacity .3s 0s, visibility 0s 0s;
		  transition: opacity .3s 0s, visibility 0s 0s;
		}
		.cd-top.cd-is-visible {
		  /* the button becomes visible */
		  visibility: visible;
		  opacity: 1;
		}
		.cd-top.cd-fade-out {
		  /* if the user keeps scrolling down, the button is out of focus and becomes less visible */
		  opacity: .5;
		}
		.cd-top:hover {
		  background-color: #c0c0c0;
		  opacity: 1;
		}
		@media only screen and (min-width: 768px) {
		  .cd-top {
			right: 20px;
			bottom: 20px;
		  }
		}
		@media only screen and (min-width: 1024px) {
		  .cd-top {
			height: 60px;
			width: 60px;
			right: 30px;
			bottom: 30px;
		  }
		}
		</style>
		<!-- e: back to top-->
		
		<!-- s: Color piker -->
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/build/1.2.3/css/pick-a-color-1.2.3.min.css');?>" />
		<!-- e: Color piker -->
		
		<!-- Data Tables -->
		<link href="<?=base_url('assets/css/plugins/dataTables/dataTables.bootstrap.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/plugins/dataTables/dataTables.responsive.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/plugins/dataTables/dataTables.tableTools.min.css')?>" rel="stylesheet">
		
		<!-- Data Tables -->
		<script src="<?=base_url('assets/js/plugins/dataTables/jquery.dataTables.js')?>"></script>
		<script src="<?=base_url('assets/js/plugins/dataTables/dataTables.bootstrap.js')?>"></script>
		<script src="<?=base_url('assets/js/plugins/dataTables/dataTables.responsive.js')?>"></script>
		<script src="<?=base_url('assets/js/plugins/dataTables/dataTables.tableTools.min.js')?>"></script>
		<script src="<?=base_url('assets/js/plugins/jeditable/jquery.jeditable.js')?>"></script>
		
		<!-- Summernote -->
		<script src="<?=base_url('assets/js/summernote.js')?>"></script>
	
	</head>
	<body>	
		