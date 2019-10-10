var  data = {name: username.value}

$(document).ready(function() {
    $('#nameButt').click( function() { 
        $.ajax({
            method: "POST" , 
            url: "index.php",
            data: data,
            success: () =>
            console.log("Data was sent") 
        })
        return false;
    })
})






