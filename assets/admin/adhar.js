$(document).ready(function(){
   
    var $modal = $('#modal_crop');
    var crop_images = document.getElementById('sample_image');
    var cropper;
    $('#addharFronts').change(function(event){
        console.log("addhar");
        var files = event.target.files;
       
        var done = function(url){
            crop_images.src = url;
            $modal.modal('show');
        };
     //    console.log("bler kaj",done)
        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });
    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(crop_images, {
            aspectRatio: 1,
            viewMode: 3,
            preview:'.preview'
        });
        console.log('cropper',cropper)
    }).on('hidden.bs.modal', function(){
        cropper.destroy();
        cropper = null;
    });
    $('#crop_and_upload').click(function(){
        canvas = cropper.getCroppedCanvas({
            width:400,
            height:400
        });
       
        canvas.toBlob(function(blob){
           
            url = URL.createObjectURL(blob);
           
            var reader = new FileReader();
           
           reader.readAsDataURL(blob);
            reader.onloadend = function(){
            var base64data = reader.result;
         //    console.log(base64data)
            $("#addharFrontDoc").val(base64data);
          
                 $modal.modal('hide');
            };
           
        });
    });
 });