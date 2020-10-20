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
<a href="{{route('clients.controls',['id' => AUTH::user()->id])}}"><i class="fa fa-cog text-info"></i></a>
</div>

<h2>Setup Required</h2>
  <p>Please use the 'Clog' icon to setup the users.</p>
@endif
@if($count >= 1)
@foreach($controls as $c)

@if($c->assays_admin == "on")
<div class="row justify-content-end">
  <a href="{{route('assays.controls',['id' => AUTH::user()->id])}}"><i class="fa fa-cog text-info"></i></a>
  </div>
@endif



    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" href="{{route('assays')}}" role="tab" aria-controls="list" aria-selected="true">List</a>
        </li>
        @if($c->assays_add == "on")
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
                    
                    @if($c->assays_view == "on")
                    <table class="table">
                        <thead>
                           
                            <th>
                                Status
                            </th>
                            
                          
                        </thead>
                        <tbody>
                        @foreach( $assays as $assays)
                        <tr>
                        <td><a href="{{ route('assays.view',[$assays->assay_id]) }}" >{{$assay->name}}</a></td>
                        
                        <td>{{$assay->status}}</td>
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

@if($c->clients_add == "on")
<!-- NEW CLIENT MODAL -->  
<div class="modal fade" id="newclient" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header card-header">
                <h5 class="modal-title" id="exampleModalLongTitle">New Client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="col-md-12" action="{{ route('clients.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')  
                <div class="modal-body">
                    <div class="form-group">
                                <h5>Company</h5>
                                <input type="text" name="name" class="form-control" placeholder="Company" required>
                                </div>

                                
                                        <h5>Address Info</h5>
                                        
                                    
                                            <div class="form-group">
                                            @if ($c->address == '')
                                            <span class="badge badge-pill bg-danger">&nbsp;</span>
                                            @endif
                                            <input type="text" name="address" class="form-control" placeholder="Address" >
                                            </div>
                                                <div class="form-group">
                                                @if ($c->town == '')
                                                <span class="badge badge-pill bg-danger">&nbsp;</span>
                                                @endif
                                                <input type="text" name="town" class="form-control" placeholder="Town" >
                                                </div>
                                                    <div class="form-group">
                                                    @if ($c->county == '')
                                                    <span class="badge badge-pill bg-danger">&nbsp;</span>
                                                    @endif
                                                    <input type="text" name="county" class="form-control" placeholder="County">
                                                    </div>
                                                        <div class="form-group">
                                                        @if ($c->postcode == '')
                                                        <span class="badge badge-pill bg-danger">&nbsp;</span>
                                                        @endif
                                                        <input type="text" name="postcode" class="form-control" placeholder="Postcode">
                                                        </div>
                                                            <div class="form-group">
                                                            @if ($c->country == '')
                                                            <span class="badge badge-pill bg-danger">&nbsp;</span>
                                                            @endif
                                                            <input type="text" name="country" class="form-control" placeholder="Country" >
                                                            </div>
                                
                        
                                
                                        <h5>Tax Info</h5>
                                        
                                            <div class="form-group">
                                            <input type="text" name="tax_no" class="form-control" placeholder="Tax ID" >
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