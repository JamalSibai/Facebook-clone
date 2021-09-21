$(document).ready(function(){
    async function getNotificationsAPI(){
        
		const response = await fetch("php/getNotification.php")
        

		
		if(!response.ok){
			const message = "ERROR OCCURED";
			throw new Error(message);
		}
		
		const results = await response.json();
        return results
	}
    function getNotifications(){
        getNotificationsAPI().then(results=>{
            var output = '';
            output +=' <div class="table-responsive">  <table class="table table-bordered"> <tr>   <th width="80%">Notifications</th>   <th width="20%">accept</th> <th width="20%">reject</th> '
            $.each(results,function(key, value){
                output += '<tr> <td class="notifications"  contenteditable id = "id_search" >'+value.notification+'</td>  <td><button type="button" name = "'+value.sender_id+'" id="'+value.sender_id+'" class="btn btn-xs  btn-info btn_accept">Accept</button></td> <td><button type="button" name = "'+value.sender_id+'" id="'+value.sender_id+'" class="btn btn-xs  btn-danger btn_reject">Reject</button></td> </tr>'        
                
                
            })
            output += '</table></div>';
            $('#live_data').html(output);
        })
    }
    getNotifications();
    $(document).on('click', '.btn_accept', upadateTypeAPI)

    async function upadateTypeAPI(){
        var id=$(this).attr("id"); 
        const response = await fetch("php/acceptRequest.php",{
            method: 'POST',
            body: new URLSearchParams({
                "sender_id": id,
                
            })

        })
        

        
        if(!response.ok){
            const message = "ERROR OCCURED";
            throw new Error(message);
        }
        
        const results = await response.json();
        alert("Friend Added")
        getNotifications();
    }

    $(document).on('click', '.btn_reject', rejectAPI)

    async function rejectAPI(){
        var id=$(this).attr("id"); 
        const response = await fetch("php/rejectRequest.php",{
            method: 'POST',
            body: new URLSearchParams({
                "sender_id": id,
                
            })

        })
        

        
        if(!response.ok){
            const message = "ERROR OCCURED";
            throw new Error(message);
        }
        
        const results = await response.json();
        alert("Rejected")
        getNotifications();
    }
    

})