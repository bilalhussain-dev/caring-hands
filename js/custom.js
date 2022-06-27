$(document).ready(function () {
    $(".fancybox").fancybox({
        autoPlay: true,
        openSpeed: 500,
        openEffect: 'fade',
        nextEffect: 'fade',
        prevEffect: 'fade',
        helpers: {
            title: {
                type: 'inside'
            },
            buttons: {},
        }
    });
});
