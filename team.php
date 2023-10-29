<?php
include_once './includes/header.php';
include_once './includes/database.php';
?>

<?php
$agent_array = array();
$agenttable_sql = "SELECT * FROM `agents`";
if ($agenttable_res = mysqli_query($link, $agenttable_sql)) {
    if (mysqli_num_rows($agenttable_res) > 0) {
        while ($agenttable_row = mysqli_fetch_assoc($agenttable_res)) {
            $agent_array[] = $agenttable_row;
        }
    }
}
//                        print_r($agent_array);                                
?>
		
		<section class="page_header d-flex align-items-center">
		    <div class="container">
		        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                   <h3>The Empire Salon</h3>
                   <h2>Our Stylists</h2>
                   <div class="heading-line"></div>
                </div>
		    </div>
		</section><!--/. page_header -->
       
        <section id="team" class="team_section bd-bottom padding">
			<div class="container">
				<ul class="team_members row">
                    <li class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="200ms">
                        <div class="team_member">
                            <img src="img/team-1.jpg" alt="Team Member">
                            <div class="overlay">
                                <h3>Kyle Frederick</h3>
                                <p>WEB DESIGNER</p>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="300ms">
                        <div class="team_member">
                            <img src="img/team-2.jpg" alt="Team Member">
                            <div class="overlay">
                                <h3>José Carpio</h3>
                                <p>WORDPRESS DEVELOPER</p>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="400ms">
                        <div class="team_member">
                            <img src="img/team-3.jpg" alt="Team Member">
                            <div class="overlay">
                                <h3>Michel Ibáñez</h3>
                                <p>ONLINE MARKETER</p>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-md-6 sm-padding wow fadeInUp" data-wow-delay="500ms">
                        <div class="team_member">
                            <img src="img/team-4.jpg" alt="Team Member">
                            <div class="overlay">
                                <h3>Adam Castellon</h3>
                                <p>JAVA SPECIALIST</p>
                            </div>
                        </div>
                    </li>
                </ul><!-- /.team_members -->
			</div>
        </section><!-- /.team_section -->
        
        <section class="cta_section padding">
           <div class="container">
               <div class="display-table">
                   <div class="table-cel">
                       <div class="cta_content align-center wow fadeInUp" data-wow-delay="300ms">
                           <h2>Making You Look Good <br> Is In Our Haritage.</h2>
                           <p>Barber is a person whose occupation is mainly to cut dress groom <br>style and shave men's and boys hair.</p>
                           <a href="#" class="default_btn">Make Appointment</a>
                       </div>
                   </div>
               </div>
           </div>
        </section><!-- /.cta_section -->
         
<?php
include_once './includes/footer.php';
?>