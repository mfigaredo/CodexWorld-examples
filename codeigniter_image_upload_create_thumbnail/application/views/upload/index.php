<!-- File upload form -->
<form action="" method="post" enctype="multipart/form-data">
    <label>Choose Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="UPLOAD">
</form>

<!-- Display upload status -->
<div class="result">
    <?php if(!empty($status)){ ?>
        <p class="status-msg <?php echo $status; ?>"><?php echo $status_msg; ?></p>
    <?php } ?>
    
    <?php if(!empty($thumbnail)){ ?>
        <div class="info">
            <p>Original Image Size: <?php echo $org_image_size; ?></p>
            <p>Created Thumbnail Size: <?php echo $thumb_image_size; ?></p>
        </div>
        <div class="thumb">
            <img src="<?php echo base_url($thumbnail); ?>"/>
        </div>
    <?php } ?>
</div>