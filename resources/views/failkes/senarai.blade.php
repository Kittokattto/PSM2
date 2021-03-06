@extends('layouts.main')

@section('title')
<div class="card-header" style="margin-left: 8px;" ><h3>Senarai Fail Kes</h3></div>
@endsection
@section('content')





<!-- page content -->
	<div class="right_col" role="main">
        <div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
    <!-- Modal content-->
				<div class="modal-content modal_data">
				</div>
			</div>
        </div>
		
		<!-- Modal for Coupon Data -->
			<div class="modal fade" id="coupaon_data" role="dialog">
				<div class="modal-dialog modal-lg">
					<div class="modal-content used_coupn_modal_data">
						
					</div>
				</div>
			</div>
		<!-- End Modal for Coupon Data -->
        <div class="">
			@if(session('message'))
				<div class="row massage">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="checkbox checkbox-success checkbox-circle">
							@if(session('message') == 'Successfully Submitted')
							<label for="checkbox-10 colo_success"> {{trans('Successfully Submitted')}}  </label>
						   @elseif(session('message')=='Successfully Updated')
						   <label for="checkbox-10 colo_success"> {{ trans('app.Successfully Updated')}}  </label>
						   @elseif(session('message')=='Successfully Deleted')
						   <label for="checkbox-10 colo_success"> {{ trans('app.Successfully Deleted')}}  </label>
						   @endif
						</div>
					</div>
				</div>
			@endif
			<div class="row" >
				<div class="col-md-12 col-sm-12 col-xs-12" >
					<div class="x_content" style="background-color: black; color:white; length:100%; border-radius:5px;">
						<ul class="nav nav-tabs bar_tabs" role="tablist">

                            <li role="presentation" class="active"><a href="{!! url('/failkes/senarai')!!}"> <span class="visible-xs"></span><i class="fa"></i><b>Senarai Fail Kes</b> </a></li>
                            <li role="presentation" class=""><a href="{!! url('/failkes/tambah')!!}"><span class="visible-xs"></span><i class="fa">&nbsp;</i><b>Tambah Fail Kes</b></a></li>

						</ul>
					</div>
					<div class="table-wrapper">
						<table class="fl-table" style="margin-top:40px;">
							<thead>
								<tr>
									<th>#</th>

									<th>{{ trans('No. Hakmilik')}}</th>
									<th>{{ trans('Jenis Hakmilik')}}</th>
									<th>{{ trans('Pemilik')}}</th>
                                    <th>{{ trans('Bandar/Pekan/Mukim')}}</th>
                                    <th>{{ trans('Tempat')}}</th>
									<th>{{ trans('No.Lot')}}</th> 
									<th>{{ trans('No.Lembaran')}}</th>
									<th>{{ trans('No.Pelan Diperakui')}}</th>
                                    <th>{{ trans('Pemilik')}}</th>
									<th>{{ trans('Luas Lot')}}</th>
								</tr>
							</thead>
							<tbody>
                                @if(!empty($user))
							<?php $i=1;?> 
								@foreach($user as $users)
									<tr>
										<td>{{ $i }}</td>
										<td>{{ $users->name}}</td>
										<td>{{ $users->phone}}</td>
                                        <td>{{ $users->email}}</td>
                                        <td>{{ $users->address}}</td>
                                        <td>{{ $users->department}}</td>
                                        <td>{{ $users->department}}</td>
                                        <td>{{ $users->created_at}}</td>

									</tr>
									<?php $i++; ?>
									@endforeach
								@endif
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>  


@endsection
