$(document).ready(function () {
    initTableData();
    function initTableData() {
        $.ajax({
            url: window.location.pathname,
            type: "post",
            data: {
                action: "getsv",
            },
            success: function (res) {
                var kq = JSON.parse(res);
                // console.log(kq);

                var table;
                var data = [];
                $.each(kq, function (i) {
                    data.push({
                        "stt": i + 1,
                        "masv": kq[i]['masv'],
                        "tensv": kq[i]['tensv'],
                        "tacvu": "<button type='button' value='" + kq[i]['id'] + "' name='sua' class='btn btn-primary btnSua " + kq[i]['id'] + "' data-toggle='modal' data-target='#modaledit' id='" + kq[i]['id'] + "'>Sửa</button>&emsp;<button type='button' value='" + kq[i]['id'] + "' name='xoa' class='btn btn-danger btnXoa' id=''>Xóa</button></td>"

                    })
                })
                table = $("#example2").DataTable({
                    // "processing": true,
                    // 'paging': false,
                    // 'lengthChange': false,
                    // 'searching': false,
                    // 'ordering': false,
                    // 'info': false,
                    // 'autoWidth': false,
                    data,
                    columns: [
                        { data: 'stt' },
                        { data: 'masv' },
                        { data: 'tensv' },
                        { data: 'tacvu' },
                    ]
                });
            }
        });
    }
    $(document).on('click', '#addsv', function (e) {
        var masv = $('input[name="masv"]').val();
        var tensv = $('input[name="tensv"]').val();

        dem = $('.odd').length + 1 + $('.even').length;
        $.ajax({
            url: window.location.pathname,
            type: "post",
            data: {
                action: "addsv",
                masv: masv,
                tensv: tensv,
            },
            success: function (res) {
                // alert(res)
                if (res != 0) {
                    // if(dem < 10){
                        var table2 = '';
                        table2 += '<tr class="odd" role="row">';
                        table2 += '<td>' + dem + '</td>';
                        table2 += '<td>' + masv + '</td>';
                        table2 += '<td>' + tensv + '</td>';
                        table2 += '<td><button type="button" value="' + res + '" name="sua" class="btn btn-primary btnSua ' + res + '" data-toggle="modal" data-target="#modaledit" id="' + res + '">Sửa</button>&emsp;<button type="button" value="' + res + '" name="xoa" class="btn btn-danger btnXoa" id="">Xóa</button></td>';
                        table2 += '</tr>';
                        // console.log(table2);
                        $(table2).appendTo('#dsmon');
                    // }
                }
            }
        });
    });
    $(document).on('click', '.btnSua', function (e) {
        var id = $(this).val();
        var ma = $(this).closest("td").prev().prev().text();
        var ten = $(this).closest("td").prev().text();
        $('input[name="edit_masv"]').val(ma);
        $('input[name="edit_tensv"]').val(ten);
        $("#edit").val(id);
        $(this).addClass(id)
        $(document).on('click', '#edit', function (e) {
            // alert("sửa")
            var new_ma = $('input[name="edit_masv"]').val();
            var new_ten = $('input[name="edit_tensv"]').val();
            var id = $(this).val();
            $.ajax({
                url: window.location.pathname,
                type: "post",
                data: {
                    action: "editsv",
                    id: id,
                    masv: new_ma,
                    tensv: new_ten,
                },
                success: function (res) {
                    // alert("sửa")
                    if (res != 0) {
                        $("." + id).closest("td").prev().prev().text(new_ma);
                        $("." + id).closest("td").prev().text(new_ten);
                    }
                }
            });
        })

    });
    $(document).on('click', '.btnXoa', function (e) {
        var xoa = $(this);
        var id = xoa.val();
        // alert(id);
        $.ajax({
            url: window.location.pathname,
            type: "post",
            data: {
                action: "deletesv",
                id: id,
            },
            success: function (res) {
                if (res != 0) {
                    // alert("Xóa thành công")
                    $(xoa).closest("tr").remove();
                }
            }
        });

        // alert(vl);
    });
    $(document).on('click', '.close', function (e) {
        $('input[name="masv"]').val('');
        $('input[name="tensv"]').val('');
    });
});

