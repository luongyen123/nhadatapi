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
$('#edituser').on('submit', function(e){
   
    e.preventDefault();
    e.stopImmediatePropagation();
    
    var auth = $("#auth").val();
    var user_id = $("#user_id").val();
    var psw = $("#psw").val();

    $.ajax({
        type: 'POST',
        CrossDomain:true,
        headers: {
            "Authorization": "Bearer " +  Cookies.get('token')
          },
        url: '/api/editUser',
        data: $(this).serialize() // getting filed value in serialize form
    })
    .done(function(data){
        if(data.status === 200){
            if(auth == user_id){
                if(psw != "none"){
                    Cookies.set('token',"null",{ expires: 30 });
                    Cookies.set('user',"null",{ expires: 30 });

                    location.href = '/admin/login';
                }else{
                    Cookies.set('user',data.data, { expires: 30 });
                    location.href = '/admin/home';
                }
            }
            
        }

    });// if getting done then ca
});

$("#imageUpload").change(function() {
    readURL(this);
});