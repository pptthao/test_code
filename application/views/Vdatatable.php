<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datatable</title>
    <!-- bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="{$url}/public/new/bootstrap/css/bootstrap.min.css" />

    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="{$url}/public/new/DataTables/datatables.min.css" />
    <script type="text/javascript" src="{$url}/public/new/DataTables/datatables.min.js"></script>

    <!-- jQuery 3 -->
    <script type="text/javascript" src="{$url}public/new/jquery/jquery.min.js"></script>
    <!-- <script src="{$url}/custom/toastr.js"></script> -->
</head>
<style>
    .menu a {
        color: white;
    }

    a {
        text-decoration: none;
    }

    label {
        text-align: right;
        padding-top: 7px;
    }

    .dsmon>label {
        width: 100%;
        text-align: center;
        font-size: 18px;
    }

    .content {
        min-height: 250px;
        padding: 15px;
        margin-right: auto;
        margin-left: auto;
        padding-left: 15px;
        padding-right: 15px;
    }

    .box-body {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
        padding: 10px;
    }

    .btn {
        display: inline-block;
        padding: 6px 12px;
    }

    .form-inline {
        display: block;
    }

    table th {
        text-align: center;
    }

    .modal-header {
        display: block;
    }

    .btn-default {
        background-color: #f4f4f4;
        color: #444;
        border-color: #ddd;
    }
</style>

<body>
    <div class="menu">
        <label>Menu</label>
        <button class="btn btn-success "><a href="{$url}home">upload ảnh</a></button>
        <button class="btn btn-success"><a href="{$url}monctdt">xếp môn ctdt</a></button>
        <button class="btn btn-success"><a href="{$url}datatable">datatable</a></button>

    </div>
    <br><br><br>

    <div class="container-fluid">
        <div class="box-body">
            <div class="row">
                <div class="col-md-12 dssinhvien">
                    <label for="">Danh sách sinh viên</label>
                    <hr>
                    <div class="row">

                        <div class="col-md-7">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" id="insertsv">Thêm sinh viên mới</button>
                        </div>
                    </div>
                    <div class="table-ds">
                        <table id="example" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã sinh viên</th>
                                    <th>Họ tên</th>
                                    <th>Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody class="" id="dsmon">
                                {if (isset($sinhvien))}
                                {foreach $sinhvien as $key => $val}
                                <tr class="test">
                                    <td>{$key+1}</td>
                                    <td>{$val['masv']}</td>
                                    <td>{$val['tensv']}</td>
                                    <td><button type='button' value="{$val['id']}" name='sua' class="btn btn-primary btnSua {$val['id']}" data-toggle='modal' data-target='#modaledit' id="{$val['id']}">Sửa</button>&emsp;<button type='button' value="{$val['id']}" name='xoa' class='btn btn-danger btnXoa' id='' onclick="xacnhanxoa()">Xóa</button></td>
                                    </td>
                                </tr>
                                {/foreach}
                                {/if}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="gridSystemModalLabel" style="color:orange">Thêm sinh viên</h3>
                </div>
                <!-- <form method="post" enctype="multipart/form-data"> -->
                <div class="modal-body" style="background-color: #ddddde57">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Mã sinh viên</label>
                            <input type="text" name="masv" class="form-control" placeholder="Mã sinh viên..." required="">
                        </div>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="tensv" class="form-control" placeholder="Họ tên..." required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add" value="add" class="btn btn-success" id="addsv" data-dismiss="modal">Cập nhật</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" class="close">Đóng</button>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="modaledit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="gridSystemModalLabel" style="color:orange">Sửa thông tin</h3>
                </div>
                <!-- <form method="post" enctype="multipart/form-data"> -->
                <div class="modal-body" style="background-color: #ddddde57">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden" class="stt" value="">
                            <label>Mã sinh viên</label>
                            <input type="text" name="edit_masv" class="form-control" placeholder="Mã sinh viên..." required="">
                        </div>
                        <div class="form-group">
                            <label>Họ tên</label>
                            <input type="text" name="edit_tensv" class="form-control" placeholder="Họ tên..." required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add" value="add" class="btn btn-success" id="edit" data-dismiss="modal">Cập nhật</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" class="close">Đóng</button>
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
</body>
<script type="text/javascript" src="{$url}public/script/datatable.js"></script>
<script src="{$url}public/new/Datatables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
<script src="{$url}public/new/Datatables/DataTables-1.12.1/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="{$url}/public/new/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>

</html>