@extends('layouts.master')
@section('contenu')
    <section class="my-5">
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0 ">
                           <img class="img-fluid " src="https://img.freepik.com/vecteurs-libre/illustration-du-concept-codage_114360-939.jpg?t=st=1725298431~exp=1725302031~hmac=34427bf5379e9b5e5664228be7e4b02b72057a6f8e4c682a3872cbb3fdd5ed68&w=740" alt="">
                    </div>
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
                            <a href="{{ route('quizzes.index') }}" class="ui-btn">
                                <span>
                                   Jouer
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
    <style>
        /* From Uiverse.io by Galahhad */
        .ui-btn {
            --btn-default-bg: rgb(41, 41, 41);
            --btn-padding: 15px 20px;
            --btn-hover-bg: rgb(51, 51, 51);
            --btn-transition: .3s;
            --btn-letter-spacing: .1rem;
            --btn-animation-duration: 1.2s;
            --btn-shadow-color: rgba(0, 0, 0, 0.137);
            --btn-shadow: 0 2px 10px 0 var(--btn-shadow-color);
            --hover-btn-color: #FAC921;
            --default-btn-color: #fff;
            --font-size: 16px;
            /* 👆 this field should not be empty */
            --font-weight: 600;
            --font-family: Menlo, Roboto Mono, monospace;
            /* 👆 this field should not be empty */
        }

        /* button settings 👆 */

        .ui-btn {
            box-sizing: border-box;
            padding: var(--btn-padding);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--default-btn-color);
            font: var(--font-weight) var(--font-size) var(--font-family);
            background: var(--btn-default-bg);
            border: none;
            cursor: pointer;
            transition: var(--btn-transition);
            overflow: hidden;
            box-shadow: var(--btn-shadow);
        }

        .ui-btn span {
            letter-spacing: var(--btn-letter-spacing);
            transition: var(--btn-transition);
            box-sizing: border-box;
            position: relative;
            background: inherit;
        }

        .ui-btn span::before {
            box-sizing: border-box;
            position: absolute;
            content: "";
            background: inherit;
        }

        .ui-btn:hover,
        .ui-btn:focus {
            background: var(--btn-hover-bg);
        }

        .ui-btn:hover span,
        .ui-btn:focus span {
            color: var(--hover-btn-color);
        }

        .ui-btn:hover span::before,
        .ui-btn:focus span::before {
            animation: chitchat linear both var(--btn-animation-duration);
        }

       

        @keyframes chitchat {
            0% {
                content: "#";
            }

            5% {
                content: ".";
            }

            10% {
                content: "^{";
            }

            15% {
                content: "-!";
            }

            20% {
                content: "#$_";
            }

            25% {
                content: "№:0";
            }

            30% {
                content: "#{+.";
            }

            35% {
                content: "@}-?";
            }

            40% {
                content: "?{4@%";
            }

            45% {
                content: "=.,^!";
            }

            50% {
                content: "?2@%";
            }

            55% {
                content: "\;1}]";
            }

            60% {
                content: "?{%:%";
                right: 0;
            }

            65% {
                content: "|{f[4";
                right: 0;
            }

            70% {
                content: "{4%0%";
                right: 0;
            }

            75% {
                content: "'1_0<";
                right: 0;
            }

            80% {
                content: "{0%";
                right: 0;
            }

            85% {
                content: "]>'";
                right: 0;
            }

            90% {
                content: "4";
                right: 0;
            }

            95% {
                content: "2";
                right: 0;
            }

            100% {
                content: "";
                right: 0;
            }
        }
    </style>
@endsection
