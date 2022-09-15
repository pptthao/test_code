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
                        "tacvu": "<button type='button' value='" + kq[i]['masv'] + "' name='sua' class='btn btn-primary btnSua " + kq[i]['masv'] + "' data-toggle='modal' data-target='#modaledit' id='" + kq[i]['masv'] + "'>Sửa</button>&emsp;<button type='button' value='" + kq[i]['masv'] + "' name='xoa' class='btn btn-danger btnXoa' id=''>Xóa</button></td>"

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
                if (res != 0) {
                    var table2 = '';
                    table2 += '<tr class="odd" role="row">';
                    table2 += '<td>' + dem + '</td>';
                    table2 += '<td>' + masv + '</td>';
                    table2 += '<td>' + tensv + '</td>';
                    table2 += '<td><button type="button" value="' + masv + '" name="sua" class="btn btn-primary btnSua ' + masv + '" data-toggle="modal" data-target="#modaledit" id="' + masv + '">Sửa</button>&emsp;<button type="button" value="' + masv + '" name="xoa" class="btn btn-danger btnXoa" id="">Xóa</button></td>';
                    table2 += '</tr>';
                    // console.log(table2);
                    $(table2).appendTo('#dsmon');
                }
            }
        });
    });
    $(document).on('click', '.btnSua', function (e) {
        var ma = $(this).closest("td").prev().prev().text();
        var ten = $(this).closest("td").prev().text();
        $('input[name="edit_masv"]').val(ma);
        $('input[name="edit_tensv"]').val(ten);
        $("#edit").val(ma);
        $(this).addClass(ma)
        $(document).on('click', '#edit', function (e) {
            // alert("sửa")
            var new_ma = $('input[name="edit_masv"]').val();
            var new_ten = $('input[name="edit_tensv"]').val();
            var old_ma = $(this).val();
            $.ajax({
                url: window.location.pathname,
                type: "post",
                data: {
                    action: "editsv",
                    old_ma: old_ma,
                    masv: new_ma,
                    tensv: new_ten,
                },
                success: function (res) {
                    // alert("sửa")
                    if (res != 0) {
                        $("." + old_ma).closest("td").prev().prev().text(new_ma);
                        $("." + old_ma).closest("td").prev().text(new_ten);
                    }
                }
            });
        })

    });
    $(document).on('click', '.btnXoa', function (e) {
        var xoa = $(this);
        var ma = xoa.closest("td").prev().prev().text();
        // alert(ma);
        $.ajax({
            url: window.location.pathname,
            type: "post",
            data: {
                action: "deletesv",
                masv: ma,
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

