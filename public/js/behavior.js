$(document).ready(function () { 
    
    //add plus minus to accordion
    jQuery(function ($) {
        var $active = $('#accordion .panel-collapse.in').prev().addClass('active');
        $active.find('a').append('<i class="glyphicon fa fa-chevron-up pull-right"></i>');
        $('#accordion .panel-heading').not($active).find('a').append('<i class="glyphicon fa fa-chevron-down pull-right"></i>');
        $('#accordion').on('show.bs.collapse', function (e) {
            $('#accordion .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('fa fa-chevron-down fa fa-chevron-up');
            $(e.target).prev().addClass('active').find('.glyphicon').toggleClass('fa fa-chevron-down fa fa-chevron-up');
        })
    });
    
});