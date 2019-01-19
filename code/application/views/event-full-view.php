<div class = "content-wrapper">
<div class = "content about-bg text-color">
    <section class = "content">
        <div class = "container-fluid banner_margin linear_color">
            <div class = "row mmar_t40 mmar_b10 mar_t30 mar_b40">
                <div class = "col-xs-12 text-center banner_head">
                    <?php echo $event_name; ?>
                    <hr style="width:2%;border:2px solid #ffff">
                </div>
                <?php
                if(isset($event_picture)){
                    $imagepath = base_url().'asset/img/events/main/'.$event_picture;
                }else{
                    $imagepath = base_url().'images/empty_thumb.jpg';
                }
                ?>
                <img src = "<?php echo $imagepath; ?>" alt = "<?php echo $event_name; ?>">
                <div>
                    <p>price - <?php echo $event_price;?></p>
                    <p>location - <?php echo $event_location; ?></p>
                    <p>about - <?php echo $event_description; ?></p>
                    <p>city - <?php echo $event_city; ?></p>
                    <p>attendance - <?php echo $event_att ?></p>
                    <?php
                    foreach($speakers as $speaker){
                        echo '<p>Name - '.$speaker->sp_name.'</p>';
                        echo '<p>Url - '.$speaker->sp_url.'</p>';
                        if(isset($speaker->sp_image)){
                            $spimage = base_url().'asset/img/events/speakers/'.$speaker->sp_image;
                        }else{
                            $spimage = base_url().'asset/img/alt.jpg';
                        }   
                        echo '<p>image - <img src = "'.$spimage.'" alt = "'.$speaker->sp_name.'"></p>';
                    } 
                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
</div>    