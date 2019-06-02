jQuery.support.cors = true;
var form = $( "#regisForm" );
const formValidate = true;
form.validate();
$('#regisForm').on('submit', function(e){
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
        url: '/api/register',
        data: $(this).serialize() // getting filed value in serialize form
    })
    .done(function(data){
        if(data.status == 200){
            alert(data.message);
            location.href ="/admin/login";
        }
        if(data.status === 414){
            if(typeof data.message.email !== "undefined"){
                alert(data.message.email[0]);
            }            
        }

    });// if getting done then ca
})