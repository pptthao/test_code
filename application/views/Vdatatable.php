<style>
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
<!-- <a href="{$url}monctdt">aaaaa</a> -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12 dsmon">
                        <label for="" class="control-label">Danh sách sinh viên</label>
                        <hr>
                        <div class="box box-warning">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">

                                    <div class="col-md-7">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal" id="insertsv">Thêm sinh viên mới</button>
                                    </div>
                                    <!-- <div class="col-md-5">
                                        <input id="myInput" type="text" placeholder="Tìm kiếm môn" class="form-control">
                                    </div> -->
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="cuon">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Ma sinh vien</th>
                                                <th>Ho ten</th>
                                                <th>Tac vu</th>
                                            </tr>
                                        </thead>
                                        <tbody class="" id="dsmon">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
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
<script type="text/javascript" src="{$url}public/script/datatable.js"></script>
<script src="{$url}public/datatable/js/jquery.dataTables.min.js"></script>
<script src="{$url}public/datatable/js/dataTables.bootstrap.min.js"></script>