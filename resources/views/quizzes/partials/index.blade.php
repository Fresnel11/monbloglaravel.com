@extends('layouts.master')

@section('title')
    QUIZZ
@endsection

@section('contenu')
    <div class="container mt-5">
        <h1 class="mb-4">Quiz Vrai ou Faux</h1>
        <div id="container" class="card1">
            <div class="cards">
                <div class="card red">
                    <p class="tip">Vrai</p>
                    {{-- <p class="second-text">Lorem Ipsum</p> --}}
                </div>
                <div class="ou">
                    ou
                </div>
                <div class="card green">
                    <p class="tip">Faux</p>
                    {{-- <p class="second-text">Lorem Ipsum</p> --}}
                </div>
            </div>
            <div class="spin">
                <div class="dot-spinner">
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                    <div class="dot-spinner__dot"></div>
                </div>
            </div>
            <button id="clickbtn" class="cssbuttons-io">
                <span><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M24 12l-5.657 5.657-1.414-1.414L21.172 12l-4.243-4.243 1.414-1.414L24 12zM2.828 12l4.243 4.243-1.414 1.414L0 12l5.657-5.657L7.07 7.757 2.828 12zm6.96 9H7.66l6.552-18h2.128L9.788 21z"
                            fill="currentColor"></path>
                    </svg>
                    Click to start</span>
            </button>

        </div>





    </div>


    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('explanations'))
        <div class="alert alert-info">
            <h3>Explications :</h3>
            @foreach (session('explanations') as $questionId => $explanation)
                <p>Question {{ $questionId }} : {{ $explanation }}</p>
            @endforeach
        </div>
    @endif
    <form id="form" action="{{ route('quiz.submit') }}" method="POST">
        @csrf
        <div class="container mt-4">
          <div class="row">
            <div class="container mt-4">
              @foreach ($quizzes as $question)
              <div class="card quiz-card">
                  <div class="card-body">
                      <h5 class="card-title">{{ $question->question }}</h5>
                      <div class="radio-input">
                          <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="question_{{ $question->id }}"
                                  value="true" id="question_{{ $question->id }}_true" />
                              <span class="ml-2">Vrai</span>
                          </label>
          
                          <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="question_{{ $question->id }}"
                                  value="false" id="question_{{ $question->id }}_false" />
                              <span class="ml-2">Faux</span>
                          </label>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
          </div>
      </div>
      
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>

    </div>
    <script>
        let form1 = document.getElementById('form');
        form1.style.display = 'none';
        document.getElementById('clickbtn').addEventListener('click', function() {
            document.getElementById('container').style.display = 'none';

            form1.style.display = 'block';
        })
    </script>


    <style>
        /* From Uiverse.io by 00Kubi */
        /* From Uiverse.io by kamehame-ha */
        /* From Uiverse.io by Na3ar-17 */
        .quiz-card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        margin-bottom: 20px;
        border-radius: 8px;
    }

    .quiz-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .radio-input label {
        display: block;
        margin-bottom: 10px;
        margin-left: 20px;  
    }
        /* .cardss {
            display: flex;
            flex-direction: column;
            gap: 15px;

        }

        .cardred {
            background-color: #f43f5e;
            
        }

        .cardss .blue {
            background-color: #3b82f6;
        }

        .cardss .green {
            background-color: #22c55e;
        }

        .cardss .greendark {
            background-color: #018673;
        }

        .cardss .yellow {
            background-color: #F4EC1B;
        }

        .cardss .cardred {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            height: 100px;
            width: 250px;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            transition: 400ms;
        }

        .cardss .cardred p.tip {
            font-size: 1em;
            font-weight: 700;
        }

        .cardss .cardred p.second-text {
            font-size: .7em;
        }

        .cardss .cardred:hover {
            transform: scale(1.1, 1.1);
        }

        .cardss:hover>.cardred:not(:hover) {
            filter: blur(10px);
            transform: scale(0.9, 0.9);
        } */

        .card1 {
            width: 1000px;
            height: 520px;
            background-color: rgb(255, 255, 255);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px 30px;
            gap: 13px;
            position: relative;
            overflow: hidden;
            box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.062);

        }




        .cards {
            display: flex;
            flex-direction: row;
            gap: 15px;
        }

        .cards .red {
            background-color: #f43f5e;
        }

        .ou {
            transform: translateY(30%);
            font-size: bold;
        }

        .cards .green {
            background-color: #22c55e;
        }

        .cards .card {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            height: 100px;
            width: 250px;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            transition: 400ms;
        }

        .cards .card p.tip {
            font-size: 1em;
            font-weight: 700;
        }

        .cards .card p.second-text {
            font-size: .7em;
        }

        .cards .card:hover {
            transform: scale(1.1, 1.1);
        }

        .cards:hover>.card:not(:hover) {
            filter: blur(10px);
            transform: scale(0.9, 0.9);
        }

        /* From Uiverse.io by abrahamcalsin */
        .spin {
            transform: translateX(44%);
            margin-top: -18%;
        }

        .dot-spinner {
            --uib-size: 2.8rem;
            --uib-speed: .9s;
            --uib-color: #018673;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: var(--uib-size);
            width: var(--uib-size);
            transform: translateY(380%);
            margin-left: -40%;
        }

        .dot-spinner__dot {
            position: absolute;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            height: 100%;
            width: 100%;
        }

        .dot-spinner__dot::before {
            content: '';
            height: 20%;
            width: 20%;
            border-radius: 50%;
            background-color: var(--uib-color);
            transform: scale(0);
            opacity: 0.5;
            animation: pulse0112 calc(var(--uib-speed) * 1.111) ease-in-out infinite;
            box-shadow: 0 0 20px rgba(18, 31, 53, 0.3);
        }

        .dot-spinner__dot:nth-child(2) {
            transform: rotate(45deg);
        }

        .dot-spinner__dot:nth-child(2)::before {
            animation-delay: calc(var(--uib-speed) * -0.875);
        }

        .dot-spinner__dot:nth-child(3) {
            transform: rotate(90deg);
        }

        .dot-spinner__dot:nth-child(3)::before {
            animation-delay: calc(var(--uib-speed) * -0.75);
        }

        .dot-spinner__dot:nth-child(4) {
            transform: rotate(135deg);
        }

        .dot-spinner__dot:nth-child(4)::before {
            animation-delay: calc(var(--uib-speed) * -0.625);
        }

        .dot-spinner__dot:nth-child(5) {
            transform: rotate(180deg);
        }

        .dot-spinner__dot:nth-child(5)::before {
            animation-delay: calc(var(--uib-speed) * -0.5);
        }

        .dot-spinner__dot:nth-child(6) {
            transform: rotate(225deg);
        }

        .dot-spinner__dot:nth-child(6)::before {
            animation-delay: calc(var(--uib-speed) * -0.375);
        }

        .dot-spinner__dot:nth-child(7) {
            transform: rotate(270deg);
        }

        .dot-spinner__dot:nth-child(7)::before {
            animation-delay: calc(var(--uib-speed) * -0.25);
        }

        .dot-spinner__dot:nth-child(8) {
            transform: rotate(315deg);
        }

        .dot-spinner__dot:nth-child(8)::before {
            animation-delay: calc(var(--uib-speed) * -0.125);
        }

        @keyframes pulse0112 {

            0%,
            100% {
                transform: scale(0);
                opacity: 0.5;
            }

            50% {
                transform: scale(1);
                opacity: 1;
            }
        }

        /* From Uiverse.io by adamgiebl */
        .cssbuttons-io {
            position: relative;
            font-family: inherit;
            font-weight: 500;
            font-size: 18px;
            letter-spacing: 0.05em;
            border-radius: 0.8em;
            cursor: pointer;
            border: none;
            background: linear-gradient(to right, #8e2de2, #4a00e0);
            color: ghostwhite;
            overflow: hidden;
            margin-left: -1%;
            margin-top: 18%;
            /* margin-bottom: -20%; */
            /* transform: translateY(300%); */
        }

        .cssbuttons-io svg {
            width: 1.2em;
            height: 1.2em;
            margin-right: 0.5em;
        }

        .cssbuttons-io span {
            position: relative;
            z-index: 10;
            transition: color 0.4s;
            display: inline-flex;
            align-items: center;
            padding: 0.8em 1.2em 0.8em 1.05em;
        }

        .cssbuttons-io::before,
        .cssbuttons-io::after {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .cssbuttons-io::before {
            content: "";
            background: #000;
            width: 120%;
            left: -10%;
            transform: skew(30deg);
            transition: transform 0.4s cubic-bezier(0.3, 1, 0.8, 1);
        }

        .cssbuttons-io:hover::before {
            transform: translate3d(100%, 0, 0);
        }

        .cssbuttons-io:active {
            transform: scale(0.95);
        }
    </style>
@endsection
