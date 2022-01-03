@extends('layouts.frontend-layout')
@section('title','User Review')
@section('content')
    <div class="body-content">
        <div class="container user-dashboard">
            <div class="row">
                @include('user.inc.sideNav')
                <div class="col-sm-9" style="margin-top: 100px;">
                    <div class="product-add-review">
                        <h4 class="title">Write your own review</h4>
                        <form role="form" class="cnt-form" method="POST" action="{{route('user.review.store')}}">
                            @csrf
                            <div class="review-table">
                                <div class="table-responsive">
                                    <table class="table">	
                                        <thead>
                                            <tr>
                                                <th class="cell-label">&nbsp;</th>
                                                <th>1 Star</th>
                                                <th>2 Stars</th>
                                                <th>3 Stars</th>
                                                <th>4 Stars</th>
                                                <th>5 Stars</th>
                                            </tr>
                                        </thead>	
                                        <tbody>
                                            <tr>
                                                <td class="cell-label">Rating</td>
                                                <td><input type="radio" name="rating" class="radio" value="1"></td>
                                                <td><input type="radio" name="rating" class="radio" value="2"></td>
                                                <td><input type="radio" name="rating" class="radio" value="3"></td>
                                                <td><input type="radio" name="rating" class="radio" value="4"></td>
                                                <td><input type="radio" name="rating" class="radio" value="5"></td>
                                            </tr>
                                        </tbody>
                                    </table><!-- /.table .table-bordered -->
                                </div><!-- /.table-responsive -->
                            </div><!-- /.review-table -->
                            
                            <div class="review-form">
                                <div class="form-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" name="product_id" value="{{$productId}}">
                                                <label for="comment">Comment <span class="astk">*</span></label>
                                                <textarea class="form-control txt txt-review" id="comment" rows="4" placeholder="Write Your Valueable Comment" name="comment"></textarea>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div><!-- /.row -->
                                    
                                    <div class="action text-right">
                                        <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                    </div><!-- /.action -->
                        
                                </div><!-- /.form-container -->
                            </div><!-- /.review-form -->
                        </form>
                    </div><!-- /.product-add-review -->	
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        @if (session()->has('success'))
            Swal.fire({
                icon:'success'
                text:"{{session('success')}}"
            })
        @endif
        @if (session()->has('error'))
            Swal.fire({
                icon:'success'
                text:"{{session('error')}}"
            })
        @endif
    </script>
@endsection
