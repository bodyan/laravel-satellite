@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign in</h3>
                </div>
                <div class="panel-body">
                    <form action=" {{ route('import.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-group">
                                <label for="satellite">Choose <span class="font-weight-bold" >sat.xml</span></label>
                                <input type="file" class="form-control-file" id="satellite" aria-describedby="fileHelp" name="satellites" required>
                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="form-group">
                                <label for="channel">Choose <span class="font-weight-bold">tv_prog.xml</span></label>
                                <input type="file" class="form-control-file" id="channel" aria-describedby="fileHelp" name="channels" required>
                                <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                        </div> 
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection