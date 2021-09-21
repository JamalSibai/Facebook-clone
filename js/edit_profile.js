$(document).ready(function(){
    $("#edit_profile_btn").click(function () {
        $("#popup").toggle();
    })

    var fnameElement = $('#name_add_edit');
    var phoneElement = $('#phone_add_edit');





    var phoneValid;
    var fnameValid;

    // Listeners


    $("#button_id_edit").click( function () {
        validatePhone();
        validatefname();
        

        

        if(fnameValid == false){
            var element = fnameElement;
            alert("enter valid name")
        }

        

        if(phoneValid == false){
            var element = phoneElement;
            alert("enter valid number")
        }

        

        if (fnameValid && phoneValid ) {
            $('#button_id_edit').click(editProfile);

                async function editProfileAPI(){
                    var name = $('#name_add_edit').val();
                    var phone = $("#phone_add_edit").val();
                    var gender = $("#gender_edit").val();
                    const response = await fetch("php/edit_profile.php",{
                    method: 'POST',
                    body: new URLSearchParams({
                        "name": name,
                        "phone": phone,
                        "gender": gender

                        
                    })
                })

                    
                    if(!response.ok){
                        const message = "ERROR OCCURED";
                        throw new Error(message);
                    }
                    
                    const results = await response.json();
                    return results
                }
                function editProfile(){
                    editProfileAPI().then(results=>{
                        var output = '';
                            output += '<li><span>Full Name:</span>'+results.name+'</li><li><span>Email:</span>'+results.email+'</li> <li><span>Phone:</span>'+results.phone+'</li> <li><span>Gender:</span>'+results.gender+'</li>'
                            
                        
                        
                        $('#show_edit').html(output);
                        
                })

                }   
            }




        });





        function validatePhone() {
        phoneValid = false;
        var phoneValue = phoneElement.val().split(" ").join("");
        if (
            (phoneValue.length == 12 || phoneValue.length == 11) &&
            phoneValue.indexOf("+961") == 0
        ) {
            phoneValid = true;
        }
        }


        function validatefname(){
        fnameValid = false;
        if(fnameElement.val().length>2){
            fnameValid = true;
        }
        }


});