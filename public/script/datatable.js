$(document).ready(function () {
    var table;
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

                var data = [];
                $.each(kq, function (i) {
                    data.push({
                        "stt": i + 1,
                        "masv": kq[i]['masv'],
                        "tensv": kq[i]['tensv'],
                        "tacvu": "<button type='button' value='" + kq[i]['id'] + "' name='sua' class='btn btn-primary btnSua " + kq[i]['id'] + "' data-toggle='modal' data-target='#modaledit' id='" + kq[i]['id'] + "'>Sửa</button>&emsp;<button type='button' value='" + kq[i]['id'] + "' name='xoa' class='btn btn-danger btnXoa' id='' onclick= 'xacnhanxoa()'>Xóa</button></td>"

                    })
                })
                hiendata(data);
            }
        });
    }
    function hiendata(data){
        table = $("#example2").DataTable({
            "processing": true,
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
    $(document).on('click', '#addsv', function (e) {
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
                    var obj ={"stt":data["stt"] ,"masv":data["masv"],"tensv":data["tensv"],"tacvu":data["tacvu"]};
                    $("#example2").DataTable().row.add(obj).draw();

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
    function xacnhanxoa() {
        let text = "Bạn có chắc muốn xóa sinh viên này?";

        return confirm(text);
    }

    $(document).on('click', '.btnXoa', function (e) {
        if (xacnhanxoa() == true) {
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
        }
    });

    $(document).on('click', '.close', function (e) {
        $('input[name="masv"]').val('');
        $('input[name="tensv"]').val('');
    });
});

