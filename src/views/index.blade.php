@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
    {{ session('status') }}
    </div>
    @endif


@if($count == 0)
<div class="row justify-content-end">
<a href="{{route('assays.controls',['id' => AUTH::user()->id])}}"><i class="fa fa-cog text-info"></i></a>
</div>

<h2>Setup Required</h2>
  <p>Please use the 'Clog' icon to setup the users.</p>
@endif
@if($count >= 1)
@foreach($controls as $c)

@if($c->assay_admin == "on")
<div class="row justify-content-end">
  <a href="{{route('assays.controls',['id' => AUTH::user()->id])}}"><i class="fa fa-cog text-info"></i></a>
  </div>
@endif



    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" href="{{route('assays')}}" role="tab" aria-controls="list" aria-selected="true">List</a>
        </li>
        @if($c->assay_add == "on")
        <li class="nav-item">
        <a class="nav-link" id="new-tab" href="#" data-toggle="modal" data-target="#newclient" role="tab" aria-controls="new" aria-selected="true">New Assay</a>
        </li>
        @endif
        

      </ul>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>{{ __('Assays') }}</h3></div>

                <div class="card-body">
                    
                    @if($c->assay_view == "on")
                    <table class="table">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Barcode
                            </th>
                            <th>
                                Lot No.
                            </th>
                            <th>
                                Manufactured Date
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Actions
                            </th>
                        </thead>
                        <tbody>
                        @foreach( $assays as $as)
                        <tr>
                        <td><a href="{{ route('assays.view',[$as->assay_id]) }}" >{{$as->assay_name}}</a></td>
                        <td>{{$as->assay_barcode}}</td>
                        <td>{{$as->assay_lot_no}}</td>
                        <td>{{date('d/m/y', strtotime($as->assay_manufactured_date))}}</td>
                        <td>{{$as->assay_status}}</td>
                        <td>
                        <button class="btn btn-sm btn-outline-warning fa fa-edit"></button>
                        <button class="btn btn-sm btn-outline-danger fa fa-trash"></button>
                        </tr>
                         @endforeach
                </tbody>
                    </table>
                    {{ $assays->links() }}
                    @else
                    <p>Sorry, you don't have the access level required to view.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if($c->assay_add == "on")
<!-- NEW CLIENT MODAL -->  
<div class="modal fade" id="newclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h4 class="modal-title" id="exampleModalLongTitle">New Assay</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="col-md-12" action="{{ route('assays.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  
                <div class="modal-body">
                    <div class="form-group">
                    <h5>Name</h5>
                    <input type="text" name="name" class="form-control" placeholder="Assay Name" required>
                    </div>

                    <div class="form-group">
                    <h5>Barcode</h5>
                    <input type="text" name="barcode" class="form-control" placeholder="Barcode" value="">
                    </div>

                    <div class="form-group">
                    <h5>Lot Number</h5>
                    <input type="text" name="assay_lot_no" class="form-control" placeholder="Assay Lot Number" required>
                    </div>

                    <div class="form-group">
                    <h5>Manufactured Date</h5>
                    <input type="text" name="manufactured_date" class="form-control" placeholder="Assay Manufactured Date" required>
                    </div>

                                
                                        
                            
                                        
                                        
                    </div>
                            
                        <div class="modal-footer card-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    
                </div>
        </div>
    </div>
<!-- END -->
@endif

@endforeach
@endif
@endsection

@push('scripts')
   
@endpush