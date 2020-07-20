@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới thuộc tính</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ route('admin.attribute.index')}}"> Attribute</a></li>
            <li class="active"> Create</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                   	<form role="form" action="" method="POST">
                  		@csrf				                   		
                   		<div class="col-md-8">                			
					        <div class="form-group {{ $errors->first('atb_name') ? 'has-error' : ''}}">
					            <label for="name">Tên<span class="text-danger">(*)</span></label>
					            <input type="text" class="form-control" name="atb_name" placeholder="Name ...">	
					            @if ($errors->first('atb_name'))
					            	<span class="text-danger">{{ $errors->first('atb_name')}}</span>
					            @endif		        
    					<!-- /.box-body -->
                   		</div>
                    </div>
                		<div class="col-md-8">
                            <div class="form-group {{ $errors->first('atb_type') ? 'has-error' : ''}}">
                                <label for="name">Nhóm<span class="text-danger">(*)</span></label>
                                    <select class="form-control" name='atb_type'>
                                        <option value="1">Mùi vị</option>
                                        <option value="2">Năng lượng</option>
                                        <option value="3">Khả năng hấp thụ</option>
                                        <option value="4">Giảm mỡ</option>
                                    </select> 
                                    @if ($errors->first('atb_type'))
                                        <span class="text-danger">{{ $errors->first('atb_type')}}</span>
                                    @endif
                            </div>     
                        </div>
                        <div class="col-md-8">
                            <div class="form-group {{ $errors->first('atb_category_id') ? 'has-error' : ''}}">
                                <label for="name">Danh mục<span class="text-danger">(*)</span></label>
                                <select class="form-control" name="atb_category_id">
                                    
                                        <option value="1">Sữa Tăng Cân</option>
                                        <option value="2">Whey Protein</option>
                                        <option value="3">BCAA</option>
                                        <option value="4">Vitamin, Dầu Cá</option>
                                        <option value="5">Giảm Mỡ</option>
                                    
                                </select> 
                                    @if ($errors->first('atb_category_id'))
                                        <span class="text-danger">{{ $errors->first('atb_category_id')}}</span>
                                    @endif
                            </div>     
                        </div>
         				<div class="col-md-12">
         					<div class="box-footer text-center" style="margin-top: 20px">
							    <a href="{{ route('admin.attribute.index')}}"  class="class btn btn-danger">Quay lại <i class="fa fa-undo"></i></a>
							    <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
							</div>
         				</div>
					</form>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->

@stop