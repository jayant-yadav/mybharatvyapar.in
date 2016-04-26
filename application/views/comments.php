<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>myBharatVyapar|user_page</title>
    <link rel="stylesheet" href="http://localhost/final_project_1/application/views/library/css/foundation.css" />
        <script src="http://localhost/final_project_1/application/views/library/js/jquery.pack.js"></script>
    <script src="http://localhost/final_project_1/application/views/library/js/vendor/modernizr.js"></script>
    <link href="http://localhost/final_project_1/application/views/user_page.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <!--    <script src="library/js/jquery-1.11.3.min.js"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css" rel="stylesheet">
    <!--    <script src="http://localhost/final_project_1/application/views/application/user_page.js"></script>-->

    <script type='text/javascript'>
        $(function () {
            $("a.reply").click(function () {
                var id = $(this).attr("id");
                $("#parent_id").attr("value", id);
                $("#name").focus();
            });
        });
    </script>


    <style type='text/css'>
        html,
        body,
        div,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        ul,
        ol,
        dl,
        li,
        dt,
        dd,
        p,
        blockquote,
        pre,
        form,
        fieldset,
        table,
        th,
        td {
            margin: 0;
            padding: 0;
        }
        
        body {
            font-size: 14px;
            line-height: 1.3em;
        }
        
        a,
        a:visited {
            outline: none;
            color: #7d5f1e;
        }
        
        .clear {
            clear: both;
        }
        
        #wrapper {
            width: 480px;
            margin: 0px auto;
            padding: 15px 0px;
        }
        
        .comment {
            padding: 5px;
            border: 2px solid #7d5f1e;
            margin-top: 15px;
            list-style: none;
        }
        
        .aut {
            font-weight: bold;
        }
        
        .timestamp {
            font-size: 85%;
            float: right;
        }
        
        #comment_form {
            margin-top: 15px;
        }
        
        #comment_form input {
            font-size: 1.2em;
            margin: 0 0 10px;
            padding: 3px;
            display: block;
            width: 100%;
        }
        
        #comment_body {
            display: block;
            width: 100%;
            height: 150px;
        }
        
        #submit_button {
            text-align: center;
            clear: both;
        }
    </style>

</head>

<body>


    <div id='wrapper'>
        <ul>
            <?php
$q = "SELECT * FROM threaded_comments WHERE parent_id = 0 ";
$r = mysql_query($q);
while($row = mysql_fetch_assoc($r)):
	getComments($row);
endwhile;
            
            function getComments($row) {
	echo "<li class='comment'>";
	echo "<div class='aut'>".$row['author']."</div>";
	echo "<div class='comment-body'>".$row['comment']."</div>";
	echo "<div class='timestamp'>".$row['created_at']."</div>";
	echo "<a href='#comment_form' class='reply' id='".$row['id']."'>Reply</a>";
	$q = "SELECT * FROM threaded_comments WHERE parent_id = ".$row['id']."";
	$r = mysql_query($q);
	if(mysql_num_rows($r)>0)
		{
		echo "<ul>";
		while($row = mysql_fetch_assoc($r)) {
			getComments($row);
		}
		echo "</ul>";
		}
	echo "</li>";
}
                
?>
        </ul>

        <form id="comment_form" action="http://localhost/final_project_1/index.php/welcome/post_comment" method='post'>
            <h3><?php echo $emailid; ?></h3>
            <label for="comment_body">Comment:</label>
            <textarea name="comment_body" id='comment_body'></textarea>
            <input type='hidden' name='parent_id' id='parent_id' value='0' />
            <div id='submit_button'>
                <input type="submit" value="Add comment" />
            </div>
        </form>

    </div>


</body>

</html>