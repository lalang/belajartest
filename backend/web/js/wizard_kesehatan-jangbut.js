$(document).ready(function() {

    function load_js()
    {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = '/js/openlayers-2.12/OpenLayers.js';
        head.appendChild(script).remove();
    }
    // IZIN KESEHATAN

    $('.kesehatan-form').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
            // return false;
            load_js();
        },
        onTabShow: function(tab, navigation, index) {

            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('.kesehatan-form').find('.bar').css({width: $percent + '%'});

            // If it's the last tab then hide the last button and show the finish instead
            if ($current >= $total) {
                $('.kesehatan-form').find('.pager .next').hide();
                $('.kesehatan-form').find('.pager .finish').hide();

            } else if (index == 0) {
                $('.kesehatan-form').find('.pager .next').show();
                $('.kesehatan-form').find('.pager .previous').hide();
                $('.kesehatan-form').find('.pager .finish').hide();
            } else {
                $('.kesehatan-form').find('.pager .next').show();
                $('.kesehatan-form').find('.pager .previous').show();
                $('.kesehatan-form').find('.pager .finish').hide();
            }

        },
        'onNext': function(tab, navigation, index) {
            load_js();

        }
    });

});
