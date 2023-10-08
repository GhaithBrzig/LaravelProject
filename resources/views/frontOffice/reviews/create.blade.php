@extends('frontOffice.frontoffice_layout')

@section('frontoffice')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css” />

    <style>
        a {
            color: #231F40;
            text-decoration: none;
            outline: none;
        }

        a:hover,
        a:focus,
        a:active {
            text-decoration: none;
            outline: none;
            color: #525FE1;
        }

        a:focus {
            outline: none;
        }

        address {
            margin: 0 0 24px;
        }

        abbr[title] {
            border-bottom: 1px dotted;
        }

        b,
        strong {
            font-weight: bold;
        }

        p {
            font-size: 16px;
            line-height: 1.63;
            font-weight: 500;
            color: #6F6B80;
            margin: 0 0 30px;
        }

        h5,
        .h5 {
            font-weight: 700;
        }

        .mt--40 {
            margin-top: 40px !important;
        }

        .mb--20 {
            margin-bottom: 20px !important;
        }

        .pt--40 {
            padding-top: 40px !important;
        }

        .mb--25 {
            margin-bottom: 25px !important;
        }

        .first_box {
            width: 50%;
        }

        .course-details-card {
            border-radius: 8px;
            border: 1px solid #EEEEEE;
            padding: 30px;
        }

        .course-details-card .course-details-two-content p:last-child {
            margin-bottom: 0;
        }

        .row--30 {
            margin-left: -30px;
            margin-right: -30px;
        }

        @media only screen and (min-width: 1200px) and (max-width: 1599px) {
            .row--30 {
                margin-left: -15px;
                margin-right: -15px;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .row--30 {
                margin-left: -15px;
                margin-right: -15px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .row--30 {
                margin-left: -15px;
                margin-right: -15px;
            }
        }

        @media only screen and (max-width: 767px) {
            .row--30 {
                margin-left: -15px !important;
                margin-right: -15px !important;
            }
        }

        .row--30>[class*="col"],
        .row--30>[class*="col-"] {
            padding-left: 30px;
            padding-right: 30px;
        }

        @media only screen and (min-width: 1200px) and (max-width: 1599px) {

            .row--30>[class*="col"],
            .row--30>[class*="col-"] {
                padding-left: 15px;
                padding-right: 15px;
            }
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {

            .row--30>[class*="col"],
            .row--30>[class*="col-"] {
                padding-left: 15px;
                padding-right: 15px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {

            .row--30>[class*="col"],
            .row--30>[class*="col-"] {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }

        @media only screen and (max-width: 767px) {

            .row--30>[class*="col"],
            .row--30>[class*="col-"] {
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }

        .course-details-content .rating-box {
            background: #FFFFFF;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.07);
            border-radius: 5px;
            text-align: center;
            min-width: 200px;
            padding: 29px 10px;
        }

        .course-details-content .rating-box .rating-number {
            font-weight: 800;
            font-size: 72px;
            line-height: 90px;
            color: #231F40;
        }

        .course-details-content .rating-box span {
            font-weight: 500;
            font-size: 16px;
            line-height: 26px;
        }

        .course-tab-content {
            margin-top: 40px;
        }

        .rating-box {
            background: #FFFFFF;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.07);
            border-radius: 5px;
            text-align: center;
            min-width: 200px;
            padding: 29px 10px;
        }

        .rating-box .rating-number {
            font-weight: 800;
            font-size: 72px;
            line-height: 90px;
            color: #231F40;
        }

        .rating-box span {
            font-weight: 500;
            font-size: 16px;
            line-height: 26px;
        }

        .review-wrapper .single-progress-bar {
            position: relative;
        }

        .review-wrapper .rating-text {
            display: inline-block;
            position: relative;
            top: 19px;
        }

        .review-wrapper .progress {
            max-width: 83%;
            margin-left: 38px;
            height: 12px;
            background: #EEEEEE;
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .review-wrapper .progress {
                max-width: 80%;
            }
        }

        .review-wrapper .progress .progress-bar {
            background-color: #FFA41B;
        }

        .review-wrapper span.rating-value {
            position: absolute;
            right: 0;
            top: 50%;
        }

        .edu-comment {
            display: flex;
        }

        @media only screen and (max-width: 575px) {
            .edu-comment {
                flex-direction: column;
            }
        }

        .edu-comment .thumbnail {
            min-width: 70px;
            width: 70px;
            max-height: 70px;
            border-radius: 100%;
            margin-right: 25px;
        }

        .edu-comment .thumbnail img {
            border-radius: 100%;
            width: 100%;
        }

        .edu-comment .comment-content .comment-top {
            display: flex;
            align-items: center;
        }

        .edu-comment .comment-content .title {
            font-weight: 700;
            font-size: 20px;
            line-height: 32px;
            margin-bottom: 10px;
            margin-right: 15px;
        }

        .edu-comment .comment-content .subtitle {
            font-weight: 700;
            font-size: 16px;
            line-height: 26px;
            display: block;
            margin-bottom: 10px;
            color: #231F40;
        }

        @media only screen and (max-width: 575px) {
            .edu-comment .comment-content {
                margin-top: 20px;
            }
        }

        .edu-comment+.edu-comment {
            border-top: 1px solid #EEEEEE;
            padding-top: 30px;
            margin-top: 30px;
        }

        .checked {
            color: #ffc700;
        }

        .comments {
            margin-left: 90px;
        }

        .comment_content {
            margin-right: 40px;
        }

        .feedback {
            display: flex;
            padding-right: 50px;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
            margin-right: 100px
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .icons {
            display: flex;
            margin-left: 80%
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
    <div class="container">
        <div class="row row--30 first_box">
            <div class="col-lg-4 ">
                <div class="rating-box">
                    <div class="rating-number">5.0</div>
                    <div class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                            aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                            aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> </div>
                    <span>(25 Review)</span>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="review-wrapper">
                    <div class="single-progress-bar">
                        <div class="rating-text"> 5 <i class="fa fa-star checked" aria-hidden="true"></i> </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="rating-value">23</span>
                    </div>
                    <div class="single-progress-bar">
                        <div class="rating-text"> 4 <i class="fa fa-star checked" aria-hidden="true"></i> </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="rating-value">3</span>
                    </div>
                    <div class="single-progress-bar">
                        <div class="rating-text"> 3 <i class="fa fa-star checked" aria-hidden="true"></i> </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="rating-value">2</span>
                    </div>
                    <div class="single-progress-bar">
                        <div class="rating-text"> 2 <i class="fa fa-star checked" aria-hidden="true"></i> </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="0"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="rating-value">3</span>
                    </div>
                    <div class="single-progress-bar">
                        <div class="rating-text"> 1 <i class="fa fa-star checked" aria-hidden="true"></i> </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="0"
                                aria-valuemin="80" aria-valuemax="100"></div>
                        </div>
                        <span class="rating-value">2</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-4">
                <form class="py-2 px-4" action="{{ route('reviews.store') }}" style="box-shadow: 0 0 10px 0 #ddd;"
                    method="POST" autocomplete="off">
                    @csrf
                    <p class="font-weight-bold ">Review</p>
                    <div class="form-group row">
                        <input type="hidden" name="booking_id">
                        <div class="col">
                            <div class="rate">
                                <input type="radio" id="star5" class="rate" name="rating" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" checked id="star4" class="rate" name="rating"
                                    value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" class="rate" name="rating" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" class="rate" name="rating" value="2">
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" class="rate" name="rating" value="1" />
                                <label for="star1" title="text">1 star</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col">
                            <textarea class="form-control" name="comment" rows="6 " placeholder="Comment" maxlength="200"></textarea>
                        </div>
                    </div>
                    <div class="mt-3 text-right">
                        <button class="btn btn-sm py-2 px-3 btn-info">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row comments">
        <div class="col mt-4">
            <p class="font-weight-bold ">reviews</p>
            @foreach ($reviews as $review)
                <img src="{{ Vite::asset('resources/assets/frontoffice_asset/images/resources/user.png') }}">
                <h5>John Doe</h5>
                <div class="section">

                    <div class="form-group row">
                        <div class="col">
                            @for ($i = 0; $i < $review->rating; $i++)
                                <span class="fa fa-star checked"></span>
                            @endfor
                            @for ($i = $review->rating; $i < 5; $i++)
                                <span class="fa fa-star"></span>
                            @endfor
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col feedback">
                            <p class="comment_content">{{ $review->comment }}</p>
                            <p>{{ $review->updated_at }}</p>
                        </div>
                        <form action="{{ route('reviews.update', $review->id) }}" method="post" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <textarea class="form-control edit-comment" style="display: none;" rows="6" name="comment" required>{{ $review->comment }}</textarea>
                            <button type="submit" class="btn btn-success save-btn" name="save-btn"
                                style="display: none;"><i class="fa fa-check"></i></button>
                        </form>
                    </div>
                    <div class="icons">
                        <form method="POST" action="{{ route('reviews.destroy', $review->id) }}"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger "
                                onclick="return confirm('Are you sure you want to delete this review?')"><i
                                    class="fa fa-trash"></i></button>
                        </form>

                        <button class="btn btn-secondary edit-btn" name="edit-btn" id="{{ $review->id }}"><i
                                class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </button>

                    </div>

                </div>
            @endforeach

            <script>
                $(document).ready(function() {
                    $(".edit-btn").click(function() {
                        var commentSection = $(this).closest('.section');
                        var commentText = commentSection.find('.comment_content');
                        var commentTextarea = commentSection.find('.edit-comment');
                        var buttonSave = commentSection.find('.save-btn');

                        console.log("eeeee");
                        commentText.hide();
                        buttonSave.show();
                        commentTextarea.show();
                    });

                    $(".save-btn").click(function() {
                        var commentSection = $(this).closest('.section');
                        var commentText = commentSection.find('.comment_content');
                        var commentTextarea = commentSection.find('.edit-comment');
                        var buttonSave = commentSection.find('.save-btn');

                        commentText.text(commentTextarea.val());

                        commentTextarea.hide();
                        buttonSave.hide();
                        commentText.show();
                    });
                });
            </script>
        </div>
    </div>
@endsection
