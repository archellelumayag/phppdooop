$(function() {

    $(document).on('click','.deletestudent',function(event){

        event.preventDefault();
        var thisId = $(this).val();

        $.ajax({

            type: "POST",
            url: 'code.php',
            data: {
                "id": thisId,
                "action": 'delete',
                "scoreTest": 'score'
            },

        }) .done(function(response){

             console.log(response)

        }) .fail(function(response){
            console.log(response)

        }) .always(function(response){
             console.log('test')

        })

    });
});