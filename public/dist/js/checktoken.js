
$(document).ready(function(){  
    $.ajax({
        type: 'POST',
        CrossDomain:true,
        url: '/api/getUser',
        data:{token:Cookies.get('token') }// getting filed value in serialize form
    })
    .done(function(data){
        if(data.data.status != 200){
            alert("Phien het han. Vui long dang nhap lai");
        }
          
    });
});