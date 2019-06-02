
$(document).ready(function(){
    
    $.ajax({
        type: 'POST',
        CrossDomain:true,
        url: '/api/getUser',
        data:{token:""+Cookies.get('token') }// getting filed value in serialize form
    })
    .done(function(data){
        console.log(data.status);
        if(data.status != 200){
            console.log("hello");
            alert("Phien het han. Vui long dang nhap lai");
            Cookies.set('token',"null",{ expires: 30 });
            Cookies.set('user',"null",{ expires: 30 });
            location.reload();
        }
          
    });
});