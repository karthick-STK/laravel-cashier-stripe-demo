<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <body>
    <div class="container">
    <div class="row">
        <div class="col-lg-12 my-3">
            <div class="pull-right">
                <h4>Product List</h4>
            </div>
        </div>
    </div> 
   
    <div id="products" class="row view-group">
    @foreach($products as $product)   
                <div class="item col-xs-4 col-lg-4">
                    <div class="thumbnail card">
                        <div class="img-event">
                            <img class="group list-group-image img-fluid" src=" https://cdn.pixabay.com/photo/2015/04/19/08/33/flower-729512__340.jpg" alt="" />
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading">
                                {{$product->name}}</h4>
                            <p class="group inner list-group-item-text">
                                {{$product->description}}</p>
                            <div class="row">
                                <div class="col-xs-12 col-md-4">
                                    <p class="lead">
                                    {{$product->price}}</p>
                                </div>
                                <div class="col-xs-12 col-md-8">
                                <form action="http://localhost/laravel/public/checkout" method="post">
            
            <input type="hidden" name="price" value="{{$product->price}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button class="btn btn-primary" >Buy Now</button>
            
            </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach                
                
            </div>


          
</div>
    </body>
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>

<script>
    const stripe = Stripe('pk_test_51IO24XIadbaPhcttwRAn0XN2lTAtaaHWwXmkdSyPYPvywIEKGMvS5Z5MInwYrVIzvQpe4vBUhRFIDVYGm1OsUWfD007CKR8slm');

    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');

    const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

cardButton.addEventListener('click', async (e) => {
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
    );

    if (error) {
        console.log("error");
        // Display "error.message" to the user...
    } else {
        console.log("succe");
        // The card has been verified successfully...
    }
});
</script>

</html>