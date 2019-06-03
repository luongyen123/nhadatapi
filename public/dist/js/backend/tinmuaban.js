CKEDITOR.replace( 'description', {
    filebrowserBrowseUrl: '../../ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
} );
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
                $('#tinhthanh').append($('<option>',{value: tinhthanh[c].id,text: tinhthanh[c].tinh}));
            }
        }    
    });// if getting done then ca
   
    // Get loai tin
    $.ajax({
        type: 'POST',
        CrossDomain:true,
        url: '/api/getLoaitin'// getting filed value in serialize form
    })
    .done(function(data){
        // console.log(data.status);
        if(data.status === 200){
            // console.log(data.data.token);
            var loaitin = data.data.datas;
            for(let c in loaitin){
                $('#loaitinchon').append($('<option>',{value: loaitin[c].id,text: loaitin[c].tenloaitin}));
            }
        }    
    });

    $("input[type='radio'].check").click(function() {
        if($(this).is(':checked')) {
            if ($(this).val() == 1) {
                $("#diachi").css('display','block');           
                $("#grloaitin").css('display','none');
                //validate input rewuried cho diachi
                $('#tinhthanh').attr('required', 'required');
                $('#quanhuyenTP').attr('required', 'required');
                $('#xaphuong').attr('required', 'required');
                $('#vitri').attr('required', 'required');
                $('#gia').attr('required', 'required');
                $('#dientich').attr('required', 'required');
                //bo required cho loaitin
                $('#loaitinchon').removeAttr('required');
            }else{
                $("#diachi").css('display','none');
                $("#grloaitin").css('display','block');

                //validate input required cho loai tin
                $('#loaitinchon').attr('required', 'required');
                //bo required cho loaitin
                $('#tinhthanh').removeAttr('required');
                $('#quanhuyenTP').removeAttr('required')
                $('#xaphuong').removeAttr('required')
                $('#vitri').removeAttr('required')
                $('#gia').removeAttr('required')
                $('#dientich').removeAttr('required')
            }
        }
    });
   
    

});
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
$("#quanhuyenTP").change(function(){
    var value = $('#quanhuyenTP option:selected').val();
    $.ajax({
        type: 'POST',
        CrossDomain:true,
        url: '/api/getXaphuong',
        data: {maqh:value}// getting filed value in serialize form
    })
    .done(function(data){
        // console.log(data.status);
        if(data.status === 200){
            // console.log(data.data.token);
            var xaphuong = data.data.datas;
            var html="<option value=''>-- Vui lòng chọn xã phường --</option>";
            if(xaphuong.length == 0){
                html="<option value= 0>Chọn xã phường trước</option>";
            }else{
                for(let c in xaphuong){
                    html= html + "<option value="+xaphuong[c].id+">"+xaphuong[c].tenxa+"</option>";                   
               }
            }                
            $("#xaphuong").html(html);
        }else{
            alert("Có lỗi xảy ra");
        }  
    });
});
$('#news').on('submit', function(e){
    e.preventDefault();
//I had an issue that the forms were submitted in geometrical progression after the next submit.
// This solved the problem.
    e.stopImmediatePropagation();
    // show that something is loading
    // $('#response').html("<b>Loading data...</b>");
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    // console.log($(this).serialize());
    // // Call ajax for pass data to other place
    $.ajax({
        type: 'POST',
        CrossDomain:true,
        headers: {
            "Authorization": "Bearer " +  Cookies.get('token')
          },
        url: '/api/tintuc/themtin',
        data: $(this).serialize() // getting filed value in serialize form
    })
    .done(function(data){
        // console.log(data.status);
        if(data.status === 200){
            location.reload();
        }

    });// if getting done then ca
});
$('#editnews').on('submit', function(e){
    e.preventDefault();
//I had an issue that the forms were submitted in geometrical progression after the next submit.
// This solved the problem.
    e.stopImmediatePropagation();
    // show that something is loading
    // $('#response').html("<b>Loading data...</b>");
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    // console.log($(this).serialize());
    // // Call ajax for pass data to other place
    $.ajax({
        type: 'POST',
        CrossDomain:true,
        headers: {
            "Authorization": "Bearer " +  Cookies.get('token')
          },
        url: '/api/tintuc/editTinmua',
        data: $(this).serialize() // getting filed value in serialize form
    })
    .done(function(data){
        if(data.status === 200){
            location.reload();
        }

    });// if getting done then ca
});

$('#editTintuc').on('submit', function(e){
    $id = $("#news_id").val();
   
    e.preventDefault();
//I had an issue that the forms were submitted in geometrical progression after the next submit.
// This solved the problem.
    e.stopImmediatePropagation();
    // show that something is loading
    // $('#response').html("<b>Loading data...</b>");
    for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }
    // console.log($(this).serialize());
    // // Call ajax for pass data to other place
    $.ajax({
        type: 'POST',
        CrossDomain:true,
        headers: {
            "Authorization": "Bearer " +  Cookies.get('token')
          },
        url: '/api/tintuc/editTintuc',
        data: $(this).serialize() // getting filed value in serialize form
    })
    .done(function(data){
        if(data.status === 200){
            location.reload();
        }

    });// if getting done then ca
});