event_<div class = "content-wrapper" style = "padding-top:0px;">
<div class = "content about-bg text-color">

        <div class = "container-fluid banner_margin linear_color" style = "padding-top:30px;">
            <div class = "row mmar_b10 mar_t30 mmar_t10">
                <div class = "col-xs-12 text-center banner_head" style="text-transform: uppercase;">
                    <?php echo $event['event_name']; ?>
                  <!--  <hr style="width:2%;border:2px solid #ffff">-->
                </div>
                <div class="col-xs-10 col-xs-offset-1">
                  <div class="col-md-2 col-xs-12 event_picture">
                <?php
                if(isset($event['event_picture']) && $event['event_picture'] != '' ){
                    $imagepath = base_url().'asset/img/events/main/'.$event['event_picture'];
                }else{
                    $imagepath = base_url().'images/empty_thumb.jpg';
                }
                ?>
                <img class="img-rounded event-image" src = "<?php echo $imagepath; ?>" alt = "<?php echo $event['event_name']; ?>">
              </div>
                <div class="col-md-10 col-xs-12 mar_t30 mmar_t10 NoirProLight event_head_info text-center">
                    <!--<span class="col-xs-3">location - <?php echo $event['event_location']; ?></span>-->
                    <span class="col-sm-4 col-xs-12" title="Event Location"><i class="fa fa-map-marker"></i>&nbsp; <?php echo $event['event_location']; ?></span>
                    <span class="col-sm-4 col-xs-12" title="Event Date"><i class="fa fa-calendar"></i>&nbsp; <?php echo $event['event_date']; ?></span>
                    <span class="col-sm-4 col-xs-12" title="Price in USD"><i class="fa fa-money"></i>&nbsp; <?php echo '$'.$event['event_price'];?></span>

                  </div>
                </div>
              </div>
            </div>
        <div class="container-fluid">
          <section class = "content">
          <div class="row ">
            <div class="col-xs-10 col-xs-offset-1 asset-boxes event_padding text-center pad_b20">
              <h4 class="mar_t20">About </h4>
              <p class="text-justify event_description"><?php echo $event['event_description']; ?></p>
              <?php
              if(strpos($event['event_url'],'http') !== false){
                $event_url = $event['event_url'];
              }else{
                $event_url = '//'.$event['event_url'];
              }
              ?>
              <a href="<?php echo $event_url; ?>" target = "_blank" class="btn btn-cstm btn-review mar_t10 NoirProRegular" type="button">Join Event</a>
            </div>
          </div>
          <div class="row" >
            <div class="col-xs-10 col-xs-offset-1 asset-boxes event_padding text-center pad_b20" style="border-top: 1px solid #E4E3E3;">
                <h4 class="mar_t20">Speakers </h4>
                    <?php
                    foreach($event['speakers'] as $speaker){ ?>
                      <div class="col-md-3 individual_speaker_div"><?php
                        if(isset($speaker->sp_twitter) && $speaker->sp_twitter != ''){
                            $spimage ="https://twitter.com/".$speaker->sp_twitter."/profile_image?size=original"; //base_url().'asset/img/events/speakers/'.$speaker->sp_image;
                        }else{
                            $spimage = base_url().'asset/img/alt.jpg';
                        }
                        echo '<p><img class="speaker-image" src = "'.$spimage.'" alt = "'.$speaker->sp_name.'"></p>';
                        echo '<h5 class="speaker_name">'.$speaker->sp_name.'</h5>';
                        if(isset($speaker->sp_desig) && $speaker->sp_desig != ""){
                          echo '<div>'.ucfirst($speaker->sp_desig).'</div>';
                        }else{
                          echo '<div>&nbsp;</div>';
                        }
                        if (strpos($speaker->sp_url,'http') !== false){
                          $speaker_linkedin = $speaker->sp_url;
                        }else{
                          $speaker_linkedin = '//'.$speaker->sp_url;
                        }
                        echo '<a href="'.$speaker_linkedin.'" target = "_blank">Linkedin</a>';
                        ?>
                      </div><?php
                    }
                    ?>
             </div>
           </div>
           <div class = "row mar_b30">
            <div class = "col-xs-10 col-xs-offset-1 eevent_divs asset-boxes event_padding text-center pad_b20" style="border-top: 1px solid #E4E3E3;">
              <h4 class="mar_t20">Agenda</h4>



              <?php foreach($event['Agenda'] as $k=>$v){?>
              <div class = "col-xs-12 col-md-6 pad_0 event_table">
              <div class = "col-xs-12 pad_0">
              <div class = "col-xs-12 event_table_row pad_t5 pad_b5">
              <h5>Day <?php echo $k; ?></h5>
              </div>
              <?php foreach($v as $value){ ?>
              <div class = "col-xs-12 event_table_row">
                <span class = "col-xs-4 event_table_smallrow"><?php echo $value->ag_time; ?></span>
                <span class = "col-xs-8 event_table_smallrow2"><?php echo $value->ag_event; ?></span>
              </div>
              <?php } ?>
              </div>
              </div>
              <?php } ?>

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
  if(divs.length==1){
    divs[i].className +=' col-md-offset-3';
  }
  if(i!=divs.length-1){
  var height=Math.max(divs[i].offsetHeight,divs[i+1].offsetHeight);
   divs[i].style.height = height+"px";
    divs[i+1].style.height = height+"px";
    var y=i+3;
    $('<style>.event_table:nth-child('+y+'):before{height:'+height+'px'+';}</style>').appendTo('head');
 }
}
});
</script>
