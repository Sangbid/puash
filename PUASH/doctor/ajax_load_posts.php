<?php  
include("include/config.php");
include("User.php");
include("Post.php");

$limit = 10; //Number of posts to be loaded per call

// $posts = new Post($con, $_REQUEST['userLoggedIn']);


    // $page = $data['page']; 
    // $userLoggedIn = $this->user_obj->getUsername();

    // if($page == 1) 
    // 	$start = 0;
    // else 
    // 	$start = ($page - 1) * $limit;


    $str = ""; //String to return 
    $data_query = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

    if(mysqli_num_rows($data_query) > 0) {


        $num_iterations = 0; //Number of results checked (not necasserily posted)
        $count = 1;

        while($row = mysqli_fetch_array($data_query)) {
            $id = $row['id'];
            $title=$row['title'];
            $body = $row['description'];
            $added_by = $row['author'];
            $date_time = $row['upload_date'];
            $imagePath = $row['image'];

            //Prepare user_to string so it can be included even if not posted to a user
            // if($row['user_to'] == "none") {
            // 	$user_to = "";
            // }
            
                $user_to_obj = new User($this->con, $row['author']);
                // $user_to_name = $user_to_obj->getFirstAndLastName();
                $user_to = "to <a href='" . $row['author'] ."'>  </a>";
            

            // //Check if user who posted, has their account closed
            // $added_by_obj = new User($this->con, $added_by);
            // if($added_by_obj->isClosed()) {
            // 	continue;
            // }

            
            

            // 	if($num_iterations++ < $start)
            // 		continue; 


            // 	//Once 10 posts have been loaded, break
            // 	if($count > $limit) {
            // 		break;
            // 	}
            // 	else {
            // 		$count++;
            // 	}

                


                $user_details_query = mysqli_query($this->con, "SELECT doctorname, docEmail, specilization FROM doctors WHERE doctorname='$added_by'");
                $user_row = mysqli_fetch_array($user_details_query);
                $first_name = $user_row['doctorname'];
                $last_name = $user_row['specilization'];
                $profile_pic = $user_row['docEmail'];


                ?>
                <script> 
                    function toggle<?php echo $id; ?>() {

                        var target = $(event.target);
                        if (!target.is("a")) {
                            var element = document.getElementById("toggleComment<?php echo $id; ?>");

                            if(element.style.display == "block") 
                                element.style.display = "none";
                            else 
                                element.style.display = "block";
                        }
                    }

                </script>
                <?php

                // $comments_check = mysqli_query($this->con, "SELECT * FROM comments WHERE post_id='$id'");
                // $comments_check_num = mysqli_num_rows($comments_check);


                //Timeframe
                $date_time_now = date("Y-m-d H:i:s");
                $start_date = new DateTime($date_time); //Time of post
                $end_date = new DateTime($date_time_now); //Current time
                $interval = $start_date->diff($end_date); //Difference between dates 
                if($interval->y >= 1) {
                    if($interval->y == 1)
                        $time_message = $interval->y . " year ago"; //1 year ago
                    else 
                        $time_message = $interval->y . " years ago"; //1+ year ago
                }
                else if ($interval->m >= 1) {
                    if($interval->d == 0) {
                        $days = " ago";
                    }
                    else if($interval->d == 1) {
                        $days = $interval->d . " day ago";
                    }
                    else {
                        $days = $interval->d . " days ago";
                    }


                    if($interval->m == 1) {
                        $time_message = $interval->m . " month ". $days;
                    }
                    else {
                        $time_message = $interval->m . " months ". $days;
                    }

                }
                else if($interval->d >= 1) {
                    if($interval->d == 1) {
                        $time_message = "Yesterday";
                    }
                    else {
                        $time_message = $interval->d . " days ago";
                    }
                }
                else if($interval->h >= 1) {
                    if($interval->h == 1) {
                        $time_message = $interval->h . " hour ago";
                    }
                    else {
                        $time_message = $interval->h . " hours ago";
                    }
                }
                else if($interval->i >= 1) {
                    if($interval->i == 1) {
                        $time_message = $interval->i . " minute ago";
                    }
                    else {
                        $time_message = $interval->i . " minutes ago";
                    }
                }
                else {
                    if($interval->s < 30) {
                        $time_message = "Just now";
                    }
                    else {
                        $time_message = $interval->s . " seconds ago";
                    }
                }

                if($imagePath != "") {
                    $imageDiv = "<div class='postedImage'>
                                    <img src='$imagePath'>
                                </div>";
                }
                else {
                    $imageDiv = "";
                }

                $str .= "<div class='status_post' onClick='javascript:toggle$id()'>
                            <div class='post_profile_pic'>
                                $profile_pic
                            </div>

                            <div class='posted_by' style='color:#ACACAC;'>
                                <a href='$added_by'> $first_name $last_name </a> $user_to &nbsp;&nbsp;&nbsp;&nbsp;$time_message
                                
                            </div>
                            <div id='post_body'>
                                $body
                                <br>
                                $imageDiv
                                <br>
                                <br>
                            </div>

                            // <div class='newsfeedPostOptions'>
                            // 	Comments($comments_check_num)&nbsp;&nbsp;&nbsp;
                            // 	<iframe src='like.php?post_id=$id' scrolling='no'></iframe>
                            // </div>

                        </div>
                        // <div class='post_comment' id='toggleComment$id' style='display:none;'>
                        // 	<iframe src='comment_frame.php?post_id=$id' id='comment_iframe' frameborder='0'></iframe>
                        // </div>
                        <hr>";
            

            ?>
            <script>

                $(document).ready(function() {

                    $('#post<?php echo $id; ?>').on('click', function() {
                        bootbox.confirm("Are you sure you want to delete this post?", function(result) {

                            $.post("includes/form_handlers/delete_post.php?post_id=<?php echo $id; ?>", {result:result});

                            if(result)
                                location.reload();

                        });
                    });


                });

            </script>
            <?php

        } //End while loop

        if($count > $limit) 
            $str .= "<input type='hidden' class='nextPage' value='" . ($page + 1) . "'>
                        <input type='hidden' class='noMorePosts' value='false'>";
        else 
            $str .= "<input type='hidden' class='noMorePosts' value='true'><p style='text-align: centre;' class='noMorePostsText'> No more posts to show! </p>";
    }

    echo $str;







?>