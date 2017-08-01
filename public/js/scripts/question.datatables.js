jQuery(document).ready(function() {
    $('#questions-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: window.location.pathname + '/datatable',
        columns: [
            { data: 'id', name: 'question_bank.id' },
            { data: 'name', name: 'question_bank.name' },
            { data: 'description', name: 'question_bank.description' },
            { data: 'difficulty', name: 'question_bank.difficulty' },
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
            var detailBtn = '<a class="btn btn-sm btn-info" href="' + window.location.pathname + 'question/' + data.id + '">Detail</a>';
            var editBtn   = '<a class="btn btn-sm btn-info" href="' + window.location.pathname + 'question/edit/' + data.id + '">Edit</a>';
            var deleteBtn = '<a class="btn btn-sm btn-danger" href="' + window.location.pathname + 'question/delete/' + data.id + '">Delete</a>';
            var space     = '<span> </span>';
            var actionCol = detailBtn + space + editBtn + space + deleteBtn;
            $('td', row).eq(-1).html(actionCol);

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
