(function ($) {
    $(function () {


        $(document).ready(function () {
            var email = sessionStorage.getItem("emailid");
            var icon_telephone = sessionStorage.getItem("phoneno");
            $('#email').val(email);
            $('#icon_telephone').val(icon_telephone);
        });

        var d = new Date();
        var fy = d.getFullYear();
        var da = d.getDate();
        var mo = d.getMonth();
        $('.datepicker').pickadate({
            selectMonths: true, // Creates a dropdown to control month
            selectYears: 90, // Creates a dropdown of 15 years to control year
            max: new Date(fy - 5, mo, da),
            closeOnSelect: true
        });

        if($('#checkbox').is(":checked"))
            {
                console.log("true");
                $('#checkbox').val("1");
            }
        else {
                console.log("false");
                $('#checkbox').val("0");
             }

        $('.btn').click(function () {
            window.open("http://localhost/final_project_1/index.php/welcome/user/");
             });

    });
})(jQuery);