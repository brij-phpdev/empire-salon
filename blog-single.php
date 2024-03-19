<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
include_once './includes/header.php';
include_once './includes/config.php';
include_once './includes/database.php';

$blogtable_sql = "SELECT * FROM `blog` WHERE status=1 AND permalink='". strip_tags($_GET['title'])."'";

if ($blogtable_res = @mysqli_query($link, $blogtable_sql)) {

    if (@mysqli_num_rows($blogtable_res) > 0) {
        while ($blogtable_row = @mysqli_fetch_assoc($blogtable_res)) {
            $blog = $blogtable_row;
        }
    }
}

?>
		
		<section class="page_header d-flex align-items-center">
		    <div class="container">
		        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                   <h3>The Empire Salon</h3>
                   <h2>Blog</h2>
                   
                </div>
		    </div>
		</section><!--/. page_header -->
		
		<section class="blog-section padding">
		    <div class="container">
		        <div class="blog-wrap row">
		            <div class="col-lg-12 sm-padding">
		                <div class="blog-single-wrap">
		                    <div class="blog-thumb">
                                        <?php
                                        $blog_img = SITE_BOOK_URL . 'application/uploads/img/blog/'.$blog['image'];
                                        ?>
                                        <img src="<?php echo $blog_img ?>" alt="img">
		                    </div>
		                    <div class="blog-single-content">
		                        <h2><a href="#"><?php echo $blog['title'] ?></a></h2>
		                        <ul class="single-post-meta">
                                    <li><i class="fa fa-user"></i> <a href="#">The Empire Agra</a></li>
                                    <li><i class="fa fa-calendar"></i> <a href="#"><?php echo date('d M, Y',strtotime($blog['datetime_updated'])) ?></a></li>
                                    <!--<li><i class="fa fa-comments"></i> <a href="#">2 Comments</a></li>-->
                                </ul>
                                        <?php echo nl2br(html_entity_decode($blog['description'])) ?>

                                <ul class="post-tags">
                                    <li><a href="#">saloon</a></li>
<!--                                    <li><a href="#">building</a></li>
                                    <li><a href="#">interior</a></li>
                                    <li><a href="#">design</a></li>-->
                                </ul><!--/.post-tags-->
<!--                                <div class="author-box bg-grey">
                                    <img src="img/comment-3.png" alt="img">
                                    <div class="author-info">
                                        <h3>Albert Nouwen</h3>
                                        <p>Barbershop is a different kind of architecture practice. Founded by LoganCee in 1991, we’re an employee-owned firm pursuing a democratic design.</p>
                                        <ul class="social-icon">
                                            <li><a href="#"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                            <li><a href="#"><i class="ti-instagram"></i></a></li>
                                            <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            <li><a href="#"><i class="ti-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>/.author-box-->
                                <div class="post-navigation row">
                                    <div class="col prev-post">
                                        <a href="#"><i class="ti-arrow-left"></i>Prev Post</a>
                                    </div>
                                    <div class="col next-post">
                                        <a href="#">Next Post <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div><!--.post-navigation-->
                                <div class="comments-area" style="display: none;">
                                    <div class="comments-section">
                                        <h3 class="comments-title">Posts Comments</h3>
                                        <ol class="comments">
                                            <li class="comment even thread-even depth-1" id="comment-1">
                                                <div id="div-comment-1">
                                                    <div class="comment-thumb">
                                                        <div class="comment-img"><img src="img/comment-1.png" alt=""></div>
                                                    </div>
                                                    <div class="comment-main-area">
                                                        <div class="comment-wrapper">
                                                            <div class="comments-meta">
                                                                <h4>Jhon Castellon <span class="comments-date">jan 05, 2020 at 8:00</span></h4>
                                                            </div>
                                                            <div class="comment-area">
                                                                <p>Home renovations, especially those involving plentiful of demolition can be a very dusty affair. This nasty dust can easily free flow through your house.</p>
                                                                <div class="comments-reply">
                                                                    <a class="comment-reply-link" href="#"><span>Reply</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="children">
                                                    <li class="comment">
                                                        <div>
                                                            <div class="comment-thumb">
                                                                <div class="comment-img"><img src="img/comment-2.png" alt=""></div>
                                                            </div>
                                                            <div class="comment-main-area">
                                                                <div class="comment-wrapper">
                                                                    <div class="comments-meta">
                                                                        <h4>José Carpio <span class="comments-date">jan 15, 2020 at 8:00</span></h4>
                                                                    </div>
                                                                    <div class="comment-area">
                                                                        <p>Home renovations, especially those involving plentiful of demolition can be a very dusty affair. This nasty dust can easily free flow through your house.</p>
                                                                        <div class="comments-reply">
                                                                            <a class="comment-reply-link" href="#"><span>Reply</span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul>
                                                            <li class="comment">
                                                                <div>
                                                                    <div class="comment-thumb">
                                                                        <div class="comment-img"><img src="img/comment-3.png" alt=""></div>
                                                                    </div>
                                                                    <div class="comment-main-area">
                                                                        <div class="comment-wrapper">
                                                                            <div class="comments-meta">
                                                                                <h4>Valentin Lacoste <span class="comments-date">jan 25, 2020 at 8:00</span></h4>
                                                                            </div>
                                                                            <div class="comment-area">
                                                                                <p>Home renovations, especially those involving plentiful of demolition can be a very dusty affair. This nasty dust can easily free flow through your house.</p>
                                                                                <div class="comments-reply">
                                                                                    <a class="comment-reply-link" href="#"><span>Reply</span></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="comment">
                                                <div>
                                                    <div class="comment-thumb">
                                                        <div class="comment-img"><img src="img/comment-4.png" alt=""></div>
                                                    </div>
                                                    <div class="comment-main-area">
                                                        <div class="comment-wrapper">
                                                            <div class="comments-meta">
                                                                <h4>Kyle Frederick <span class="comments-date">jan 02, 2020 at 8:00</span></h4>
                                                            </div>
                                                            <div class="comment-area">
                                                                <p>Home renovations, especially those involving plentiful of demolition can be a very dusty affair. This nasty dust can easily free flow through your house.</p>
                                                                <div class="comments-reply">
                                                                    <a class="comment-reply-link" href="#"><span>Reply</span></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div> <!-- end comments-section -->

                                    <div class="comment-respond">
                                        <h3 class="comment-reply-title">Write a Comment</h3>
                                        <form method="post" id="commentform" class="comment-form">
                                            <div class="form-textarea">
                                                <textarea id="comment" placeholder="Write Your Comments..."></textarea>
                                            </div>
                                            <div class="form-inputs">
                                                <input placeholder="Website" type="url">
                                                <input placeholder="Name" type="text">
                                                <input placeholder="Email" type="email">
                                            </div>
                                            <div class="form-submit">
                                                <input id="submit" value="Post Comment" type="submit">
                                            </div>
                                        </form>
                                    </div>
                                </div><!-- /.comments-area -->
		                    </div>
		                </div><!--/.blog-single-->
		            </div><!--/.col-lg-8-->
                            <div class="col-lg-4 sm-padding" style="display: none;">
		                <div class="sidebar-wrap">
                            <div class="widget-content">
                                <form action="" class="search-form">
                                    <input type="text" class="form-control" placeholder="Type here">
                                    <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
		                    <div class="widget-content">
                                <h4>Categories</h4>
                                <ul class="widget-links">
                                    <li><a href="#">Architecture</a></li>
                                    <li><a href="#">Interior Design</a></li>
                                    <li><a href="#">Designing</a></li>
                                    <li><a href="#">Construction</a></li>
                                    <li><a href="#">Buildings</a></li>
                                </ul>
                            </div><!--categories-->
                            <div class="widget-content">
                                <h4>Recent Posts</h4>
                                <ul class="thumb-post">
                                    <li><img src="img/post-1.jpg" alt="post"><a href="#">Minimalist trending in modern architecture 2019</a></li>
                                    <li><img src="img/post-2.jpg" alt="post"><a href="#">Terrace in the town kentaro design workshop.</a></li>
                                    <li><img src="img/post-3.jpg" alt="post"><a href="#">W270 house são arquitetos fabio architeqture.</a></li>
                                </ul>
                            </div><!--tag clouds-->
                            <div class="widget-content">
                                <h4>Tag Clouds</h4>
                                <ul class="tags">
                                    <li><a href="#">Architecture</a></li>
                                    <li><a href="#">Interior Design</a></li>
                                    <li><a href="#">Designing</a></li>
                                    <li><a href="#">Construction</a></li>
                                    <li><a href="#">Buildings</a></li>
                                    <li><a href="#">Industrial</a></li>
                                    <li><a href="#">Factory</a></li>
                                    <li><a href="#">Material</a></li>
                                </ul>
                            </div><!--tag clouds-->
		                </div><!--/.sidebar-wrap-->
                    </div><!--/.col-lg-4-->
		        </div><!--/.blog-wrap-->
		    </div>
		</section><!--/.blog-section-->
		
 <?php

include_once './includes/footer.php';
?>