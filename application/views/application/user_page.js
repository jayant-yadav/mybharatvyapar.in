// This just toggles the follow/following of the button
/*
$('a.follow').click(function () {
    $(this).toggleClass('followed');

    if ($(this).hasClass('followed')) {
        $(this).text('Followed');
        $('ul li:last-child').html('325<span>Followers</span>');
    } else {
        $(this).text('Follow Nick');
        $('ul li:last-child').html('324<span>Followers</span>');
    }
});
*/


(function ($) {
    $(function () {

        //$("#content").load("http://localhost/final_project_1/index.php/welcome/timeline");

        /*$('.timeline').click(function () {


            $.ajax({
                url: 'http://localhost/final_project_1/index.php/welcome/user',
                type: 'POST',
                data: {
                    query: $("#search").val(), //see ,
                },
                success: function (data) {}
            });




            $("#content").load("http://localhost/final_project_1/index.php/welcome/timeline");

        });

        $('.following').click(function () {

            $("#content").load("http://localhost/final_project_1/application/views/following.html");
        });

        $('.notifications').click(function () {

            $("#content").load("http://localhost/final_project_1/application/views/notifications.html");
        });*/

        
    });
})(jQuery);