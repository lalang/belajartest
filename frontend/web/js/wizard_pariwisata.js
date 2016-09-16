$(document).ready(function() {
    
    var max_number = 100;


    $('.pariwisata-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            //return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.pariwisata-form').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.pariwisata-form').find('.pager .next').hide();
                $('.pariwisata-form').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.pariwisata-form').find('.pager .next').show();
                $('.pariwisata-form').find('.pager .previous').hide();
                $('.pariwisata-form').find('.pager .finish').hide();
            } else {
		$('.pariwisata-form').find('.pager .next').show();
		$('.pariwisata-form').find('.pager .previous').show();
                $('.pariwisata-form').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
            if(index==1) {
                // Make sure we entered the name
                if(!$('#izinpariwisata-nama').val()) {
                    alert('Nama tidak boleh kosong');
                    $('#izinpariwisata-nama').focus();
                    return false;
                }

             
            }
            if(index==2) {
                // Make sure we entered the name
                if(!$('#izinpariwisata-npwp_perusahaan').val() && $('#izinpariwisata-tipe').val()=="Perusahaan") {
                    alert('npwp perusahaan tidak boleh kosong');
                    $('#izinpariwisata-npwp_perusahaan').focus();
                    return false;
                }
            }
            if(index==3) {
                // Make sure we entered the name
               
            }

            if(index==4) {
                // Make sure we entered the name
               
            }

            if(index==5){
                
            
            }

            if(index==6) {
                
            }
        }
    });
});
