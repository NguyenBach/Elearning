function deleteQuiz(id) {
    if (confirm('Are you sure to delete this item?')) {
        window.location.href = window.location.pathname + '/delete/' + id;
    }
}

jQuery(document).ready(function() {
    $('#quiz-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.location.pathname + '/datatable',
        columns: [
            { data: 'id', name: 'quizzes.id' },
            { data: 'name', name: 'quizzes.name' },
            { data: 'description', name: 'quizzes.description' },
            { data: 'total', name: 'total', searchable: false },
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
            var editBtn   = '<a class="btn btn-sm btn-success" href="' + window.location.pathname + '/edit/' + data.id + '">Edit</a>';
            var deleteBtn = '<a class="btn btn-sm btn-danger" onclick="deleteQuiz(' + data.id + ')">Delete</a>';
            var space     = '<span> </span>';
            var actionCol = detailBtn + space + editBtn + space +  deleteBtn;
            $('td', row).eq(-1).html(actionCol).css('min-width', '180px');
        }
    });
});
