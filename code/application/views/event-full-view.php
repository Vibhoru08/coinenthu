event_<div class = "content-wrapper">
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
                <div class="col-xs-10 mar_t30 NoirProLight event_head_info text-center">
                    <!--<span class="col-xs-3">location - <?php echo $event_location; ?></span>-->
                    <span class="col-xs-3" title="Event Location"><i class="fa fa-map-marker"></i>&nbsp; <?php echo $event_city; ?></span>
                    <span class="col-xs-3" title="Event Date"><i class="fa fa-calendar"></i>&nbsp; <?php echo $event_date; ?></span>
                    <span class="col-xs-3" title="Price in USD"><i class="fa fa-money"></i>&nbsp; <?php echo '$'.$event_price;?></span>
                    <span class="col-xs-3" title="Number of people attending"><i class="fa fa-users"></i>&nbsp; <?php echo $event_att ?></span>
                  </div>
                </div>
              </div>
            </div>
        <div class="container-fluid">
          <section class = "content">
          <div class="row ">
            <div class="col-xs-10 col-xs-offset-1 asset-boxes event_padding text-center pad_b20">
              <h4 class="mar_t20">About </h4>
              <p class="text-justify event_description"><?php echo $event_description; ?></p>
              <div class="btn btn-cstm btn-review mar_t10 NoirProRegular" type="button">Join Event</div>
            </div>
          </div>
          <div class="row" >
            <div class="col-xs-10 col-xs-offset-1 asset-boxes event_padding text-center pad_b20" style="border-top: 1px solid #E4E3E3;">
                <h4 class="mar_t20">Speakers </h4>
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
           <div class = "row mar_b30">
            <div class = "col-xs-10 col-xs-offset-1 eevent_divs asset-boxes event_padding text-center pad_b20" style="border-top: 1px solid #E4E3E3;">
              <h4 class="mar_t20">Agenda</h4>
              <div class="col-xs-12 col-md-6 pad_0 event_table">
              <?php if (!empty($Agenda_1)){?>
                <div class="col-xs-12 pad_0">
                <div class="col-xs-12 event_table_row pad_t5 pad_b5">
                  <h5>Day 1</h5>
                </div>
                <?php foreach($Agenda_1 as $day_1){ ?>
                <div class="col-xs-12 event_table_row">
                  <span class="col-xs-4 event_table_smallrow"><?php echo $day_1->ag_time; ?></span>
                  <span class="col-xs-8 event_table_smallrow2"><?php echo $day_1->ag_event; ?></span>
                </div>
                <?php } ?>
              </div>
              <?php }?>
            </div>
              <div class="col-xs-12 col-md-6 pad_0 event_table">
              <?php if (!empty($Agenda_2)){?>
                <div class="col-xs-12 pad_0">
                <div class="col-xs-12 event_table_row pad_t5 pad_b5">
                  <h5>Day 2</h5>
                </div>
                <?php foreach($Agenda_2 as $day_2){ ?>
                <div class="col-xs-12 event_table_row">
                  <span class="col-xs-4 event_table_smallrow"><?php echo $day_2->ag_time; ?></span>
                  <span class="col-xs-8 event_table_smallrow2"><?php echo $day_2->ag_event; ?></span>
                </div>
                <?php } ?>
              </div>
              <?php }?>
            </div>
              <div class="col-xs-12 col-md-6 pad_0 event_table">
              <?php if (!empty($Agenda_3)){?>
                <div class="col-xs-12 pad_0">
                <div class="col-xs-12 event_table_row pad_t5 pad_b5">
                  <h5>Day 3</h5>
                </div>
                <?php foreach($Agenda_3 as $day_3){ ?>
                <div class="col-xs-12 event_table_row">
                  <span class="col-xs-4 event_table_smallrow">><?php echo $day_3->ag_time; ?></span>
                  <span class="col-xs-8 event_table_smallrow2"><?php echo $day_3->ag_event; ?></span>
                </div>
                <?php } ?>
              </div>
              <?php }?>
            </div>
              <div class="col-xs-12 col-md-6 pad_0 event_table">
              <?php if (!empty($Agenda_4)){?>
                <div class="col-xs-12 pad_0">
                <div class="col-xs-12 event_table_row pad_t5 pad_b5">
                  <h5>Day 4</h5>
                </div>
                <?php foreach($Agenda_4 as $day_4){ ?>
                <div class="col-xs-12 event_table_row">
                  <span class="col-xs-4 event_table_smallrow"><?php echo $day_4->ag_time; ?></span>
                  <span class="col-xs-8 event_table_smallrow2"><?php echo $day_4->ag_event; ?></span>
                </div>
                <?php } ?>
              </div>
              <?php }?>
            </div>
              <div class="col-xs-12 col-md-6 pad_0 event_table">
              <?php if (!empty($Agenda_5)){?>
                <div class="col-xs-12 pad_0">
                <div class="col-xs-12 event_table_row pad_t5 pad_b5">
                  <h5>Day 5</h5>
                </div>
                <?php foreach($Agenda_5 as $day_5){ ?>
                <div class="col-xs-12 event_table_row">
                  <span class="col-xs-4 event_table_smallrow"><?php echo $day_5->ag_time; ?></span>
                  <span class="col-xs-8 event_table_smallrow2"><?php echo $day_5->ag_event; ?></span>
                </div>
                <?php } ?>
              </div>
              <?php }?>

              </div>
            </div>
           </div>
          </div>


    </section>
</div>
</div>
<script>
$(document).ready(function(){
  var divs = document.getElementsByClassName("event_table");
for(var i = 0; i < divs.length; i+=2){
  if(i!=divs.length-1){
  var height=Math.max(divs[i].offsetHeight,divs[i+1].offsetHeight);
   divs[i].style.height = height+"px";
    divs[i+1].style.height = height+"px";
 }
}
});
</script>
