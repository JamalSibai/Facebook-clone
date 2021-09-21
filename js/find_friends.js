$(document).ready(function(){

    $('#button_search').click(findFriends);

    async function findFriendsAPI(){
        var searchValue = $('#Search').val();
		const response = await fetch("php/find_friends.php",{
        method: 'POST',
        body: new URLSearchParams({
            "name": searchValue,
            
        })
    })

		
		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		const results = await response.json();
        return results
        
        // findFriends(results);
		// console.log(results);
	}
    
    function findFriends(){
        findFriendsAPI().then(results=>{
            var output = '';
            output +=' <div class="row">';
            $.each(results,function(key, value){
                output += '<div class="col-md-4"><div> <div class="product-thumb "  style="margin: auto;width: 60%;" > <img style="border-radius: 50%; " alt="Avatar" class="img-responsive" src="images/team/team-1.jpg"  /> </div> <div class="product-content " style="text-align:center"><h4>'+value.name+'</h4><p>'+value.gender+'</p> <button style="text-align:center" class="btn btn-main btn-large btn-round-full  btn_add_friend" id="'+value.id+'" style="text-align:center">add friend</button> </div></div></div>'
                //testing table
                // output += '<tr> <td class="id_search" data-id1="'+value.id+'" contenteditable id = "id_search" >'+value.id+'</td> <td type = "text" class="name" data-id2="'+value.name+'" contenteditable id = "name">'+value.name+'</td> <td  class="phone_search" data-id3="'+value.phone+'" contenteditable id = "phone_search" >'+value.phone+'</td> <td class="gender_search" data-id4="'+value.gender+'" contenteditable id = "gender_search">'+value.gender+'</td> <td><button type="button" name = "'+value.name+'" id="'+value.id+'" class="btn btn-xs  btn-info btn_add_friend">add friend</button></td>  </tr>'        
                
                
            })
            output += '</div>';
            $('#live_data').html(output);
            console.log("run")
    })
    }

///////////////////////////////////////add_friends////////////////////////////////////////////////////////
   $(document).on('click', '.btn_add_friend', addFriendsAPI)
    async function addFriendsAPI(){
        var id=$(this).attr("id"); 
        var name =$(this).attr("name");
        const response = await fetch("php/add_friends.php",{
        method: 'POST',
        body: new URLSearchParams({
            "friendToBe": id,
            "name":name,
            
        })
    })

        
        if(!response.ok){
            const message = "ERROR OCCURED";
            throw new Error(message);
        }
        
        // const results = await response.json();
        // return results
        addFriend();
        findFriends();
        
    }

    function addFriend(){
            alert("request sent")
            
        
    }

















    
})
