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
    .select2{
        
        border: 1px solid #aaa;
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

                    <div class="form-group col-xs-12">
                        <div class="col-xs-3">
                            <label class="control-label col-xs-3">Trường</label>
                            <div class="col-xs-9 luachon">
                                <select class="form-control select2" style="width: 100%;" id="truong">
                                    <option value="">---Chọn trường---</option>
                                    <option value="1000" {if !empty($ctdt) && $ctdt[0]['matruong']=='1000'}selected{/if}>Trường Bách Khoa</option>
                                    <option value="1001"{if !empty($ctdt) && $ctdt[0]['matruong']=='1001'}selected{/if}>Trường Kinh Tế Quốc Dân</option>
                                    <option value="1002" {if !empty($ctdt) && $ctdt[0]['matruong']=='1002'}selected{/if}>Trường Xây Dựng</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <label class="control-label col-xs-4">Trình độ</label>
                            <div class="col-xs-8 luachon">
                                <select class="form-control select2" style="width: 100%;" id="trinhdo">
                                    <option value="">---Chọn trình độ---</option>
                                    <option value="7">Đại Học</option>
                                    <option value="8">Thạc sĩ</option>
                                    <option value="9">Tiến Sĩ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <label class="control-label col-xs-4">Năm học</label>
                            <div class="col-xs-8 luachon">
                                <select class="form-control select2" style="width: 100%;" id="namhoc">
                                    <option value="">---Năm---</option>
                                    {$namhoc = 2000}
                                    {$namht = date('Y')}
                                    {while $namhoc <= $namht} <option value="{$namhoc}">{$namhoc}</option>
                                        {$namhoc++}
                                        {/while}
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <label class="control-label col-xs-4">Ngành</label>
                            <div class="col-xs-8 luachon">
                                <select class="form-control select2" style="width: 100%;" id="nganh">
                                    <option value="">---Chọn ngành---</option>
                                    <option value="Anninhmng44">An ninh mạng</option>
                                    <option value="Bcsakhoa18">Bác sĩ đa khoa</option>
                                    <option value="Bngchuyn25">Bóng chuyền</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br><br>
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
                                        <input id="inputSearch" type="text" placeholder="Tìm kiếm môn" class="form-control">
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
                                            {foreach $monhoc as $k => $v}
                                            <tr>
                                                <td><input type="checkbox" class="check" value="{$v['mamon']}"></td>
                                                <td>{$k+1}</td>
                                                <td>{$v['tenmon']}</td>
                                                <td>{$v['khoiluong']}</td>
                                                <td>{$v['donvitinh']}</td>
                                            </tr>
                                            {/foreach}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-2 cangiua">
                        <center>
                            <button type="button" class="btn btn-info" id="xepmon"><span class="glyphicon glyphicon-arrow-right"></span></button>
                            <br>
                            <br>
                            <button type="button" class="btn btn-info" id="quaylai"><span class="glyphicon glyphicon-arrow-left"></span></button>
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
                                    <input id="inputSearchctdt" type="text" placeholder="Tìm kiếm môn CTĐT" class="form-control">
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
                                            {if !empty($monctdt)}
                                            {foreach $monctdt as $k => $v}
                                            <tr>
                                                <td><input type="checkbox" class="checkctdt" value="{$v['mamon']}"></td>
                                                <td>{$k+1}</td>
                                                <td>{$v['tenmon']}</td>
                                                <td>{$v['khoiluong']}</td>
                                                <td>{$v['donvitinh']}</td>
                                            </tr>
                                            {/foreach}
                                            {/if}
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

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" id="excel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="gridSystemModalLabel" style="color:orange">Thêm môn</h3>
            </div>
            <div class="modal-body" style="background-color: #ddddde57">
                <div class="box-body">
                    <!--  <div class="form-group">
                            <label>Mã môn</label>
                            <input type="text" name="mamon"  class="form-control" placeholder="Mã môn..." required="">
                          </div> -->
                    <div class="form-group">
                        <label>Tên môn</label>
                        <input type="text" name="tenmon" class="form-control" placeholder="Tên môn..." required="">
                    </div>
                    <div class="form-group">
                        <label>Khối lượng</label>
                        <select class="form-control" name="khoiluong" required="">
                            {for $i=1 to 60}
                            <option value="{$i}">{$i}</option>
                            {/for}
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Đơn vị tính</label>
                        <select class="form-control" name="donvitinh" required="">
                            <option value="TC">TC</option>
                            <option value="ĐVHT">ĐVHT</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="add" value="add" class="btn btn-success" id="addmon" data-dismiss="modal">Thêm môn</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{$url}public/script/monctdt.js"></script>
<script src="{$url}public/datatable/js/jquery.dataTables.min.js"></script>
<script src="{$url}public/datatable/js/dataTables.bootstrap.min.js"></script>
<script src="{$url}public/select2/dist/js/select2.full.min.js"></script>
<script type="text/javascript">
    $('.select2').select2();
    $(function() {
        $('#example2').DataTable({
            'paging': false,
            'lengthChange': false,
            'searching': false,
            'ordering': false,
            'info': false,
            'autoWidth': false
        });

    })
</script>