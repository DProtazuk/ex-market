$(document).ready(function(){
    $('.copy-referral-link').click(function(){

        var clipboard = new ClipboardJS('.copy-referral-link');
        $('.copy-referral-link path').attr('fill-opacity', 1);

    });
});