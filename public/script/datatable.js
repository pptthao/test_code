$(document).ready(function () {
    function xacnhanxoa() {
        let text = "Bạn có chắc muốn xóa sinh viên này?";

        return confirm(text);
    }

    var t = $("#example").DataTable();
    $(document).on('click', '#addsv', function () {
        var masv = $('input[name="masv"]').val();
        var tensv = $('input[name="tensv"]').val();

        $.ajax({
            url: window.location.pathname,
            type: "post",
            data: {
                action: "addsv",
                masv: masv,
                tensv: tensv,
            },
            success: function (kq) {
                var res = JSON.parse(kq);
                if (res != 0) {
                    var data = [];
                    data = ({
                        "stt": res['count'],
                        "masv": masv,
                        "tensv": tensv,
                        "tacvu": "<button type='button' value='" + res['id'] + "' name='sua' class='btn btn-primary btnSua " + res['id'] + "' data-toggle='modal' data-target='#modaledit' id='" + res['id'] + "'>Sửa</button>&emsp;<button type='button' value='" + res['id'] + "' name='xoa' class='btn btn-danger btnXoa' id='' onclick= 'xacnhanxoa()'>Xóa</button></td>"

                    })
                    t.row.add([
                        (data["stt"]),
                        (data["masv"]),
                        (data["tensv"]),
                        (data["tacvu"])
                    ]).draw(false);

                }
            }
        });
    })

    $(document).on('click', '.btnSua', function (e) {
        var id = $(this).val();
        var stt = $(this).closest("td").prev().prev().prev().text();
        var ma = $(this).closest("td").prev().prev().text();
        var ten = $(this).closest("td").prev().text();

        $('input[name="edit_masv"]').val(ma);
        $('input[name="edit_tensv"]').val(ten);
        $("#edit").val(id);
        $(".stt").val(stt);

        $(document).on('click', '#edit', function (e) {
            var new_ma = $('input[name="edit_masv"]').val();
            var new_ten = $('input[name="edit_tensv"]').val();
            var id = $(this).val();
            var i = $(".stt").val(); // số thứ tự

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
                    var data = [];

                    data = ({
                        "stt": i,
                        "masv": new_ma,
                        "tensv": new_ten,
                        "tacvu": "<button type='button' value='" + res['id'] + "' name='sua' class='btn btn-primary btnSua " + stt + "' data-toggle='modal' data-target='#modaledit' id='" + stt + "'>Sửa</button>&emsp;<button type='button' value='" + res['id'] + "' name='xoa' class='btn btn-danger btnXoa' id='' onclick= 'xacnhanxoa()'>Xóa</button></td>"

                    })
                    var index = i - 1;
                    var temp = t.row(index).data();
                    temp[0] = data["stt"];
                    temp[1] = data["masv"];
                    temp[2] = data["tensv"];
                    temp[3] = data["tacvu"];
                    t.row(index).data(temp).draw();
                }
            });
        })
    })


    $(document).on('click', '.btnXoa', function (e) {
        if (xacnhanxoa() == true) {
            var stt = $(this).closest("td").prev().prev().prev().text();
            var id =  $(this).val();

            $.ajax({
                url: window.location.pathname,
                type: "post",
                data: {
                    action: "deletesv",
                    id: id,
                },
                success: function (res) {
                    if (res != 0) {
                        t.row(stt - 1).remove().draw(false);

                    }
                }
            });
        }
    });

    $(document).on('click', '.close', function (e) {
        $('input[name="masv"]').val('');
        $('input[name="tensv"]').val('');
    });
});
