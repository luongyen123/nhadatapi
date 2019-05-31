function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }
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
        if(data.status === 414){

        }

    });// if getting done then ca
});
