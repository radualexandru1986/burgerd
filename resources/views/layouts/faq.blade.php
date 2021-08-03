@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="container-xxl bg-light  py-5" style="min-height: 75vh;">
        <div class="header-text">
            <h1 class="display-2 text-center"> F.A.Q.</h1>
        </div>
        <div class="accordion" id="faq">
            <div class="accordion-item my-2">
                <h2 class="accordion-header" id="ingredients">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#ingredientsCollapse" aria-expanded="true" aria-controls="collapseOne">
                        What if I do not like an ingredient?
                    </button>
                </h2>
                <div id="ingredientsCollapse" class="accordion-collapse collapse show" aria-labelledby="ingredients" data-bs-parent="#faq">
                    <div class="accordion-body">
                        If you wish us not to include something in your order you can tell us at
                        <strong> 07305436556 </strong>
                    </div>
                </div>
            </div>
            <div class="accordion-item my-2">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        What if I have food allergies?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faq">
                    <div class="accordion-body">
                        All allergens are included in the food descriptions/recipe. If you have further concerns about allergens, please contact us directly at
                        <strong> 07305 436 556</strong>
                    </div>
                </div>
            </div>
            <div class="accordion-item my-2">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Payment
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faq">
                    <div class="accordion-body">
                        You can pay either  cash or by card via card machine. On orders bigger than £30 you have to pay via bank transfer.
                        Someone will contact you if the order is bigger than £30.
                    </div>
                </div>
            </div>
            <div class="accordion-item my-2">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                        Delivery time
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faq">
                    <div class="accordion-body">
                       <strong>Each order is queued and it can take up to 15 minutes to prepare.</strong>  <br>
                       You will get a message with an estimate time  when your order has left our kitchen. <br>
                        These are only estimates, so actual time could be more or hopefully less. <br>
                        We are trying as  much as possible to deliver faster.
                        <br>
                    </div>
                </div>
            </div>
            <div class="accordion-item my-2">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                      Cancelling a order
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faq">
                    <div class="accordion-body">
                       If you wish to cancel an order you have to contact us directly at <strong>07305 436 556</strong>.
                    </div>
                </div>
            </div>
            <div class="accordion-item my-2">
                <h2 class="accordion-header" id="headingSix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
                      Back-ordering
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faq">
                    <div class="accordion-body">
                        If we are not open yet and you placed an order, we will first start with your order when we open, considering you are the first one to place an order while we are closed.

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

