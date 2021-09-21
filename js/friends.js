$(document).ready(function(){
    async function getfirendsAPI(){
        
		const response = await fetch("php/getFriends.php")
        

		
		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		const results = await response.json();
        
        return results
	}
    function getFriend(){
        getfirendsAPI().then(results=>{
            output = '';
            output +=' <div class="row">';
            $.each(results,function(key, value){
                output += '<div class="col-md-4"><div> <div class="product-thumb "  style="margin: auto;width: 60%;" > <img style="border-radius: 50%; " alt="Avatar" class="img-responsive" src="images/team/team-1.jpg"  /> </div> <div class="product-content " style="text-align:center"><h4>'+value.name+'</h4><p>'+value.gender+'</p> <button style="text-align:center" class="btn btn-main btn-large btn-round-full  btn_remove" id="'+value.friend_id+'" style="text-align:center">Remove </button> <button style="text-align:center" class="btn btn-main btn-large btn-round-full  btn_block" id="'+value.friend_id+'" style="text-align:center">Block </button> </div></div></div>'
                //testing table
                // output += '<tr> <td class="id_search"  contenteditable id = "id_search" >'+value.name+'</td> <td type = "text" class="name"  contenteditable id = "name">'+value.email+'</td> <td  class="phone_search"  contenteditable id = "phone_search" >'+value.phone+'</td> <td class="gender_search"  contenteditable id = "gender_search">'+value.gender+'</td> <td><button type="button"  id="'+value.friend_id+'" class="btn btn-xs  btn-danger btn_remove">Remove</button></td> <td><button type="button"  id="'+value.friend_id+'" class="btn btn-xs  btn-danger btn_block">Block</button></td> </tr>'        
                
                
            })
            output += '</div>';
            $('#live_data').html(output);
        })
    }
    getFriend();


    //////remove friend

    $(document).on('click', '.btn_remove', removeFriendAPI)

    async function removeFriendAPI(){
        var id=$(this).attr("id"); 
        const response = await fetch("php/removeFriend.php",{
            method: 'POST',
            body: new URLSearchParams({
                "friend_id": id,
                
            })

        })
        

        
        if(!response.ok){
            const message = "ERROR OCCURED";
            throw new Error(message);
        }
        
        const results = await response.json();
        
        alert("Friend Removed")
        getFriend();
    }

    //////////////block friend
    $(document).on('click', '.btn_block', blockFriendAPI)

    async function blockFriendAPI(){
        var id=$(this).attr("id"); 
        const response = await fetch("php/blockFriend.php",{
            method: 'POST',
            body: new URLSearchParams({
                "friend_id": id,
                
            })

        })
        

        
        if(!response.ok){
            const message = "ERROR OCCURED";
            throw new Error(message);
        }
        
        const results = await response.json();
        
        alert("Friend blocked")
        getFriend();
    }

})