
$(document).ready(function () {
    initTableData();

    /*Check & uncheck all*/
    $(document).on('change', '#checkAll', function () {
        $('.check').prop('checked', $(this).prop('checked'));
    });

    /*Check & uncheck all*/
    $(document).on('change', '#checkAllctdt', function () {
        $('.checkctdt').prop('checked', $(this).prop('checked'));
    });

    $(document).on('click', '#quaylai', function () {
        changeRow('#dsmon', '.checkctdt');
    });

    $(document).on('click', '#xepmon', function () {
        changeRow('#monctdt', '.check');
    });

    function changeRow(ds, checkItem) {
        var ar = [];
        $(checkItem + ":checked").each(function () {
            ar = $(this).closest("tr");
            ar.appendTo(ds);
            $(this).prop('checked', false)/*bỏ checked */
            if (checkItem == '.check') { // đang là check -> checkctdt
                $(this).removeClass('check').addClass('checkctdt')/*đổi class thành checkctdt */
                $('#checkAll').prop('checked', false)/*bỏ checked all*/
            } else {
                $(this).removeClass('checkctdt').addClass('check')/*đổi class thành check */
                $('#checkAllctdt').prop('checked', false)/*bỏ checked all*/
            }
        });
        console.log(ar)
    }

    var table;
    function initTableData() {
        var data = [
            {
                "in":"<input type='checkbox' class='check'/>",
                "stt": 1,
                "tenmon": "môn 1",
                "khoiluong": "khối lượng 1",
                "dvt": "đơn vị tính 1"
            },
            {
                "in":"<input type='checkbox' class='check'/>",
                "stt": 2,
                "tenmon": "môn 2",
                "khoiluong": "khối lượng 2",
                "dvt": "đơn vị tính 2"
            },
        ];
        table = $("#example2").DataTable({
            "processing" : true,
            'paging': false,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false,
            data,
            columns:[
                {data : 'in'},
                {data : 'stt'},
                {data : 'tenmon'},
                {data : 'khoiluong'},
                {data : 'dvt'},
            ]
        });

    }
    
});