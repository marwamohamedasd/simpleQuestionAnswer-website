@extends('layouts.index')
@section('content')
    <div>
        <div class="wrap-cntaner">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>over stack flow</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('questions.create') }}"> Create New question</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>title</th>
                    <th>body</th>
                    <th>viwes</th>
                    <th>answers</th>
                    <th>votes</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $question->title }}</td>
                        <td>{{ $product->body }}</td>
                        <td>{{ $product->answers }}</td>
                        <td>{{ $product->viwes }}</td>
                        <td>{{ $product->votes }}</td>
                        <td>
                            <form action="{{ route('questions.destroy',$question->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('questions.show',$question->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('questions.edit',$question->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $questions->links() !!}
        </div>
    </div>


@endsection
