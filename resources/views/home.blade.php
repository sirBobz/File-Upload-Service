@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="card col-md-12 col-sm-12 col-xs-12">
         <div class="card-header">Upload File</div>
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
            <form action="{{ url('uploadfile') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="form-group ">
                  <input type="file" class="form-control-file" name="file"  title="Please upload a CSV file" accept=".csv" id="uploadInputFile" aria-describedby="fileHelp">
                  <small id="fileHelp" class="form-text text-muted">Please upload a valid CSV file. Headers; phone amount</small>
               </div>
               <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>
         </div>
         <br>
         <br>
         <br>
         <hr>
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box">
                    <div class="box-header">
                        <h5 class="box-title">File Preview</h5>

                        <div class="box-body">
                            <div class="table-responsive" id="table-container">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>
   </div>

</div>
@endsection