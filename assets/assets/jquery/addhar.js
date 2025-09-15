

 $(document).ready(function(){
   
   var $modal = $('#modal_crop');
   var crop_image = document.getElementById('sample_image');
   var cropper;
   $('#addharFronts').change(function(event){
       var files = event.target.files;
       var done = function(url){
           crop_image.src = url;
           $modal.modal('show');
       };
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
       cropper = new Cropper(crop_image, {
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
       console.log('canvas',canvas)
       canvas.toBlob(function(blob){
           console.log('blob',blob)
           url = URL.createObjectURL(blob);
           console.log('blob',url)
           var reader = new FileReader();
           console.log('+++++++++++++',reader)
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

    
