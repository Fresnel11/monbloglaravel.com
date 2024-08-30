@extends('layouts.master')
@section('contenu')
    <section class="my-5">
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 "
                            src="https://img.freepik.com/free-vector/programming-concept-illustration_114360-1351.jpg?t=st=1725002665~exp=1725006265~hmac=3cb60dd0f1a6a9802607919372b2c1b09da5aa4c16ab25d0bff55f4862db5339&w=740"
                            alt="" /></div>
                    <div class="col-md-6">
                        {{-- <div class="small mb-1">SKU: BST-498</div> --}}
                        <h1 class="display-5 fw-bolder">CODE QUIZZ</h1>
                        <div class="fs-5 mb-5">

                        </div>
                        <p class="lead">Testez vos connaissances en informatique avec nos quizz captivants et stimulants.
                            Que vous soyez un développeur chevronné ou un passionné en herbe, notre plateforme vous offre
                            une variété de questions pour évaluer vos compétences et apprendre de nouvelles astuces.
                            Rejoignez-nous pour des défis amusants, améliorez vos connaissances et devenez un expert du code
                            !</p>
                        <div class="d-flex">
                            {{-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                                style="max-width: 3rem" /> --}}
                            {{-- <button class="btn btn-outline-dark flex-shrink-0" type="button"> --}}
                            <a href="{{ route('quizzes.index') }}" class="codepen-button btn btn-outline-dark  "><span>Start
                                    Quizz</span></a>
                            {{-- </button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <style>
        /


        .codepen-button {
            display: block;
            cursor: pointer;
            color: white;
            margin: 0 auto;
            position: relative;
            text-decoration: none;
            font-weight: 600;
            border-radius: 6px;
            overflow: hidden;
            padding: 3px;
            isolation: isolate;
            transform: translateX(-145%)
        }

        .codepen-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 400%;
            height: 100%;
            background: linear-gradient(115deg, #4fcf70, #fad648, #a767e5, #12bcfe, #44ce7b);
            background-size: 25% 100%;
            animation: an-at-keyframe-css-at-rule-that-translates-via-the-transform-property-the-background-by-negative-25-percent-of-its-width-so-that-it-gives-a-nice-border-animation_-We-use-the-translate-property-to-have-a-nice-transition-so-it_s-not-a-jerk-of-a-start-or-stop .75s linear infinite;
            animation-play-state: paused;
            translate: -5% 0%;
            transition: translate 0.25s ease-out;
        }

        .codepen-button:hover::before {
            animation-play-state: running;
            transition-duration: 0.75s;
            translate: 0% 0%;
        }

        @keyframes an-at-keyframe-css-at-rule-that-translates-via-the-transform-property-the-background-by-negative-25-percent-of-its-width-so-that-it-gives-a-nice-border-animation_-We-use-the-translate-property-to-have-a-nice-transition-so-it_s-not-a-jerk-of-a-start-or-stop {
            to {
                transform: translateX(-25%);
            }
        }

        .codepen-button span {
            position: relative;
            display: block;
            padding: 1rem 1.5rem;
            font-size: 1.1rem;
            background: #000;
            border-radius: 3px;
            height: 100%;
        }
    </style>
@endsection
