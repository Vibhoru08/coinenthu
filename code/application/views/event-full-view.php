<div class = "content-wrapper">
<div class = "content about-bg text-color">

        <div class = "container-fluid banner_margin linear_color">
            <div class = "row mmar_t40 mmar_b10 mar_t30">
                <div class = "col-xs-12 text-center banner_head" style="text-transform: uppercase;">
                    <?php echo $event_name; ?>
                  <!--  <hr style="width:2%;border:2px solid #ffff">-->
                </div>
                <div class="col-xs-10 col-xs-offset-1">
                  <div class="col-xs-2">
                <?php
                if(isset($event_picture)){
                    $imagepath = base_url().'asset/img/events/main/'.$event_picture;
                }else{
                    $imagepath = base_url().'images/empty_thumb.jpg';
                }
                ?>
                <img class="img-rounded event-image" src = "<?php echo $imagepath; ?>" alt = "<?php echo $event_name; ?>">
              </div>
                <div class="col-xs-10 mar_t30 NoirProLight event_head_info">
                    <!--<span class="col-xs-3">location - <?php echo $event_location; ?></span>-->
                    <span class="col-xs-3" title="Event Location"><i class="fa fa-map-marker"></i>&nbsp; <?php echo $event_city; ?></span>
                    <span class="col-xs-3" title="Event Date"><i class="fa fa-calendar"></i>&nbsp;Date</span>
                    <span class="col-xs-3" title="Price in USD"><i class="fa fa-money"></i>&nbsp; <?php echo $event_price;?></span>
                    <span class="col-xs-3" title="Number of people attending"><i class="fa fa-users"></i>&nbsp; <?php echo $event_att ?></span>
                  </div>
                </div>
              </div>
            </div>
        <div class="container-fluid">
          <section class = "content">
          <div class="row ">
            <div class="col-xs-10 col-xs-offset-1 asset-boxes asset_padding text-center">
              <h4>About </h4>
              <p class="text-justify event_description"><?php echo $event_description; ?></p>
            </div>
          </div>
          <div class="row mar_t5">
            <div class="col-xs-10 col-xs-offset-1 asset-boxes asset_padding text-center">
                <h4>Speakers </h4>
                    <?php
                    foreach($speakers as $speaker){ ?>
                      <div class="col-md-3 individual_speaker_div"><?php
                        if(isset($speaker->sp_image)){
                            $spimage = base_url().'asset/img/events/speakers/'.$speaker->sp_image;
                        }else{
                            $spimage = base_url().'asset/img/alt.jpg';
                        }
                        echo '<p><img class="speaker-image" src = "'.$spimage.'" alt = "'.$speaker->sp_name.'"></p>';
                        echo '<h5 class="speaker_name">'.$speaker->sp_name.'</h5>';
                        echo '<a href="'.$speaker->sp_url.'" >Linkedin</a>';
                        ?>
                      </div><?php
                    }
                    ?>
             </div>
           </div>

          </div>


    </section>
</div>
</div>
