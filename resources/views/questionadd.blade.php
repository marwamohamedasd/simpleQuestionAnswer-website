@extends('layouts.app')


@section('style')
@endsection


@section('content')
 <!--Start Main  -->

 <div class="main container">





    <!--Start Main Body For Posts -->
    <div class="wrap-cntaner">

        <form action="{{ route('questions.store') }}" method="POST">
            @csrf
             <input type="hidden" name="user_id"  value="1">
             <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="titleS">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>body:</strong>
                        <textarea class="form-control" style="height:150px" name="description" placeholder="description"></textarea>
                    </div>
                </div>



                
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </div>

        </form>

    </div>
    <!--End Main Body For Posts -->

</div>
<!--End Main  -->
<!--Start Notification -->

<div class="notfication">
    <div class="">
        <h5><i class="far fa-comment-alt"></i> Notification</h5>
        <ul>
            <li>Mohammed Comment in Your Post</li>
            <li>Ali Comment in Your Post</li>
            <li>Your Comment has three votes</li>
            <li>You Make votes in Question</li>
            <li>Mohammed Comment in Your Post</li>
        </ul>
    </div>
</div>
<!--End Notification -->

<div class="clearFix"></div>

<!-- End Content -->
@endsection


@section('script')
@endsection
