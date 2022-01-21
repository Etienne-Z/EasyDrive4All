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
      //delete user form invullen en id doorgeven
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
            $('#register').show();
          },
          success:function(response){
            $('.sign-up-container').html(
                '<div class="succes-message"></div><p class="text-center succes-text">Uw vraag is verstuurd</p><p class="text-center succes-text"><a class="link-ajax" href="/instructors_overview"><i class="fas fa-arrow-left"></i> Terug naar Studenten overzicht</a></p>'
            );
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



      $('#ziekmelden').on('submit',function(e){
        e.preventDefault();
        let start_date = $('#start_date').val()
        let end_date = $('#end_date').val()
        let reason = $('#reason').val()
        let _token  = $('meta[name="csrf-token"]').attr('content');
    
    
        $.ajax({
          beforeSend : function () {  
            // before send, show the loading gif
            $('#wait').show(); 
            $('#ziekmelden').hide();
          },
          url: "/instructeur/ziekmelding",
          type:"POST",
          data:{
              start_date:start_date,
              end_date:end_date,
              reason:reason,
              _token: _token,
          },
          complete : function () { 
            // or hide here
            // this callback called either success or failed
            $('#wait').hide();
            $('#ziekmelden').show();
          },
          success:function(response){
            $('.sign-up-container').html(
                '<div class="succes-message"></div><p class="text-center succes-text">U heeft u ziekgemeld</p>'
            );
          },
          
          error: function(response) {
            $('#start_dateErrorMsg').text(response.responseJSON.errors.start_date);
            $('#end_dateErrorMsg').text(response.responseJSON.errors.end_date);
            $('#reasonErrorMsg').text(response.responseJSON.errors.reason);
          },
          });
        });
        $('#register-car').on('submit',function(e){
            e.preventDefault();
            let Type = $('#Type').val()

            let Brand = $('#Brand').val();
            let License_plate = $('#License_plate').val();
            console.log(Brand);
            console.log(License_plate);
            let _token  = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                beforeSend : function () {
                // before send, show the loading gif
                $('#wait').show();
                $('#register-car').hide();
                },
                url: "/cars_register",
                type:"POST",
                data:{
                Type:Type,
                Brand:Brand,
                License_plate: License_plate,
                _token: _token,
                },
                complete : function () {
                // or hide here
                // this callback called either success or failed
                $('#wait').hide();
                $('#register-car').show();
                },
                success:function(response){
                $('.sign-up-container').html(
                    '<div class="succes-message"></div><p class="text-center succes-text">Auto toevoegen gelukt</p><p class="text-center succes-text"><a class="link-ajax" href="/cars_overview"><i class="fas fa-arrow-left"></i> Terug naar het wagenpark overzicht</a></p>'
                );
                },

                error: function(response) {
                $('#TypeErrorMsg').text(response.responseJSON.errors.Type);
                $('#BrandErrorMsg').text(response.responseJSON.errors.Brand);
                $('#License_plateErrorMsg').text(response.responseJSON.errors.License_plate);
                },
                });
            });






        $('#changeStudent').on('submit',function(e){
          e.preventDefault();
          let first_name = $('#first_name').val();
          let user_id = $('#user_id').val();
          let insertion = $('#insertion').val();
          let last_name = $('#last_name').val();
          let email = $('#email').val();
          let address = $('#address').val();
          let city = $('#city').val();
          let zipcode = $('#zipcode').val();
          var instructor = $("#instructor").find(':selected').val();
          let _token  = $('meta[name="csrf-token"]').attr('content');
      
          $.ajax({
            beforeSend : function () {  
              // before send, show the loading gif
              $('#wait').show(); 
              $('#changeStudent').hide();
            },
            url: "/student_change",
            type:"POST",
            data:{
              user_id:user_id,
              first_name:first_name,
              insertion,insertion,
              last_name, last_name,
              email:email,
              address:address,
              zipcode:zipcode,
              city:city,
              instructor,instructor,
              _token: _token,
            },
            complete : function () { 
              // or hide here
              // this callback called either success or failed
              $('#wait').hide();
              $('#changeStudent').show();
            },
            success:function(response){
              $('.sign-up-container').html(
                  '<div class="succes-message"></div><p class="text-center succes-text">Registratie is gelukt</p><p class="text-center succes-text"><a class="link-ajax" href="/students_overview"><i class="fas fa-arrow-left"></i> Terug naar Studenten overzicht</a></p>'
              );
            },
            
            error: function(response) {
              console.log(response);
            },
            });
          });

          $('#changeInstructor').on('submit',function(e){
            e.preventDefault();
            let first_name = $('#first_name').val();
            let user_id = $('#user_id').val();
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
                $('#changeStudent').hide();
              },
              url: "/instructors_change",
              type:"POST",
              data:{
                user_id:user_id,
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
                $('#changeInstructor').show();
              },
              success:function(response){
                $('.sign-up-container').html(
                    '<div class="succes-message"></div><p class="text-center succes-text">Registratie is gelukt</p><p class="text-center succes-text"><a class="link-ajax" href="/instructors_overview"><i class="fas fa-arrow-left"></i> Terug naar instructeuren overzicht</a></p>'
                );
              },
              
              error: function(response) {
                console.log(response);
              },
              });
            });
