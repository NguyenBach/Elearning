// function deleteQuestion(quiz_id, bank_id, question_id) {
//     if (confirm('Are you sure to delete this item?')) {
//           var url = window.location.href = window.location.pathname + '/delete_question';
//           jQuery.ajax({
//               type: 'POST',
//               url: url,
//               dataType: 'json',
//               data: {
//                   quiz_id     :  quiz_id,
//                   bank_id     :  bank_id,
//                   question_id :  question_id
//               },
//               beforeSend: function (request) {
//                        return request.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
//               },
//               success: function (data) {
//                   if (data.success) {
//                       jQuery('#questions-table').dataTable()._fnAjaxUpdate();
//                   }
//               }
//           });
//       }
// }
function deleteQuestion(quiz_id, question_id, bank_id) {
    if (confirm('Are you sure to delete this item?')) {
        window.location.href = window.location.pathname + '/delete_question/' + quiz_id + '/' + question_id + '/' + bank_id;
    }
}

jQuery(document).ready(function() {
    $('#questions-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.location.pathname + '/question_datatable',
        columns: [
            { data: 'question_id', name: '.question_quiz_maps.question_id' },
            { data: 'question', name: 'question.question' },
            { data: null, name: null },
        ],
        columnDefs : [
            {
                targets : [-1],
                searchable : false,
                orderable  : false,
                defaultContent : "",
            },

        ],
        createdRow : function (row, data, index) {
            // Action Column
            var editBtn   = '<a class="btn btn-sm btn-info" href="' + window.location.pathname + '/edit/' + data.question_id + '">Edit</a>';
            var deleteBtn = '<a class="btn btn-sm btn-danger" onclick="deleteQuestion(' + data.quiz_id + ',' + data.bank_id + ',' + data.question_id + ')">Delete</a>';
            var space     = '<span> </span>';
            var actionCol = editBtn + space + deleteBtn;
            $('td', row).eq(-1).html(actionCol).css('min-width', '180px');

            // Filter Difficulty
            var difficultyName = '';
            switch (data.difficulty) {
                case 0:
                    difficultyName = 'BEGINNER';
                    break;
                case 1:
                    difficultyName = 'INTERMIDIATE';
                    break;
                case 2:
                    difficultyName = 'ADVANCED';
                    break;
            }
            $('td', row).eq(3).html(difficultyName);
        }
    });
});
