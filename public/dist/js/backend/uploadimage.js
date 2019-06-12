function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
       
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
            var user = jQuery.parseJSON(Cookies.get('user'));
            $.ajax({
                    type: 'POST',
                    CrossDomain:true,
                    headers: {
                        "Authorization": "Bearer " +  Cookies.get('token')
                      },
                    url: '/api/media/uploadImage',
                    data: {image: e.target.result,user_name: user.name}// getting filed value in serialize form
                })
                .done(function(url){
                    // console.log(url);
                   $("#anh").val(url)
            
                });
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imageUpload").change(function() {
    readURL(this);
});
