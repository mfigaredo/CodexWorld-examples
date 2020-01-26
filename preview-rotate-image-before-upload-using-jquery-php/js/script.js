function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#imgPreview + img').remove();
            $('#imgPreview').after('<img src="'+e.target.result+'" class="pic-view" width="450" height="300"/>');
        };
        reader.readAsDataURL(input.files[0]);
        $('.img-preview').show();
    }else{
        $('#imgPreview + img').remove();
        $('.img-preview').hide();
    }
}

$("#file").on('change', function (){

    // Validate file type
	var filePath = this.value;
	var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
	if(!allowedExtensions.exec(filePath)){
		alert('Sorry, only JPG/JPEG/PNG/GIF files are allowed to upload.');
		this.value = '';
	}
    // Image preview
    filePreview(this);
});

$(function() {
    var rotation = 0;
    $("#rright").click(function() {
        rotation = (rotation +90) % 360;
        $(".pic-view").css({'transform': 'rotate('+rotation+'deg)'});
		
        if(rotation != 0){
            $(".pic-view").css({'width': '300px', 'height': '300px'});
        }else{
            $(".pic-view").css({'width': '100%', 'height': '300px'});
        }
        $('#rotation').val(rotation);
    });
	
    $("#rleft").click(function() {
        rotation = (rotation - 90) % 360;
        $(".pic-view").css({'transform': 'rotate('+rotation+'deg)'});
		
        if(rotation != 0){
            $(".pic-view").css({'width': '300px', 'height': '300px'});
        }else{
            $(".pic-view").css({'width': '100%', 'height': '300px'});
        }
        $('#rotation').val(rotation);
    });

    $('#uploadForm').on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        console.log(formData);
        $.ajax({
            url: 'upload.php',
            data: formData,
            type: 'POST',
            contentType: false,
            cache: false,
            processData:false,
            success: function(html) {
                $('#results').html(html);
                $('#uploadForm')[0].reset();
                $('#imgPreview + img').remove();
                $('.img-preview').hide();
            },
            error: function(){
                alert('Ajax error');
            }
        })
    })
});