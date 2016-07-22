$(document).ready(function() {
      
    $('.jangbut-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            return false;
        },
        onTabShow: function(tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index+1;
            var $percent = ($current/$total) * 100;
            $('.jangbut-form').find('.bar').css({width:$percent+'%'});

            // If it's the last tab then hide the last button and show the finish instead
            if($current >= $total) {
                $('.jangbut-form').find('.pager .next').hide();
                $('.jangbut-form').find('.pager .finish').hide();

            } else if(index == 0) {
                $('.jangbut-form').find('.pager .next').show();
                $('.jangbut-form').find('.pager .previous').hide();
                $('.jangbut-form').find('.pager .finish').hide();
            } else {
		$('.jangbut-form').find('.pager .next').show();
		$('.jangbut-form').find('.pager .previous').show();
                $('.jangbut-form').find('.pager .finish').hide();
	    }

        },
        'onNext': function(tab, navigation, index) {
            
             
        }
    });
});
