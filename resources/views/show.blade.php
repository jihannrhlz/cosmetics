<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System in PHP & Mysql using Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
    :root {
        --yellow: #FFBD13;
        --blue: #4383FF;
        --blue-d-1: #3278FF;
        --ligth: #F5f5F5;
        --grey: #AAA;
        --white: #FFF;
        --shadow: 8px 8px 30px rgba( 0, 0, 0, .05);
    }
    body {
        margin: 0;
        padding: 0;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        background-color: #fff5f5;
        box-sizing: border-box;
    }

    .heading {
    text-align: center;
    font-size: 2.5rem;
    color: #333;
    padding: 1rem;
    margin: 2rem 0;
    }

    .heading span {
    color: #ff666f;
    }
    .container {
        margin: 20px 200px;
        display: flex;

    }
    .right-box {
        width: 50%;
        border: 2px solid #ff979e;
        border-radius: 10px;
    }
    .main-image-box {
        padding: 30px 0px;
        width: 100%;
        display: flex;
        align-items:center;
        justify-content: center;
    }
    .main-image {
        height: 500px;
        width: auto;
    }
    .image {
        height: 90%;
        width: auto;
    }
    .details-box {
        width: 50%;
        padding-left: 50px;
    }

    .wrapper {
        background: var(--white);
        padding: 1rem;
        max-width: 576px;
        border-radius: .30rem;
        box-shadow: var(--shadow);
        width: 100%;
        text-align: center;
    }


    .rating {
        display: flex;
        justify-content: center;
        align-items: center;
        grid-gap: .2rem;
        font-size: 2rem;
        color: var(--yellow);
        margin-bottom: 2rem;
    }

    textarea {
        width: 75%;
        background: var(--ligth);
        padding: 1rem;
        border-radius: .3rem;
        border: none;
        outline: none;
        resize:none;
        margin-bottom: .5rem;
    } 

    .btn-group {
        display: flex;
        grid-gap: .5rem;
        align-items: center;
    }

    .btn-group .btn {
        padding: .75rem 1rem;
        border-radius: .5rem;
        border: none;
        outline: none;
    }

    .btn-group .btn.submit {
        background: var(--blue);
        color: var(--white);
    }

    .btn-group .btn.submit:hover {
        background: var(--blue-d-1);
    }

    .btn-group .btn.cancel {
        background: var(--white);
        color: var(--blue);
    }

    .btn-group .btn.cancel:hover {
        background: var(--ligth);
    }
    
    .rating .star {
        cursor: pointer;
    }


    .rating .star:hover {
        transform: scale(1.1);
    }

    </style>
    <title>{{ $product->name }}</title>
</head>
<body>
    <h1 class="heading">Detail<span> Product</span></h1>
    <div class="container">
        <div class="right-box">
            <div class="main-image-box">
                <img src="{{ asset('storage/'.$product->image) }}" id="mainImage" class="main-image">
            </div>
        </div>
        <div class="details-box">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->category->name }}</p>
            <h2>${{ $product->price }}</h2>
        <h4>Description Product</h4>
        <p>{{ $product->description }}</p>
        </div>
    </div>
        
        {{-- <div class="wrapper">
            <form action="/product/{{$product->slug}}/review">
                <div class="rating">
                    <input type="number" name="rating" hidden>
                    <i class='bx bx-star star'></i>
                    <i class='bx bx-star star'></i>
                    <i class='bx bx-star star'></i>
                    <i class='bx bx-star star'></i>
                    <i class='bx bx-star star'></i>
                </div>
                <h3>Please give us your review: </h3>
                <label for="rating">Rating: </label>
                <input type="number" name="rating" id="rate" min="0" max="5">
                <textarea name="deskirpsi" cols="30" rows="5" placeholder="Your opinion..."></textarea>
                <div class="btn-group">
                    <button type="submit" class="btn submit">Submit</button>
                    <button type="reset" class="btn cancel"> Cancel </button> 
                </div>
            </form>
        </div>
        </div>
    </div>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>
<script>
    const allStar = document.querySelectorAll('.rating .star')

    allStar.forEach((item, idx)=> {
        item.addEventListener('click', function () {
            let click = 0

            allStar.forEach(i=> {
                i.classList.replace('bxs-star', 'bx-star')
                i.classList.remove('active')
            })
            for(let i=0; i<allStar.length; i++) {
                    if(i <= idx) {
                        allStar[i].classList.replace('bx-star', 'bxs-star')
                        allStar[i].classList.add('active')
                    } 
            }
        })
    })
</script> --}}

   
        <div class="card-header text-center" style="width: 70%">Review Product</div>
            <div class="row">
                <div class="col-md-6 text-center">
                    <h1 class="text-warning mt-4 mb-4">
                        <b><span id="average_rating">0.0</span> / 5</b>
                    </h1>
                    <div class="col-md-6">
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                        <i class="fas fa-star star-light mr-1 main_star"></i>
                    </div>
                    <h3><span id="total_review">0</span> Review</h3>
                </div>
                <div class="col-sm-6">
                    <p>
                        <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                        <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                        </div>
                    </p>
                    <p>
                        <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                        
                        <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                        </div>               
                    </p>
                    <p>
                        <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                        
                        <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                        </div>               
                    </p>
                    <p>
                        <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                        
                        <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                        </div>               
                    </p>
                    <p>
                        <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                        
                        <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                        <div class="progress">
                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                        </div>               
                    </p>
                </div>
                <div class="col-mt-6 offset-md-3 text-center">
                    <h3 class="mt-4 mb-3">Write Review Here</h3>
                    <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
                </div>
            </div>
        </div>
    <div class="mt-5" id="review_content"></div>
</div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Submit Review</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <h4 class="text-center mt-2 mb-4">
                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
            </h4>
            <div class="form-group">
                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
            </div>
            <div class="form-group">
                <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
            </div>
            <div class="form-group text-center mt-4">
                <button type="button" class="btn btn-primary" id="save_review">Submit</button>
            </div>
          </div>
    </div>
  </div>
</div>

</html>