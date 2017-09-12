$(document).ready(function(){
    // $('form').on('submit', function(e) {
    //   e.preventDefault(); // prevent native submit
    //   $(this).ajaxSubmit({
    //     target: 'myResultsDiv'
    //   })
    // });
    $('#quiz').ajaxForm({
        // dataType identifies the expected content type of the server response
        dataType:  'json',
        success: function(data){
            console.log(data);

        }
    });

});
