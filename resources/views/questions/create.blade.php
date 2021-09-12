@extends('layouts.index')
@section('content')
    <div>
        <div class="wrap-cntaner">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Add New question</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('home') }}"> Back</a>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id"  value="1">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>title:</strong>
                            <input type="text" name="title" class="form-control" placeholder="titleS" value="{{old('title')}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>body:</strong>
                            <textarea class="form-control" style="height:150px" name="description" placeholder="body">{{old('description')}}</textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">

                            <strong>Add Tag:</strong>
                            <select class="form-control " multiple
                            name="tags[]" >

                                @foreach ( $tags as $tag)
                                   <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>

                    </div>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@endsection
