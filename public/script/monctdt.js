
$(document).ready(function () {

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

    //lưu dữ liệu
    $(document).on('click', '#luumon', function(e){
        var matruong = $('#truong').val();
        var matrinhdo = $('#trinhdo').val();
        var manganh = $('#nganh').val();
        var namhoc = $('#namhoc').val();
        var mamon ='';
        var flag = 0;
        if($('#monctdt .checkctdt').length >= 1){
            flag = 1;
        }
        // alert(flag)
        //lấy danh sách môn ctdt
        $('#monctdt .checkctdt').each(function(index, el){
            mamon += $(this).val() + ',';
        });
        // alert(mamon)

        //lấy dữ liệu ctdt
        if(matruong =='' || matrinhdo == '' || manganh == '' || namhoc == ''){
            alert('chưa chọn ddue thông tin');
        }else if(mamon == '' && flag == 0){
            alert('Phải chọn ít nhất 1 môn');
        }else{
            $.ajax({
                url: window.location.pathname,
                type: "post",
                data: {
                    action: "luuctdt",
                    matruong: matruong,
                    matrinhdo: matrinhdo,
                    manganh: manganh,
                    mamon: mamon,
                    namhoc: namhoc
                },
                success: function (res) {
                    var kq = JSON.parse(res);
                    console.log(kq);
                }
            })
        }
    })
    //tìm kiếm
    $("#inputSearch").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#dsmon tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    $("#inputSearchctdt").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#monctdt tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


    // var t = $("#example2").DataTable();
    $(document).on('click', '#addmon', function () {
        tenmon = $('input[name="tenmon"]').val();
        khoiluong = $('select[name="khoiluong"]').val();
        donvitinh = $('select[name="donvitinh"]').val();

        $.ajax({
            url: window.location.pathname,
            type: "post",
            data: {
                action: "addmon",
                tenmon: tenmon,
                khoiluong: khoiluong,
                donvitinh: donvitinh
            },
            success: function (res) {
                gt = JSON.parse(res);
                if (gt != null) {
                    dem = $('.rowdmmon').length + 1;
                    var table2 = '';
                    table2 += '<tr class="rowdmmon" role="row">';
                    table2 += '<td><input type="checkbox" class="check" value="' + gt['mamon'] + '"' + '></td>';
                    table2 += '<td>' + dem + '</td>';
                    table2 += '<td>' + gt['tenmon'] + '</td>';
                    table2 += '<td>' + gt['khoiluong'] + '</td>';
                    table2 += '<td>' + gt['donvitinh'] + '</td>';
                    table2 += '</tr>';
                    console.log(table2);
                    $(table2).appendTo('#dsmon');
                }
            }
        });
    });
})
