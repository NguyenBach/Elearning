function deleteQuestion(id) {
    if (confirm('Are you sure to delete this item?')) {
        window.location.href = window.location.pathname + '/question_delete/' + id;
    }
}

jQuery(document).ready(function() {
    $('#questions-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.location.pathname + '/question_datatable',
        columns: [
            { data: 'id', name: 'question.id' },
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
            var detailBtn = '<a class="btn btn-sm btn-info" href="' + window.location.pathname + '/detail/' + data.id + '">Detail</a>';
            var editBtn   = '<a class="btn btn-sm btn-info" href="' + window.location.pathname + '/question_edit/' + data.id + '">Edit</a>';
            var deleteBtn = '<a class="btn btn-sm btn-danger" onclick="deleteQuestion(' + data.id + ')">Delete</a>';
            var space     = '<span> </span>';
            var actionCol = detailBtn + space + editBtn + space + deleteBtn;
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
