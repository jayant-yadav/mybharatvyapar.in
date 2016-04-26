(function ($) {
    $(function () {


        $('#login_').reveal({
            animation: 'fadeAndPop', //fade, fadeAndPop, none
            animationspeed: 300, //how fast animtions are
            closeonbackgroundclick: true, //if you click background will modal close?
            dismissmodalclass: 'close-reveal-modal' //the class of a button or element that will close an open modal
        });

        /*$('#login_').foundation('reveal', 'open');
        $('#login_').foundation('reveal', 'close');
*/
        $('.search').click(function () {
            //$("#search_result").load("http://localhost/final_project_1/application/views/search_result.html");
            event.preventDefault();
            //            console.log("asdas");
            $.ajax({
                url: 'http://localhost/final_project_1/index.php/welcome/search',
                type: 'POST',
                data: {
                    query: $("#search").val(), //see ,
                },
                success: function (data) {
                    //                    console.log(data); //controller redirecting to model, will this function get success even then?
                    if (data != '0') {
                        // alert("Yes we are logged in");
                        $obj = JSON.parse(data);
                        //                        console.log($obj);
                        // header('Location: ./');
                        $("#search_result").load("http://localhost/final_project_1/application/views/search_result.html", function () {
                            $("p#searchtitle").replaceWith(" Search Results for \"" + $("#search").val() + "\": " + $obj.length + "");
                            makeresult($obj); //since we are using jQuery, no need to parse response BUT stringify if needed

                          
                        });




                    } else if (data == '0') {
                        alert("sorry no information found in database");

                    }
                }
            });
        });

        function makeresult(data) {


            $("h5.shopname").replaceWith('<h5 class="shopname" id="nameshop0">' + $obj[0].shop_name + '</h5>');
            $("li.add").replaceWith('<li class="add" id="add0"><strong>Address: </strong>' + $obj[0].street + '</li><br>');
            $("li.timming").replaceWith('<li class="timing" id="timing0"><strong>Timings:</strong>' + $obj[0].timing + '</li>');
            $("li.rating").replaceWith('<li class="rating" id="rating0"><strong>Ratings:</strong>' + $obj[0].rating + '/5.0</li>');
            $('#button0').attr('value', $obj[0].id);
            for (var i = 1; i < 10; i++) {
                makeidcard($obj[i], i);
                console.log($obj[i].id);
            }


        }



        function makeidcard(shopdata, i) {
            //            $( ".head" ).before("<p id="here"></p>");
            var d = $("#search" + (i - 1)).clone(true);
            // var string = 'search'+i
            $('#search' + (i - 1)).attr('id', 'search' + i);
            $('#nameshop' + (i - 1)).attr('id', 'nameshop' + i);
            $('#add' + (i - 1)).attr('id', 'add' + i);
            $('#timing' + (i - 1)).attr('id', 'timing' + i);
            $('#rating' + (i - 1)).attr('id', 'rating' + i);
            $('#button'+(i-1)).attr('id','button'+i);
            $('#button'+(i)).attr('value',$obj[i].id);


            $("#nameshop" + i + "").replaceWith('<h5 class="shopname" id="nameshop' + i + '">' + $obj[i].shop_name + '</h5>');
            $("#add" + i + "").replaceWith('<li class="add" id="add' + i + '"><strong>Address: </strong>' + $obj[i].street + '</li>');
            $("#timing" + i + "").replaceWith('<li class="timing" id="timing' + i + '"><strong>Timings:</strong>' + $obj[i].timing + '</li>');
            $("#rating" + i + "").replaceWith('<li class="rating" id="rating' + i + '"><strong>Ratings:</strong>' + $obj[i].rating + '/5.0</li>');


            $("#here0").before(d);

        }




        $('.signup').click(function () {
            sessionStorage.setItem("emailid", document.getElementById('email').value);
            sessionStorage.setItem("phoneno", document.getElementById('tel').value);
            sessionStorage.setItem("vendor", document.getElementById('yes-no').value);
            //            window.open("http://localhost/final_project_1/application/views/signup.html");
            window.open("http://localhost/final_project_1/index.php/welcome/register_user/", "_this");
        });

    });
})(jQuery);