
$(document).ready( function(){
$("#bank").change(function() {
    var id = this.value;
    $.ajax({
        type: "POST",
        url : window.location.pathname + '/get_questions',
        data : {
            id : id
        },
        dataType: "json",
        success : function(response) {
            $(".question").remove();
            response.forEach(function(item, i){
                var question = '<tr class="question">'
                              +'<th>'
                                  +'<span>' + (i+1) + '. ' + item.question + '</span>'
                                  +'<ul>'
                                      +'<li>A: ' + item.option_0 + '</li>'
                                      +'<li>B: ' + item.option_1 + '</li>'
                                      +'<li>C: ' + item.option_2 + '</li>'
                                      +'<li>D: ' + item.option_3 + '</li>'
                                  +'</ul>'
                              +'</th>'
                              +'<td>'
                                  +'<input name="question_id[]" type="checkbox" class="form-check-input" value=' + item.id + '>'
                              +'</td></tr>';

                $("#list-question").append(question);
            });

        },
        error: function() {
            alert('Error occured');
        }
    });
});

});
