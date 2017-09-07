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
            $.each(data,function(key, value)
            {
                if(key != 'result'){
                    var selector = 'input[name=' + key + '][value="' + value + '"]';
                    $(selector).parent().addClass('is_answer');
                }
            });
            alert('Result: ' + data.result);

        }
    });

});
