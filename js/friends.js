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
            var output = '';
            output +=' <div class="table-responsive">  <table class="table table-bordered"> <tr>   <th width="20%">Name</th>   <th width="40%">email</th> <th width="40%">phone</th> <th width="40%">gender</th> <th width="10%">Remove</th> <th width="10%">Block</th>'
            $.each(results,function(key, value){
                output += '<tr> <td class="id_search"  contenteditable id = "id_search" >'+value.name+'</td> <td type = "text" class="name"  contenteditable id = "name">'+value.email+'</td> <td  class="phone_search"  contenteditable id = "phone_search" >'+value.phone+'</td> <td class="gender_search"  contenteditable id = "gender_search">'+value.gender+'</td> <td><button type="button"  id="'+value.friend_id+'" class="btn btn-xs  btn-danger btn_remove">Remove</button></td> <td><button type="button"  id="'+value.friend_id+'" class="btn btn-xs  btn-danger btn_block">Block</button></td> </tr>'        
                
                
            })
            output += '</table></div>';
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