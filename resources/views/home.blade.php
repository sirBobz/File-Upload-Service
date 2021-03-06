@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="card col-md-12 col-sm-12 col-xs-12">
         <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
               <button type="button" class="close" data-dismiss="alert">×</button>
               <strong>{{ $message }}</strong>
            </div>
            @endif
            @if (count($errors) > 0)
            <div class="alert alert-danger">
               <strong>Whoops!</strong> There were some problems with your input.<br><br>
               <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif

            @if ($message = Session::get('errorbulk'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('errorbulk') }}
                </div>
            @endif

         </div>
         <!-- Trigger the modal with a button -->
          <a class="btn btn-success btn-xs col-md-1 col-sm-1 col-xs-1" data-toggle="modal" data-target="#myModal"> File upload</a>
           <br>
             <div class="table-responsive">
                <table id="data" class="table table-striped table no-margin">
                    <thead>
                        <tr class="success">
                            <th class="text-center"> ID </th>
                            <th class="text-center"> Amount </th>
                            <th class="text-center"> Phone Number</th>
                            <th class="text-center"> Request ID </th>
                            <th class="text-center"> Message </th>
                            <th class="text-center"> Status </th>
                            <th class="text-center"> Date </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--  Initialize Table ID counter -->
                        @php $id = 1; @endphp @foreach($transactions as $data)
                        <tr>
                            <td class="text-center"> {{$id ++}} </td>
                            <td class="text-center"> {{$data->amount}}</td>
                            <td class="text-center"> {{$data->phone_number}}</td>
                            <td class="text-center"> {{$data->third_party_trans_id}}</td>
                            <td class="text-center"> {{$data->message}}</td>
                            <td class="text-center"> {{$data->result_desc}}</td>
                            <td class="text-center"> {{$data->updated_at}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <!-- /.table-responsive -->
       </div>

      </div>
   </div>

</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">

            <form action="{{ url('uploadfile') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-group ">
                  <input type="file" class="form-control-file" name="file"  title="Please upload a CSV file" accept=".csv" id="uploadInputFile" aria-describedby="fileHelp" required="required">
                  <small id="fileHelp" class="form-text text-muted">Please upload a valid CSV file. Headers; phone amount</small>
               </div>
               <hr>
               <br>
               <button type="submit" class="btn btn-sm btn-primary pull-right">Submit</button>
            </form>

      </div>
    </div>

  </div>
</div>
@endsection