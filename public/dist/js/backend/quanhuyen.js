$(document).ready(function(){      
    $.ajax({
        type: 'POST',
        CrossDomain:true,
        url: '/api/getTinhThanh'// getting filed value in serialize form
    })
    .done(function(data){
        // console.log(data.status);
        if(data.status === 200){
            // console.log(data.data.token);
            var tinhthanh = data.data.datas;
            for(let c in tinhthanh){
                $('.tinhthanh').append($('<option>',{value: tinhthanh[c].id,text: tinhthanh[c].tinh}));
            }
        }    
    })
});
$("#tinhthanh").change(function(){
    var value = $('#tinhthanh option:selected').val();
        $.ajax({
            type: 'POST',
            CrossDomain:true,
            url: '/api/getQuanHuyen',
            data: {matinh:value}// getting filed value in serialize form
        })
        .done(function(data){
            // console.log(data.status);
            if(data.status === 200){
                // console.log(data.data.token);
                var quanhuyen = data.data.datas;
                var html="<option value=''> -- Vui lòng chọn quận huyên --</option>";
                if(quanhuyen.length == 0){
                    html="<option value= 0>Chọn tỉnh thành trước</option>";
                }else{
                    for(let c in quanhuyen){
                        html= html + "<option value="+quanhuyen[c].id+">"+quanhuyen[c].tenqh+"</option>";                   
                   }
                }                
                $("#quanhuyenTP").html(html);
            }else{
                alert("Có lỗi xảy ra");
            }  
        });
    
});