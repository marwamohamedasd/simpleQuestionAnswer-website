@extends('layouts.index')
@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content')
    <div>
        <div class="wrap-cntaner">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Show questions</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>title:</strong>
                        {{ $question->title}}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>body:</strong>
                        {{ $question->description }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>answer:</strong>
                    @foreach ( $question->answers as  $answer )
                    {!!$answer->content!!}

                    @endforeach

                    </div>
                </div>
            </div>
            <form method="POST" action="{{ route('answers.store') }}">
                @csrf
                <div class="form-group">
                    <textarea class="form-control" name="content" id="summernote"></textarea>
                    <input type="hidden" name="question_id" id="" value="{{ $question->id }}">
                </div>
                <button type="submit" class="btn btn-danger btn-block">Save</button>
            </form>
        </div>
    </div>

@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 400
        });
    </script>
@endsection
