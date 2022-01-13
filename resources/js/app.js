require('./bootstrap');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$('#contact-form-id').on('submit',function(e){
    e.preventDefault();

    let voornaam = $('#voornaam').val();
    let tussenvoegsel = $('#tussenvoegsel').val();
    let achternaam = $('#achternaam').val();
    let email = $('#email').val();
    let vraag = $('#vraag').val();
    let _token  = $('meta[name="csrf-token"]').attr('content');


    $.ajax({
      url: "/contact",
      type:"POST",
      data:{
        _token: _token,
        voornaam:voornaam,
        tussenvoegsel,tussenvoegsel,
        achternaam, achternaam,
        email:email,
        vraag:vraag,
      },
      success:function(response){
        $('#container-contact-form').html(
            '<div class="succes-message"></div><p class="text-center succes-text">Uw vraag is verstuurd</p>'
        );
      },
      error: function(response) {
        $('#voornaamErrorMsg').text(response.responseJSON.errors.voornaam);
        $('#emailErrorMsg').text(response.responseJSON.errors.email);
        $('#achternaamErrorMsg').text(response.responseJSON.errors.achternaam);
        $('#vraagErrorMsg').text(response.responseJSON.errors.vraag)
      },
      });
    });
