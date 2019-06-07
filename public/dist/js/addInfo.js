jQuery.support.cors = true;
var form = $( "#addInfo" );
const formValidate = true;
form.validate();
$('#addInfo').on('submit', function(e){
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
        url: '/api/addInfo',
        data: $(this).serialize() // getting filed value in serialize form
    })
    .done(function(data){
        // console.log(data.status);
        if(data.status == 200){
            alert('Đăng kí thành công');
            location.href = '/';
        }
        

    });// if getting done then ca
});
