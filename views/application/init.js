(function ($) {
    $(function () {

        $('.search').click(function () {
           
            $("#search_result").load("search_result.html");
        });

    });
})(jQuery);
