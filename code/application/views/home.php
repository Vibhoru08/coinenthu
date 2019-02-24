<div class = "content-wrapper" >

        <div class = "container-fluid banner_margin linear_color_home">
            <div class = "row text-center mar_t30">
                <div class = "col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0 banner_headh">
                    COMMUNITY BASED CRYPTO REVIEWS
                  <!--  <hr style="width:5%;border:2px solid #ffff">-->
                </div>
            </div>
            <div class = "row text-center m_hide">
                <div class = "col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 banner_desch">
                    Let's not invest blindly, get the correct information on your Cryptos.<br/> Search for them.
                </div>
            </div>
            <div class = "row text-center mar_t30 mmar_t0 mmar_b15 mar_b40">
                <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1  col-md-6 col-md-offset-3  su_home">
                  <div class="row search_total">
                    <label class="col-xs-1 search_home_icon" for="searchterms"><i class="fa fa-search" aria-hidden="true"></i></label>
                    <input class="form-control1 form-control searchhome col-xs-11" type="text" onkeyup="sreachtermhome();" name="searchterms" id="searchterms" placeholder="Search for your Digital Assets and ICOs"  />
                    </div>
                </div>
                <!--<div class = "col-sm-2 col-xs-2 pad_l0 s_home m_hide">
                    <button class="btn btn-home" type = "button" style = "width:100%">Search</button>
                </div>-->
            </div>
        </div>
        <div class= "row text-center mar_t40 mmar_t15 mmar_b15">
            <div class = "col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <p class = "home_desc m_hide">
                    Come here and discover the Cryptos you are interested about!<br/>
                    Some of the most reviewed Cryptos and ICOs are:
                </p>
                <p class = "NoirProSemiBold home_desc big_hide ">
                    Come. Discover Cryptos.
                </p>
            </div>
        </div>
        <input type="hidden" id="totcntcompanies" value="<?php echo $totCntDigitals; ?>" />
  			<input type="hidden" id="limitpage"  value="6" />
  			<input type="hidden" id="offsetpage" value="6" />
  			<input type="hidden" id="pageMode" value="digital" />
        <input type="hidden" id="filter_id" value="2" />
        <input type="hidden" id="home_no_display" value="3" />
        <div class="row company_list col-md-10 col-md-offset-1 mar_t20" style="display:none;"></div>

  			<div id="loadingHash1" class="text-center font_s22 mar_t20 mar_b30" style="display:none;"><a href="javascript:void(0);" onClick="GetMoreCompaniesLoad();" class="btn btn-custom">&nbsp;&nbsp;&nbsp;LOAD MORE &nbsp;&nbsp;&nbsp;</a></div>
  			<span id="m_hide"><br/></span>

        <div class="row companiesy_list mar_b80">
          <div class="col-xs-12 col-md-10 col-md-offset-1">
            <?php //echo "<pre>";print_r($digitalAssets);echo "</pre>";die()?>

            <div id="myCarousel" class="carousel slide m_hide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators indicator-location">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <?php if(sizeof($digitalAssets)>0){ foreach($digitalAssets as $key=>$value){?>
      <?php $company_id = $value->cm_id;
            $type = $value->cm_ctid;
						$number_of_reviews = $this->Companies_model->count_reviews($company_id);
            $company_reviews = $this->Companies_model->assetLastReview($company_id);
            $total_likes_count = 0;
						$total_dislikes_count = 0;
						foreach($company_reviews->result_array() as $row){
							if(isset($row['re_likes_cnt'])){
								$re_likes_cnt = $row['re_likes_cnt'];
							}
							else{
								$re_likes_cnt = 0;
							}
							$total_likes_count = $total_likes_count + $re_likes_cnt;

							if(isset($row['re_dislike_cnt'])){
								$re_dislikes_cnt = $row['re_dislike_cnt'];
							}
							else{
								$re_dislikes_cnt = 0;
							}
							$total_dislikes_count = $total_dislikes_count + $re_dislikes_cnt;
            }
            if ($number_of_reviews == 1){
              $review_s = 'Review';
            }
            else{
              $review_s = 'Reviews';
            }
            if ($total_likes_count == 1){
              $like_s = 'Like';
            }
            else{
              $like_s = 'Likes';
            }
            if ($total_dislikes_count == 1){
                $dislike_s = 'Dislike';
            }
            else{
                $dislike_s = 'Dislikes';
            }
            $last_review = $company_reviews->last_row('array');
						$last_review_userid = $last_review['re_uid'];
						$last_review_details = $this->User_model->getUserDetails($last_review_userid);
             ?>
        <?php if($key<3){?>
        <div class="col-md-4 mar_t80">
          <ul class="products-list product-list-in-box">
            <li class="item center">
            <div class="product_zorder">
              <div class="product-img company_img_width">
              <?php if ($type ==1){ ?>
              <a href="<?php echo base_url();?>DigitalAssets/<?php echo str_replace(" ","_",$value->cm_name); ?>">
              <?php }elseif($type == 2){ ?>
                <a href="<?php echo base_url();?>ICOs/<?php echo str_replace(" ","_",$value->cm_name); ?>">
              <?php } ?>
                <?php if($value->cm_picture!="" && substr( $value->cm_picture, 0, 4 ) === "digi"){ ?>
                  <img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php }else if(substr( $value->cm_picture, 0, 3 ) === "ico"){?>
                  <img src="<?php echo base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php } else if($value->cm_picture!=""){
          $srcc= base_url().'asset/img/companies/digitalasset/'.$value->cm_picture;
                  if (@getimagesize($srcc)){
                ?>
                  <img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                  <?php }?>
                <?php } else { ?>
                  <img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php } ?>
              </a>
              </div>
              <div class="product-info text-left">
              <?php
                $string = strip_tags($value->cm_name);
                if (strlen($string) > 18) {
                  $string = substr($string, 0, 18).'...';
                }
              ?>
              <?php if($type == 1){ ?>
              <a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>DigitalAssets/<?php echo str_replace(" ","_",$value->cm_name); ?>" class="product-title"><?php echo $string; ?></a>
              <?php }elseif($type == 2){ ?>
                <a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>ICOs/<?php echo str_replace(" ","_",$value->cm_name); ?>" class="product-title"><?php echo $string; ?></a>
              <?php } ?>

              <div class="product-description">


                <input id="input-7" name="input-7" class="rating rating-loading" value="<?php echo $value->cm_overallrating; ?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">
                <?php
                if(isset($last_review)){
                ?>
                <div class = "col-xs-12 NoirProMedium pad_0"><?php echo ucfirst($last_review_details->u_firstname).' '.ucfirst($last_review_details->u_lastname); ?></div>
                <?php if ($last_review_details->u_about != ""){ ?>
                <div class = "col-xs-12 NoirProLight pad_0" style= "font-size:11px;color:#424242;"><?php echo $last_review_details->u_about; ?></div>
                <?php }else{ ?>
                  <br/><br/>
                <?php } ?>
                <?php
                $string = strip_tags($last_review['re_decript']);
                if (strlen($string) > 100) {

                  $stringCut = substr($string, 0, 100);
                  $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
                }
                ?>
                <div class="col-xs-12 pad_0" style="height:90px;"><?php echo ucfirst($string); ?></div>
                <?php }else{ ?>
                <?php
                $string = strip_tags($value->cm_decript);
                if (strlen($string) > 100) {

                  $stringCut = substr($string, 0, 100);
                  $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
                }
                ?>
                <div class = "col-xs-12 NoirProMedium pad_0">DESCRIPTION</div>
                <div class = "col-xs-12 pad_0"><br></div>
                <span class="col-xs-12 pad_0" style="height:90px;"><?php echo ucfirst($string); ?></span><br><br>
                <?php } ?>
                <?php if($type == 1){ ?>
                <br/><a class="col-xs-12 pad_0" href="<?php echo base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name); ?>" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
						    <?php }elseif($type == 2){ ?>
                  <br/><a class="col-xs-12 pad_0" href="<?php echo base_url().'ICOs/'.str_replace(" ","_",$value->cm_name); ?>" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                <?php } ?>
                <hr class="col-xs-12 pad_0">
                <div class="col-xs-12 pad_0"><div class="col-xs-4 pad_0"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> <?php echo $total_likes_count.' ';?><span class="dis2_block"><?php echo $like_s; ?></span></span></div>
                <div class="col-xs-4 pad_0"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> <?php echo $total_dislikes_count.' ';?><span class="dis2_block"><?php echo $dislike_s; ?></span></span></div>
                <div class="col-xs-4 pad_0"><i class="fa fa-commenting" aria-hidden="true"></i><span> <?php echo $number_of_reviews.' ';?><span class="dis2_block"><?php echo $review_s; ?></span></span></div></div>
               </div>

              </div>
              </div>
            </li>
          </ul>
        </div>
      <?php } }}else{ ?>
       There are no digital assets.
      <?php } ?>
    </div>

    <div class="item">
      <?php if(sizeof($digitalAssets)>0){ foreach($digitalAssets as $key=>$value){?>
        <?php $company_id = $value->cm_id;
            $type = $value->cm_ctid;
						$number_of_reviews = $this->Companies_model->count_reviews($company_id);
            $company_reviews = $this->Companies_model->assetLastReview($company_id);
            $total_likes_count = 0;
						$total_dislikes_count = 0;
						foreach($company_reviews->result_array() as $row){
							if(isset($row['re_likes_cnt'])){
								$re_likes_cnt = $row['re_likes_cnt'];
							}
							else{
								$re_likes_cnt = 0;
							}
							$total_likes_count = $total_likes_count + $re_likes_cnt;

							if(isset($row['re_dislike_cnt'])){
								$re_dislikes_cnt = $row['re_dislike_cnt'];
							}
							else{
								$re_dislikes_cnt = 0;
							}
							$total_dislikes_count = $total_dislikes_count + $re_dislikes_cnt;
            }
            if ($number_of_reviews == 1){
              $review_s = 'Review';
            }
            else{
              $review_s = 'Reviews';
            }
            if ($total_likes_count == 1){
              $like_s = 'Like';
            }
            else{
              $like_s = 'Likes';
            }
            if ($total_dislikes_count == 1){
                $dislike_s = 'Dislike';
            }
            else{
                $dislike_s = 'Dislikes';
            }
            $last_review = $company_reviews->last_row('array');
						$last_review_userid = $last_review['re_uid'];
						$last_review_details = $this->User_model->getUserDetails($last_review_userid);
             ?>
        <?php if($key>=3 && $key<6){?>
        <div class="col-md-4 mar_t80">
          <ul class="products-list product-list-in-box">
            <li class="item center">
            <div class="product_zorder">
              <div class="product-img company_img_width">
              <?php if($type == 1){ ?>
              <a href="<?php echo base_url();?>DigitalAssets/<?php echo str_replace(" ","_",$value->cm_name); ?>">
              <?php }elseif($type == 2){ ?>
                <a href="<?php echo base_url();?>ICOs/<?php echo str_replace(" ","_",$value->cm_name); ?>">
              <?php } ?>
                <?php if($value->cm_picture!="" && substr( $value->cm_picture, 0, 4 ) === "digi"){ ?>
                  <img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php }else if(substr( $value->cm_picture, 0, 3 ) === "ico"){?>
                  <img src="<?php echo base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php } else if($value->cm_picture!=""){
          $srcc= base_url().'asset/img/companies/digitalasset/'.$value->cm_picture;
                  if (@getimagesize($srcc)){
                ?>
                  <img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                  <?php }?>
                <?php } else { ?>
                  <img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php } ?>
              </a>
              </div>
              <div class="product-info text-left">
              <?php
                $string = strip_tags($value->cm_name);
                if (strlen($string) > 18) {
                  $string = substr($string, 0, 18).'...';
                }
              ?>
              <?php if($type == 1){ ?>
              <a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>DigitalAssets/<?php echo str_replace(" ","_",$value->cm_name); ?>" class="product-title"><?php echo $string; ?></a>
              <?php }elseif($type == 2){ ?>
                <a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>ICOs/<?php echo str_replace(" ","_",$value->cm_name); ?>" class="product-title"><?php echo $string; ?></a>
              <?php } ?>

              <div class="product-description">


                <input id="input-7" name="input-7" class="rating rating-loading" value="<?php echo $value->cm_overallrating; ?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">
                <?php
                if(isset($last_review)){
                ?>
                <div class = "col-xs-12 NoirProMedium pad_0"><?php echo ucfirst($last_review_details->u_firstname).' '.ucfirst($last_review_details->u_lastname); ?></div>
                <?php if ($last_review_details->u_about != ""){ ?>
                <div class = "col-xs-12 NoirProLight pad_0" style= "font-size:11px;color:#424242;"><?php echo $last_review_details->u_about; ?></div>
                <?php }else{ ?>
                  <br/><br/>
                <?php } ?>
                <?php
                $string = strip_tags($last_review['re_decript']);
                if (strlen($string) > 100) {

                  $stringCut = substr($string, 0, 100);
                  $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
                }
                ?>
                <div class="col-xs-12 pad_0" style="height:90px;"><?php echo ucfirst($string); ?></div>
                <?php }else{ ?>
                <?php
                $string = strip_tags($value->cm_decript);
                if (strlen($string) > 100) {

                  $stringCut = substr($string, 0, 100);
                  $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
                }
                ?>
                <div class = "col-xs-12 NoirProMedium pad_0">DESCRIPTION</div>
                <div class = "col-xs-12 pad_0"><br></div>
                <span class="col-xs-12 pad_0" style="height:90px;"><?php echo ucfirst($string); ?></span><br>
                <?php } ?>
                <?php if($type == 1){ ?>
                <br/><a class="col-xs-12 pad_0" href="<?php echo base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name); ?>" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
						    <?php }elseif($type == 2){ ?>
                  <br/><a class="col-xs-12 pad_0" href="<?php echo base_url().'ICOs/'.str_replace(" ","_",$value->cm_name); ?>" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                <?php } ?>
                <hr class="col-xs-12 pad_0">
                <div class="col-xs-12 pad_0"><div class="col-xs-4 pad_0"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> <?php echo $total_likes_count.' ';?><span class="dis2_block"><?php echo $like_s; ?></span></span></div>
                <div class="col-xs-4 pad_0"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> <?php echo $total_dislikes_count.' ';?><span class="dis2_block"><?php echo $dislike_s; ?></span></span></div>
                <div class="col-xs-4 pad_0"><i class="fa fa-commenting" aria-hidden="true"></i><span> <?php echo $number_of_reviews.' ';?><span class="dis2_block"><?php echo $review_s; ?></span></span></div></div>
              </div>

              </div>
              </div>
            </li>
          </ul>
        </div>
      <?php } }}else{ ?>
       There are no digital assets.
      <?php } ?>
    </div>

    <div class="item">
      <?php if(sizeof($digitalAssets)>0){ foreach($digitalAssets as $key=>$value){?>
        <?php $company_id = $value->cm_id;
            $type = $value->cm_ctid;
						$number_of_reviews = $this->Companies_model->count_reviews($company_id);
            $company_reviews = $this->Companies_model->assetLastReview($company_id);
            $total_likes_count = 0;
						$total_dislikes_count = 0;
						foreach($company_reviews->result_array() as $row){
							if(isset($row['re_likes_cnt'])){
								$re_likes_cnt = $row['re_likes_cnt'];
							}
							else{
								$re_likes_cnt = 0;
							}
							$total_likes_count = $total_likes_count + $re_likes_cnt;

							if(isset($row['re_dislike_cnt'])){
								$re_dislikes_cnt = $row['re_dislike_cnt'];
							}
							else{
								$re_dislikes_cnt = 0;
							}
							$total_dislikes_count = $total_dislikes_count + $re_dislikes_cnt;
            }
            if ($number_of_reviews == 1){
              $review_s = 'Review';
            }
            else{
              $review_s = 'Reviews';
            }
            if ($total_likes_count == 1){
              $like_s = 'Like';
            }
            else{
              $like_s = 'Likes';
            }
            if ($total_dislikes_count == 1){
                $dislike_s = 'Dislike';
            }
            else{
                $dislike_s = 'Dislikes';
            }
            $last_review = $company_reviews->last_row('array');
						$last_review_userid = $last_review['re_uid'];
						$last_review_details = $this->User_model->getUserDetails($last_review_userid);
             ?>
      <?php if($key>=6 && $key<9){?>
        <div class="col-md-4 mar_t80">
          <ul class="products-list product-list-in-box">
            <li class="item center">
            <div class="product_zorder">
              <div class="product-img company_img_width">
              <?php if($type == 1){ ?>
              <a href="<?php echo base_url();?>DigitalAssets/<?php echo str_replace(" ","_",$value->cm_name); ?>">
              <?php }elseif($type == 2){ ?>
                <a href="<?php echo base_url();?>ICOs/<?php echo str_replace(" ","_",$value->cm_name); ?>">
              <?php } ?>
                <?php if($value->cm_picture!="" && substr( $value->cm_picture, 0, 4 ) === "digi"){ ?>
                  <img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php }else if(substr( $value->cm_picture, 0, 3 ) === "ico"){?>
                  <img src="<?php echo base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php } else if($value->cm_picture!=""){
          $srcc= base_url().'asset/img/companies/digitalasset/'.$value->cm_picture;
                  if (@getimagesize($srcc)){
                ?>
                  <img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php }else{ ?>
                    <img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                  <?php }?>
                <?php } else { ?>
                  <img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
                <?php } ?>
              </a>
              </div>
              <div class="product-info text-left">
              <?php
                $string = strip_tags($value->cm_name);
                if (strlen($string) > 18) {
                  $string = substr($string, 0, 18).'...';
                }
              ?>
              <?php if($type == 1){ ?>
              <a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>DigitalAssets/<?php echo str_replace(" ","_",$value->cm_name); ?>" class="product-title"><?php echo $string; ?></a>
              <?php }elseif($type == 2){ ?>
                <a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>ICOs/<?php echo str_replace(" ","_",$value->cm_name); ?>" class="product-title"><?php echo $string; ?></a>
              <?php } ?>

              <div class="product-description">


                <input id="input-7" name="input-7" class="rating rating-loading" value="<?php echo $value->cm_overallrating; ?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">
                <?php
                if(isset($last_review)){
                ?>
                <div class = "col-xs-12 NoirProMedium pad_0"><?php echo ucfirst($last_review_details->u_firstname).' '.ucfirst($last_review_details->u_lastname); ?></div>
                <?php if ($last_review_details->u_about != ""){ ?>
                <div class = "col-xs-12 NoirProLight pad_0" style= "font-size:11px;color:#424242;"><?php echo $last_review_details->u_about; ?></div>
                <?php }else{ ?>
                  <br/><br/>
                <?php } ?>
                <?php
                $string = strip_tags($last_review['re_decript']);
                if (strlen($string) > 100) {

                  $stringCut = substr($string, 0, 100);
                  $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
                }
                ?>
                <div class="col-xs-12 pad_0" style="height:90px;"><?php echo ucfirst($string); ?></div>
                <?php }else{ ?>
                <?php
                $string = strip_tags($value->cm_decript);
                if (strlen($string) > 100) {

                  $stringCut = substr($string, 0, 100);
                  $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
                }
                ?>
                <div class = "col-xs-12 NoirProMedium pad_0">DESCRIPTION</div>
                <div class = "col-xs-12 pad_0"><br></div>
                <span class="col-xs-12 pad_0" style="height:90px;"><?php echo ucfirst($string); ?></span><br>
                <?php } ?>
                <?php if($type ==1 ){ ?>
                <br/><a class="col-xs-12 pad_0" href="<?php echo base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name); ?>" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
						    <?php }elseif($type == 2){ ?>
                  <br/><a class="col-xs-12 pad_0" href="<?php echo base_url().'ICOs/'.str_replace(" ","_",$value->cm_name); ?>" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                <?php } ?>
                <hr class="col-xs-12 pad_0">
                <div class="col-xs-12 pad_0"><div class="col-xs-4 pad_0"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span> <?php echo $total_likes_count.' ';?><span class="dis2_block"><?php echo $like_s; ?></span></span></div>
                <div class="col-xs-4 pad_0"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span> <?php echo $total_dislikes_count.' ';?><span class="dis2_block"><?php echo $dislike_s; ?></span></span></div>
                <div class="col-xs-4 pad_0"><i class="fa fa-commenting" aria-hidden="true"></i><span> <?php echo $number_of_reviews.' ';?><span class="dis2_block"><?php echo $review_s; ?></span></span></div></div>
              </div>

              </div>
              </div>
            </li>
          </ul>
        </div>
      <?php }} }else{ ?>
       There are no digital assets.
      <?php } ?>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <!--<span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>-->
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <!--<span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>-->
  </a>
</div>




<div class="scrolling-wrapper big_hide">
  <?php if(sizeof($digitalAssets)>0){ foreach($digitalAssets as $key=>$value){?>
    <?php $company_id = $value->cm_id;
            $type = $value->cm_ctid;
						$number_of_reviews = $this->Companies_model->count_reviews($company_id);
            $company_reviews = $this->Companies_model->assetLastReview($company_id);
            $total_likes_count = 0;
						$total_dislikes_count = 0;
						foreach($company_reviews->result_array() as $row){
							if(isset($row['re_likes_cnt'])){
								$re_likes_cnt = $row['re_likes_cnt'];
							}
							else{
								$re_likes_cnt = 0;
							}
							$total_likes_count = $total_likes_count + $re_likes_cnt;

							if(isset($row['re_dislike_cnt'])){
								$re_dislikes_cnt = $row['re_dislike_cnt'];
							}
							else{
								$re_dislikes_cnt = 0;
							}
							$total_dislikes_count = $total_dislikes_count + $re_dislikes_cnt;
            }
            if ($number_of_reviews == 1){
              $review_s = 'Review';
            }
            else{
              $review_s = 'Reviews';
            }
            if ($total_likes_count == 1){
              $like_s = 'Like';
            }
            else{
              $like_s = 'Likes';
            }
            if ($total_dislikes_count == 1){
                $dislike_s = 'Dislike';
            }
            else{
                $dislike_s = 'Dislikes';
            }
            $last_review = $company_reviews->last_row('array');
						$last_review_userid = $last_review['re_uid'];
						$last_review_details = $this->User_model->getUserDetails($last_review_userid);
             ?>
    <div class="card mar_t40">
      <ul class="products-list product-list-in-box">
        <li class="item center">
        <div class="product_zorder">
          <div class="product-img company_img_width">
          <?php if($type == 1){ ?>
          <a href="<?php echo base_url();?>DigitalAssets/<?php echo str_replace(" ","_",$value->cm_name); ?>">
          <?php }elseif($type == 2){ ?>
            <a href="<?php echo base_url();?>ICOs/<?php echo str_replace(" ","_",$value->cm_name); ?>">
          <?php } ?>
            <?php if($value->cm_picture!="" && substr( $value->cm_picture, 0, 4 ) === "digi"){ ?>
              <img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
            <?php }else if(substr( $value->cm_picture, 0, 3 ) === "ico"){?>
              <img src="<?php echo base_url().'asset/img/companies/icotracker/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
            <?php } else if($value->cm_picture!=""){
      $srcc= base_url().'asset/img/companies/digitalasset/'.$value->cm_picture;
              if (@getimagesize($srcc)){
            ?>
              <img src="<?php echo base_url().'asset/img/companies/digitalasset/'.$value->cm_picture.'?id='.$viewTime; ?>" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
            <?php }else{ ?>
                <img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
              <?php }?>
            <?php } else { ?>
              <img src="<?php echo base_url();?>images/Felix_the_Cat.jpg" alt="Coinenthu" class="img-responsive img-circle digital_box_image" >
            <?php } ?>
          </a>
          </div>
          <div class="product-info text-left">
          <?php
            $string = strip_tags($value->cm_name);
            if (strlen($string) > 18) {
              $string = substr($string, 0, 18).'...';
            }
          ?>
          <?php if($type == 1){ ?>
          <a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>DigitalAssets/<?php echo str_replace(" ","_",$value->cm_name); ?>" class="product-title"><?php echo $string; ?></a>
          <?php }elseif($type == 2){ ?>
            <a title="<?php echo $value->cm_name; ?>" href="<?php echo base_url();?>ICOs/<?php echo str_replace(" ","_",$value->cm_name); ?>" class="product-title"><?php echo $string; ?></a>
          <?php } ?>

          <div class="product-description">


            <input id="input-7" name="input-7" class="rating rating-loading" value="<?php echo $value->cm_overallrating; ?>" data-min="0" data-max="5" data-step="1" data-size="xs" data-readonly="true">
            <?php
            if(isset($last_review)){
            ?>
            <div class = "col-xs-12 NoirProMedium pad_0"><?php echo ucfirst($last_review_details->u_firstname).' '.ucfirst($last_review_details->u_lastname); ?></div>
            <?php if ($last_review_details->u_about != ""){ ?>
            <div class = "col-xs-12 NoirProLight pad_0" style= "font-size:11px;color:#424242;"><?php echo $last_review_details->u_about; ?></div>
            <?php }else{ ?>
              <br/><br/>
            <?php } ?>
            <?php
            $string = strip_tags($last_review['re_decript']);
            if (strlen($string) > 100) {

              $stringCut = substr($string, 0, 100);
              $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
            }
            ?>
            <div class="col-xs-12 pad_0" style="height:100px;"><?php echo ucfirst($string); ?></div>
            <?php }else{ ?>
            <?php
            $string = strip_tags($value->cm_decript);
            if (strlen($string) > 100) {

              $stringCut = substr($string, 0, 100);
              $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... ';
            }
            ?>
            <div class = "col-xs-12 NoirProMedium pad_0">DESCRIPTION</div>
            <div class = "col-xs-12 pad_0"><br></div>
            <span class="col-xs-12 pad_0" style="height:100px;"><?php echo ucfirst($string); ?></span><br>
            <?php } ?>
            <?php if($type == 1){ ?>
            <br/><a class="col-xs-12 pad_0" href="<?php echo base_url().'DigitalAssets/'.str_replace(" ","_",$value->cm_name); ?>" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            <?php }elseif($type == 2){ ?>
              <br/><a class="col-xs-12 pad_0" href="<?php echo base_url().'ICOs/'.str_replace(" ","_",$value->cm_name); ?>" style="color:black;">Read More &nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            <?php } ?>
            <hr class="col-xs-12 pad_0">
            <div class="col-xs-12 pad_0"><div class="col-xs-4 pad_0"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span><?php echo ' '.$total_likes_count.' ';?><span class="dis_block"><?php echo $like_s; ?></span></span></div>
            <div class="col-xs-4 pad_0"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span><?php echo ' '.$total_dislikes_count.' ';?><span class="dis_block"><?php echo $dislike_s; ?></span></span></div>
            <div class="col-xs-4 pad_0"><i class="fa fa-commenting" aria-hidden="true"></i><span> <?php echo $number_of_reviews.' ';?><span class="dis_block"><?php echo $review_s; ?></span></span></div></div>
          </div>

          </div>
          </div>
        </li>
      </ul>
    </div>
  <?php }} else{ ?>
   There are no digital assets.
  <?php } ?>
</div>

<div class="row text-center mar_t80">
 <a href="<?php echo base_url();?>digital-assets" class="btn btn-cstm btn-lg font_s22 div">Digital Assets</a>
   <a href="<?php echo base_url();?>ico-tracker" class="btn btn-cstm btn-lg font_s22 div" style="margin-left:10px">Upcoming ICOs</a>
 </div>


</div>
</div>
<script>
$(document).ready(function(){
  $('.caption').hide();
		$('.clear-rating').hide();
});
	$(function () {
        $(document).keydown(function (e) {
			// F5 = 116, Cntrl+R = 82
			var keyBoardCode = e.keyCode;
			if(keyBoardCode==116 || keyBoardCode==82){
				localStorage.setItem('type','viewed');
				localStorage.setItem('page_name',1);
			//	filterCompanies('viewed','1',3);
			}
        });
    });

	$(document).ready(function() {

$(".carousel").on("touchstart", function(event){
        var xClick = event.originalEvent.touches[0].pageX;
    $(this).one("touchmove", function(event){
        var xMove = event.originalEvent.touches[0].pageX;
        if( Math.floor(xClick - xMove) > 5 ){
            $(this).carousel('next');
        }
        else if( Math.floor(xClick - xMove) < -5 ){
            $(this).carousel('prev');
        }
    });
    $(".carousel").on("touchend", function(){
            $(this).off("touchmove");
    });
});

		var filterType = localStorage.getItem('type');
		var pageMode   = localStorage.getItem('page_name');
		if(filterType!=""){
			localStorage.setItem('type',filterType);
			localStorage.setItem('page_name',pageMode);
		}else{
			localStorage.setItem('type','viewed');
			localStorage.setItem('page_name',1);
		}
		var filterType = localStorage.getItem('type');
		var pageMode   = localStorage.getItem('page_name');
	//	filterCompanies(filterType,pageMode,3);



$( "#searchterms" ).keypress(function( event ) {
  if ( event.which == 13 ) {
    sreachtermhome();
  }
});

});
</script>
