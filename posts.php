<?php
session_start();
include('connection.php');

//include('connection.php');
if(isset($_POST['submit'])){
  $tweet = mysqli_real_escape_string($conn, $_POST['tweet']);
  $p = "insert into posts(post, post_date)values('".$tweet."', now())";
  $f = mysqli_query($conn, $p) or die(mysqli_error($conn));
  if($f){
    echo "Post saved successfully";
    //$conn->close();
    unset($f);
  }
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Twitter-Like App</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.css">
</head>

<body>

    <div class="main-flex-container">
        <div class="left-flex-container flex-item">
            <div class="nav-links">
                <ul>
                    <li class="nav-items logo"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="nav-items current-page"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                    <li class="nav-items"><a href="#"><i class="fas fa-hashtag"></i> Explore</a></li>
                    <li class="nav-items"><a href="#"><i class="far fa-bell"></i> Notifications</a></li>
                    <li class="nav-items"><a href="#"><i class="far fa-envelope"></i> Messages</a></li>
                    <li class="nav-items"><a href="#"><i class="far fa-bookmark"></i> Bookmarks</a></li>
                    <li class="nav-items"><a href="#"><i class="far fa-list-alt"></i> Lists</a></li>
                    <li class="nav-items"><a href="#"><i class="far fa-user"></i> Profile</a></li>
                    <li class="nav-items"><a href="#"><i class="fas fa-ellipsis-h more-icon"></i> More</a></li>
                </ul>
            </div>
            <div class="tweet"><a href="#">Tweet</a></div>
            <div class="profile-box">
                <img src="./img/profile.jpg" alt="profile">
                <div class="profile-link">
                    <p class="full-name">Hannah Bibiana</p>
                    <p class="user-name">@bibiana</p>
                </div>
                <div class="options-icon"><i class="fas fa-caret-down"></i></div>
            </div>
        </div>

        <div class="center-flex-container flex-item">
            <div class="home">
                <h1>Home</h1>
                <i class="fas fa-magic"></i>
            </div>
            <script type="text/javascript">
                function(validate){
                    x = document.post.tweet.value;
                    if (x=='') {
                        alert("Post section cannot be empty");
                        return;
                        focus();
                    }
                }
            </script>
            <div class="post-tweet">
                <form action="" method="POST" name="post" onload="return validate();">
                    <div class="form-group-1">
                        <img src="./img/profile.jpg" alt="profile-pics">
                        <input type="text" placeholder="What's happening?" name="tweet">
                    </div>
                    <div class=" form-group-2">
                        <div class="post-icons">
                            <i class="far fa-image"></i>
                            <i class="far fa-file-image"></i>
                            <i class="fas fa-stream"></i>
                            <i class="far fa-smile"></i>
                            <i class="far fa-calendar-check"></i>
                        </div>
                        <button class="btn" type="submit" name="submit">Tweet</button>
                    </div>
                </form>

            </div>
            <!-- User Content -->
            <?php
            $data = "select * from posts order by post_date desc";

            $response = mysqli_query($conn, $data)or die(mysqli_error($conn));
            while($post = mysqli_fetch_array($response)):
                $post = $post['post'];
                //$post_date = date($post['post_date'],'y-m-d');
            
                ?>
            <div class="tweets">
                <div class="user-pics"><img src="./img/user3.jpg" alt="user3"></div>
                <div class="user-content-box">
                    <div class="user-names">
                        <?php
                        $username = $_SESSION['username'];
//
        $v = "select * from `user` where username='$username'";
        $ds = mysqli_query($conn, $v)or die(mysqli_error($conn));
        while($dss = mysqli_fetch_array($ds)):
            $handle = $dss['handle'];
            $firstname = $dss['firstname'];
            $lasttname = $dss['lasttname'];
            $username = $dss['username'];
           // $full_name = $firstname $lasttname;

                         
                        //$conn.close();
                                    ?>  
                        <hi class="full-name"><?php echo "$firstname $lasttname";?>
                                          
                                                </hi>
                                           
                        <p class="user-name"><?php echo "@$handle"; ?></p>
                        <p class="time"><?php //echo $post_date;?></p>
                        <?php endwhile; ?>
                    </div>
                    
                    <div class="user-content">
                        <p><?php echo $post;?></p>
                    </div>
                
                    <div class="content-icons">
                        <i class="far fa-comment blue"><button type="submit" name="comments" visible="false">109</button></i>
                        <i class="fas fa-retweet green"><button type="submit" name="repost">865</button></i>
                        <i class="far fa-heart red"><button type="submit" name="like">1.6k</button></i>
                        <i class="fas fa-chevron-up blue"></i>
                        <i class="fas fa-chevron-down blue"></i>
                    </div>

                </div>
            </div>
            <?php endwhile; ?>

            <!--<div class="tweets">
          <div class="user-pics"><img src="./img/user2.jpg" alt="user2"></div>
          <div class="user-content-box">
            <div class="user-names">
              <hi class="full-name">Carole Chavez</hi>
              <p class="user-name">@carolechavez</p>
              <p class="time"> . 1hr</p>
            </div>
            
            <div class="user-content">
              <p>If the whole world was blind, how many people would you impress?
                <a href="#">#100daysofcode</a> <a href="#">#javascript</a> <a href="#">#womenwhocode</a></p>
            </div>

            <div class="content-icons">
              <i class="far fa-comment blue"> 2k</i>
              <i class="fas fa-retweet green"> 6k</i>
              <i class="far fa-heart red"> 10k</i>
              <i class="fas fa-chevron-up blue"></i>
            </div>
  
          </div>
        </div>

        <div class="tweets">
          <div class="user-pics"><img src="./img/user1.jpg" alt="user1"></div>
          <div class="user-content-box">
            <div class="user-names">
              <hi class="full-name">Eric Alvarez</hi>
              <p class="user-name">@eric_alvarez</p>
              <p class="time"> . 2hrs</p>
            </div>
            
            <div class="user-content">
              <p>Eat. Code, Sleep. repeat! <a href="#">#CodeNewbie</a> <a href="#">#100DaysOfCode</a></p>
              <img src="./img/content1.jpg" alt="content1">
            </div>
  
            <div class="content-icons">
              <i class="far fa-comment blue"> 273</i>
              <i class="fas fa-retweet green"> 2k</i>
              <i class="far fa-heart red"> 3k</i>
              <i class="fas fa-chevron-up blue"></i>
            </div>
  
          </div>
        </div>

        <div class="tweets">
          <div class="user-pics"><img src="./img/user4.jpg" alt="user4"></div>
          <div class="user-content-box">
            <div class="user-names">
              <hi class="full-name">Harry Wilson</hi>
              <p class="user-name">@Harrywilson</p>
              <p class="time"> . 4hrs</p>
            </div>
            
            <div class="user-content">
              <p>There's no clear correlation between your background and what you are going to achieve in life..</p>
            </div>

            <div class="content-icons">
              <i class="far fa-comment blue"> 4k</i>
              <i class="fas fa-retweet green"> 8k</i>
              <i class="far fa-heart red">13k</i>
              <i class="fas fa-chevron-up blue"></i>
            </div>
  
          </div>
        </div>

        <section class="follow-users-box">

          <div class="follow-header">
            <h1 class="main-text">Who to follow</h1>
            <i class="fas fa-chevron-down"></i>
          </div>

          <div class="follow-user">
            <div class="related-followers">
              <p class="sub-text"><i class="fas fa-user"></i> Ellie Jamie and 20 others follow</p>
            </div>

            <div class="user-profile">
              <div class="user-pics"><img src="./img/user6.jpg" alt="user6">
              </div>

              <div class="user-profile-content">
                <div class="title-container">
                  <div class="user-names">
                    <div class="full-name"><h1 class="main-text">Linda Shelton #BlackLivesMatter</h1></div>
                    <div class="user-name"><p class="sub-text">@Linda_shelton</p></div>
                  </div>

                  <div class="follow-btn"><a href="#">follow</a></div>

                </div>
                <div class="bio-container">
                  <p><a href="#">♯WordPress/Php</a> Geek Smiling face with sunglasses <a href="#">♯JavascriptDeveloper</a> Slightly smiling face <a href="#">♯ToolsCreator</a> <a href="#">♯http://webscreenshot.now.sh</a> Always ready to help with code Handshake</p>
                </div>
                
              </div>

            </div>

          </div>

          <div class="follow-user">
            <div class="related-followers">
              <p class="sub-text"><i class="fas fa-user"></i> JavaScript Ninja and 200 others follow</p>
            </div>

            <div class="user-profile">
              <div class="user-pics"><img src="./img/user7.jpg" alt="user7">
              </div>

              <div class="user-profile-content">
                <div class="title-container">
                  <div class="user-names">
                    <div class="full-name"><h1 class="main-text">Gavin Johnson #JavaScript</h1></div>
                    <div class="user-name"><p class="sub-text">@Gavinjohnson</p></div>
                  </div>

                  <div class="follow-btn"><a href="#">follow</a></div>

                </div>
                <div class="bio-container">
                 <a href="#">♯JavascriptDeveloper</a> Avocado | Fire Speaker | Fire Teacher | Youtube - <a href="#">http://bit.ly/jqqyt</a> |<a href="#"> @twilio</a> Champion | Motto: <a href="#">#LearnBuildTeach</a></p>
                </div>
                
              </div>

            </div>

          </div>

          <div class="follow-user">
            <div class="related-followers">
              <p class="sub-text"><i class="fas fa-user"></i> The Code Boy and 50 others follow</p>
            </div>

            <div class="user-profile">
              <div class="user-pics"><img src="./img/user8.jpg" alt="user8">
              </div>

              <div class="user-profile-content">
                <div class="title-container">
                  <div class="user-names">
                    <div class="full-name"><h1 class="main-text">William D Gallucci</h1></div>
                    <div class="user-name"><p class="sub-text">@Iamwilliamd_shelton</p></div>
                  </div>

                  <div class="follow-btn"><a href="#">follow</a></div>

                </div>
                <div class="bio-container">
                  <p>software engineer at 
                    <a href="#">@soonastudios</a>
                    . career switcher. vue + rails. tweeting about tech, books, startups, and big ideas. writing @ <a href="#">http://jamestucker.dev.</a></p>
                </div>
                
              </div>

            </div>

          </div>

          <div class="follow-footer">
            <a href="#">Show more</a>
          </div>

        </section>

        <div class="tweets">
          <div class="user-pics"><img src="./img/user5.jpg" alt="user5"></div>
          <div class="user-content-box">
            <div class="user-names">
              <hi class="full-name">Nora Chao</hi>
              <p class="user-name">@chaonora</p>
              <p class="time"> . 6hrs</p>
            </div>
            
            <div class="user-content">
              <p>Time to settle down and play my favourite game IN THE WORLD Earth globe europe-africa</p>

              <p>  Haven’t played for about a month, too busy coding. 
                So tired this evening though. 
                Poker tournament with husband later..</p>
                <img src="./img/content5.jpg" alt="content5">
            </div>

            <div class="content-icons">
              <i class="far fa-comment blue"> 78</i>
              <i class="fas fa-retweet green"> 265</i>
              <i class="far fa-heart red"> 934</i>
              <i class="fas fa-chevron-up blue"></i>
            </div>
  
          </div>
        </div>

        <div class="pagnation">
          <a href="#">Load more</a>
        </div>-->

        </div>



        <div class="right-flex-container flex-item">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search Twitter">
            </div>

            <div class="trends">
                <ul>
                    <li class="nav-list header">
                        <h2>Trends for you</h2>
                        <i class="fas fa-cog">
                        </i>
                    <li class="nav-list">
                        <div class="trend-list">
                            <p class="sub-text">Trending in Naija</p>
                            <p class="main-text">#BBNaija</p>
                            <p class="sub-text">274K Tweets</p>
                        </div>
                        <div class="trend-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </li>
                    <li class="nav-list">
                        <div class="trend-list">
                            <p class="sub-text">Trending in Naija</p>
                            <p class="main-text">#TaylorSwift</p>
                            <p class="sub-text">154K Tweets</p>
                        </div>
                        <div class="trend-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </li>
                    <li class="nav-list">
                        <div class="trend-list">
                            <p class="sub-text">Trending in Naija</p>
                            <p class="main-text">#Lover</p>
                            <p class="sub-text">135K Tweets</p>
                        </div>
                        <div class="trend-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </li>
                    <li class="nav-list">
                        <div class="trend-list">
                            <p class="sub-text">Trending in Naija</p>
                            <p class="main-text">#Dora</p>
                            <p class="sub-text">124K Tweets</p>
                        </div>
                        <div class="trend-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </li>
                    <li class="nav-list">
                        <div class="trend-list">
                            <p class="sub-text">Trending in Naija</p>
                            <p class="main-text">#TGIF</p>
                            <p class="sub-text">43K Tweets</p>
                        </div>
                        <div class="trend-icon">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </li>


                    <li class="nav-list"><a href="#">Show more</a></li>
                </ul>
            </div>

            <div class="right-footer">
                <div class="footer-links">
                    <a href="#" class="sub-text">Terms</a>
                    <a href="#" class="sub-text">Privacy policy</a>
                    <a href="#" class="sub-text">Ads info</a>
                    <a href="#" class="sub-text">more</a>
                    <i class="fas fa-chevron-down sub-text"></i>
                </div>
                <div class="footer-copyright">
                    <p class="sub-text">&copy; 2023 Twitter, Inc. | Customized by Hannah</p>
                </div>

            </div>

        </div>

    </div>

</body>

</html>