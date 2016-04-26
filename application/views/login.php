<h1> Member login</h1>
<script type="text/javascript" src='<?php echo base_url(); ?>js/jquery-1.11.3.min.js'></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#frm_login').submit(function (event) {
            event.preventDefault();
            $.ajax({
                url: '<?php echo base_url();?>index.php/user/do_login',
                type: 'POST',
                data: {
                    fname: $("#username").val(),
                    lname: $("#password").val()
                },
                success: function (data) {
                    if (data == 'loggedIn') {
                        alert("Yes we are logged in");
                       // header('Location: ./');
                    } else if (data == 'No') {
                        alert("sorry wrong login information");

                    }
                }
            });
        });
    });
</script>


<form action="#" id='frm_login'>
    <label>Username</label>
    <input type="text" id="username" />
    <label>Password</label>
    <input type="password" id="password" />
    <input type="submit" value="login" />
</form>