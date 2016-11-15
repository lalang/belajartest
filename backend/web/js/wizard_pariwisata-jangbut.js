$(document).ready(function() {

    // IZIN pariwisata
    $('.pariwisata-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            // return false;
        },
        onTabShow: function(tab, navigation, index) {

            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('.pariwisata-form').find('.bar').css({width: $percent + '%'});

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $('.pariwisata-form').find('.pager .next').hide();
                $('.pariwisata-form').find('.pager .finish').hide();

            } else if (index == 0) {
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

        }
    });

});
