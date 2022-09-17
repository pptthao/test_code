<style>
    label {
        text-align: right;
        padding-top: 7px;
    }

    .luachon {
        padding-left: 0px;
    }

    .cangiua {
        padding-top: 10%;
    }

    .dsmon>label {
        width: 100%;
        text-align: center;
        font-size: 18px;
    }

    .cuon {
        overflow: scroll;
        max-height: 470px;
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
</style>
<!-- <a href="{$url}monctdt">aaaaa</a> -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-5 dsmon">
                        <label for="" class="control-label">Danh sách môn học</label>
                        <hr>
                        <div class="box box-warning">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">

                                    <div class="col-md-7">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#excel">Thêm môn học mới</button>
                                    </div>
                                    <div class="col-md-5">
                                        <input id="myInput" type="text" placeholder="Tìm kiếm môn" class="form-control">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="cuon">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAll"></th>
                                                <th>STT</th>
                                                <th>Tên môn</th>
                                                <th>Khối lượng</th>
                                                <th>ĐVT</th>
                                            </tr>
                                        </thead>
                                        <tbody class="" id="dsmon">
                                            <tr>
                                                <td><input type="checkbox" class="check" ></td>
                                                <td>Lập trình cơ sở</td>
                                                <td>3</td>
                                                <td>TC</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" class="check"></td>
                                                <td>Lập trình java</td>
                                                <td>3</td>
                                                <td>TC</td>
                                            </tr>
                                            <tr>
                                                <td><input type="checkbox" class="check"></td>
                                                <td>Lập trình android</td>
                                                <td>3</td>
                                                <td>TC</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-2 cangiua">
                        <center>
                            <button type="button" class="btn btn-info" id="xepmon">=></button>
                            <br>
                            <br>
                            <button type="button" class="btn btn-info" id="quaylai"><=</button>
                            <br>
                            <br><br><br>
                            <button type="button" class="btn btn-success" id="luumon">
                                <span class="glyphicon glyphicon-ok">&nbsp;Lưu</span>
                            </button>
                            <!-- <button type="button" class="btn btn-warning" style="margin-top: 10px" onclick="window.history.back();"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại trang trước</button> -->
                        </center>
                    </div>
                    <div class="col-md-5 dsmon">
                        <label for="">Danh sách môn CTĐT ngoài trường</label>
                        <hr>
                        <div class="box box-danger">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-xs-5 col-xs-push-7">
                                    <input id="inputctdt" type="text" placeholder="Tìm kiếm môn CTĐT" class="form-control">
                                </div>
                                <div class="clearfix"></div>
                                <br>
                                <div class="cuon">
                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAllctdt"></th>
                                                <th>STT</th>
                                                <th>Tên môn</th>
                                                <th>Khối lượng</th>
                                                <th>ĐVT</th>
                                            </tr>
                                        </thead>
                                        <tbody id="monctdt">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<script type="text/javascript" src="{$url}public/script/monctdt.js"></script>
<script src="{$url}public/datatable/js/jquery.dataTables.min.js"></script>
<script src="{$url}public/datatable/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">

// $(function() {
//     $('#example2').DataTable({
//         'paging': false,
//         'lengthChange': false,
//         'searching': false,
//         'ordering': false,
//         'info': false,
//         'autoWidth': false
//     });

// })
</script>