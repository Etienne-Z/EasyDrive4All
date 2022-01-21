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
      beforeSend : function () {  
        // before send, show the loading gif
        $('#contact-form-id').hide();
        $('#wait').show(); 
      },
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
      complete : function () { 
        // or hide here
        // this callback called either success or failed
        $('#wait').hide();
        $('#contact-form-id').show();
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


    $('#sign-up-form').on('submit',function(e){
      e.preventDefault();
      let first_name = $('#first_name').val();
      let insertion = $('#insertion').val();
      let last_name = $('#last_name').val();
      let email = $('#email').val();
      let address = $('#address').val();
      let city = $('#city').val();
      let zipcode = $('#zipcode').val();
      let _token  = $('meta[name="csrf-token"]').attr('content');
  
  
      $.ajax({
        beforeSend : function () {  
          // before send, show the loading gif
          $('#wait').show(); 
          $('#sign-up-form').hide();
        },
        url: "/inschrijven/versturen",
        type:"POST",
        data:{
          first_name:first_name,
          insertion,insertion,
          last_name, last_name,
          email:email,
          address:address,
          zipcode:zipcode,
          city:city,
          _token: _token,
        },
        complete : function () { 
          // or hide here
          // this callback called either success or failed
          $('#wait').hide();
          $('#sign-up-form').show();
        },
        success:function(response){
          $('.sign-up-container').html(
              '<div class="succes-message"></div><p class="text-center succes-text">Uw vraag is verstuurd</p>'
          );
        },
        
        error: function(response) {
          $('#voornaamErrorMsg').text(response.responseJSON.errors.first_name);
          $('#achternaamErrorMsg').text(response.responseJSON.errors.last_name);
          $('#emailErrorMsg').text(response.responseJSON.errors.email);
          $('#adresErrorMsg').text(response.responseJSON.errors.address);
          $('#postcodeErrorMsg').text(response.responseJSON.errors.zipcode)
          $('#stadErrorMsg').text(response.responseJSON.errors.city)


        },
        });
      });
  
      //delet user form invullen en id doorgeven
      $('.delete-button').on('click',function(e){
        e.preventDefault();
        // slaat id op van user
        let id = $(this).attr("value");
        $('#dialog-delete-user').show();
        //zet id in user in de form
        $('#deleting-user-id').val(id);
      });


      //Register form

      $('#register').on('submit',function(e){
        e.preventDefault();
        let first_name = $('#first_name').val();
        let insertion = $('#insertion').val();
        let last_name = $('#last_name').val();
        let email = $('#email').val();
        let address = $('#address').val();
        let city = $('#city').val();
        let zipcode = $('#zipcode').val();
        let roll = $('#roll').val();
        
        if(roll > 0){
          var instructor = 0;
        }else{
          var instructor = $("#instructor").find(':selected').val();
        }
        console.log(instructor);
        let _token  = $('meta[name="csrf-token"]').attr('content');
    
    
        $.ajax({
          beforeSend : function () {  
            // before send, show the loading gif
            $('#wait').show(); 
            $('#register').hide();
          },
          url: "/student_register",
          type:"POST",
          data:{
            first_name:first_name,
            insertion,insertion,
            last_name, last_name,
            email:email,
            address:address,
            zipcode:zipcode,
            city:city,
            roll, roll,
            instructor,instructor,
            _token: _token,
          },
          complete : function () { 
            // or hide here
            // this callback called either success or failed
            $('#wait').hide();
            $('#register').show();
          },
          success:function(response){
            $('.sign-up-container').html(
                '<div class="succes-message"></div><p class="text-center succes-text">Registratie is gelukt</p><p class="text-center succes-text"><a class="link-ajax" href="/students_overview"><i class="fas fa-arrow-left"></i> Terug naar Studenten overzicht</a></p>'
            );
          },
          
          error: function(response) {
            $('#firstNameErrorMsg').text(response.responseJSON.errors.first_name);
            $('#insertionErrorMsg').text(response.responseJSON.errors.insertion);
            $('#lastNameErrorMsg').text(response.responseJSON.errors.last_name);
            $('#emailErrorMsg').text(response.responseJSON.errors.email);
            $('#addressErrorMsg').text(response.responseJSON.errors.address);
            $('#cityErrorMsg').text(response.responseJSON.errors.zipcode);
            $('#zipcodeErrorMsg').text(response.responseJSON.errors.city);
            $('#instructorErrorMsg').text(response.responseJSON.errors.instructor);
          },
          });
        });




        

      $('#register-instructor').on('submit',function(e){
        e.preventDefault();
        let first_name = $('#first_name').val()
        let insertion = $('#insertion').val();
        let last_name = $('#last_name').val();
        let email = $('#email').val();
        let address = $('#address').val();
        let city = $('#city').val();
        let zipcode = $('#zipcode').val();
        let roll = $('#roll').val();
        let _token  = $('meta[name="csrf-token"]').attr('content');
    
    
        $.ajax({
          beforeSend : function () {  
            // before send, show the loading gif
            $('#wait').show(); 
            $('#register-instructor').hide();
          },
          url: "/instructors_register",
          type:"POST",
          data:{
            first_name:first_name,
            insertion,insertion,
            last_name, last_name,
            email:email,
            address:address,
            zipcode:zipcode,
            city:city,
            roll, roll,
            _token: _token,
          },
          complete : function () { 
            // or hide here
            // this callback called either success or failed
            $('#wait').hide();
            $('#register-instructor').show();
          },
          success:function(response){
            $('.sign-up-container').html(
                '<div class="succes-message"></div><p class="text-center succes-text">Registratie gelukt</p><p class="text-center succes-text"><a class="link-ajax" href="/instructors_overview"><i class="fas fa-arrow-left"></i> Terug naar Instructeuren overzicht</a></p>'
            );
          },
          
          error: function(response) {
            $('#firstNameErrorMsg').text(response.responseJSON.errors.first_name);
            $('#insertionErrorMsg').text(response.responseJSON.errors.insertion);
            $('#lastNameErrorMsg').text(response.responseJSON.errors.last_name);
            $('#emailErrorMsg').text(response.responseJSON.errors.email);
            $('#addressErrorMsg').text(response.responseJSON.errors.address);
            $('#cityErrorMsg').text(response.responseJSON.errors.zipcode);
            $('#zipcodeErrorMsg').text(response.responseJSON.errors.city);
          },
          });
        });



          // Announcement Page Create
          $('#createAnnouncement').on('submit',function(e){
            e.preventDefault();
            let title = $('#title').val();
            let description = $('#description').val();
            let role = $('#role').val();
            console.log(title);
            console.log(description);
            console.log(role);
            let _token  = $('meta[name="csrf-token"]').attr('content');
        
        
            $.ajax({
              beforeSend : function () {  
                // before send, show the loading gif
                $('#wait').show(); 
                $('#createAnnouncement').hide();
              },
              url: "/createannouncement",
              type:"POST",
              data:{
                title: title,
                description: description,
                role: role,
                _token: _token,
              },
              complete : function () { 
                // or hide here
                // this callback called either success or failed
                $('#wait').hide();
                $('#createAnnouncement').show();
              },
              success:function(response){
                $('.sign-up-container').html(
                    '<div class="succes-message"></div><p class="text-center succes-text">Mededeling aanmaken is gelukt</p><p class="text-center succes-text"><a class="link-ajax" href="/ownerannouncements"><i class="fas fa-arrow-left"></i> Terug naar Mededelingen pagina</a></p>'
                );
              },
              
              error: function(response) {
                $('#titleErrorMsg').text(response.responseJSON.errors.title);
                $('#descriptionErrorMsg').text(response.responseJSON.errors.description);
                $('#roleErrorMsg').text(response.responseJSON.errors.role);
              },
              });
            });


            // Announcement Page Edit
            $('#editAnnouncement').on('submit',function(e){
              e.preventDefault();
              let title = $('#title').val();
              let description = $('#description').val();
              let role = $('#role').val();
              console.log(title);
              console.log(description);
              console.log(role);
              let _token  = $('meta[name="csrf-token"]').attr('content');
          
          
              $.ajax({
                beforeSend : function () {  
                  // before send, show the loading gif
                  $('#wait').show(); 
                  $('#editAnnouncement').hide();
                },
                url: "/editannouncement/{id}",
                type:"put",
                data:{
                  title: title,
                  description: description,
                  role: role,
                  _token: _token,
                },
                complete : function () { 
                  // or hide here
                  // this callback called either success or failed
                  $('#wait').hide();
                  $('#editAnnouncement').show();
                },
                success:function(response){
                  $('.sign-up-container').html(
                      '<div class="succes-message"></div><p class="text-center succes-text">Mededeling aanpassen is gelukt</p><p class="text-center succes-text"><a class="link-ajax" href="/ownerannouncements"><i class="fas fa-arrow-left"></i> Terug naar Mededelingen pagina</a></p>'
                  );
                },
                
                error: function(response) {
                  $('#titleErrorMsg').text(response.responseJSON.errors.title);
                  $('#descriptionErrorMsg').text(response.responseJSON.errors.description);
                  $('#roleErrorMsg').text(response.responseJSON.errors.role);
                },
                });
              });
    
    