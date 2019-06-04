
//form validate
jQuery.support.cors = true;
var form = $( "#loginform" );
const formValidate = true;
form.validate();
$('#loginform').on('submit', function(e){
    e.preventDefault();
//I had an issue that the forms were submitted in geometrical progression after the next submit.
// This solved the problem.
    e.stopImmediatePropagation();
    // show that something is loading
    $('#response').html("<b>Loading data...</b>");

    // Call ajax for pass data to other place
    $.ajax({
        type: 'POST',
        CrossDomain:true,
        url: '/api/login',
        data: $(this).serialize() // getting filed value in serialize form
    })
    .done(function(data){
        // console.log(data.status);
        if(data.status == 200){
            Cookies.set('token', data.data.token, { expires: 30 });
            Cookies.set('user',data.data.user,  { expires: 30});
            
            location.href = '/admin/home';
        }
        if(data.status === 415){
            alert(data.message);
            
        }
        if(data.status == 404){
            alert(data.message);
        }
        if(data.status == 413){
            alert(data.message);
        }

    });// if getting done then ca
});
