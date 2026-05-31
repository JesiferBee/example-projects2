@extends('layouts.app')

@section('content')
    <style>
        :root{
            --bg: #ffffff;
            --text: #111111;
            --muted: rgba(17,17,17,.65);
            --border: rgba(17,17,17,.08);
            --shadow: 0 20px 50px rgba(0,0,0,.10);
            --blue: #0071e3;
            --blue-hover: #0077ed;
            --radius-xl: 26px;
            --radius-lg: 18px;
        }

        .form-wrap{
            padding: 56px 0 48px;
        }

        .container{
            max-width: 1120px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero-card{
            border-radius: var(--radius-xl);
            background:
                radial-gradient(700px 260px at 50% -10%, rgba(0,113,227,.22), transparent 60%),
                radial-gradient(420px 160px at 18% 35%, rgba(0,0,0,.10), transparent 60%),
                linear-gradient(180deg, rgba(17,17,17,.03), rgba(17,17,17,.00));
            border: 1px solid rgba(17,17,17,.06);
            box-shadow: var(--shadow);
            padding: 28px;
            overflow: hidden;
            position: relative;
        }

        .kicker{
            font-size: 12.5px;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: rgba(17,17,17,.56);
            margin-bottom: 14px;
        }

        .hero-card h1{
            font-size: clamp(34px, 3.8vw, 52px);
            line-height: 1.05;
            letter-spacing: -0.03em;
            margin-bottom: 10px;
        }

        .lead{
            color: rgba(17,17,17,.65);
            line-height: 1.7;
            max-width: 70ch;
            margin-bottom: 18px;
            font-size: 16.5px;
        }

        .hero-actions{
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
        }

        .btn-primary{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 999px;
            background: var(--blue);
            color: #fff;
            font-weight: 600;
            border: 1px solid rgba(0,113,227,.35);
            transition: background .15s ease, transform .15s ease;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-primary:hover{
            background: var(--blue-hover);
            transform: translateY(-1px);
        }

        .btn-ghost{
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 16px;
            border-radius: 999px;
            background: rgba(255,255,255,.75);
            border: 1px solid rgba(17,17,17,.08);
            color: rgba(17,17,17,.86);
            font-weight: 600;
            transition: transform .15s ease, background .15s ease;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-ghost:hover{
            transform: translateY(-1px);
            background: rgba(255,255,255,1);
        }

        .section{
            padding: 26px 0;
        }

        .section-title{
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 16px;
            margin-bottom: 14px;
        }

        .section-title h2{
            font-size: 20px;
            letter-spacing: -.02em;
        }

        .section-title p{
            font-size: 13.5px;
            color: rgba(17,17,17,.55);
        }

        .contact-grid{
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
            align-items: start;
        }

        .panel{
            border-radius: var(--radius-xl);
            background: linear-gradient(180deg, rgba(245,245,247,.95), rgba(245,245,247,.70));
            border: 1px solid rgba(17,17,17,.07);
            padding: 28px;
            box-shadow: 0 10px 35px rgba(0,0,0,.04);
            max-width: 500px;
        }

        form{
            display: grid;
            gap: 18px;
        }

        form > div{
            display: grid;
            gap: 6px;
        }

        label{
            font-size: 13.5px;
            color: rgba(17,17,17,.72);
            font-weight: 650;
            letter-spacing: -.01em;
        }

        input, textarea, select{
            width: 100%;
            border-radius: 14px;
            border: 1px solid rgba(17,17,17,.10);
            background: rgba(255,255,255,.85);
            padding: 12px 14px;
            font-size: 14.5px;
            outline: none;
            transition: border-color .15s ease, box-shadow .15s ease, background .15s ease;
            font-family: inherit;
        }

        input:focus, textarea:focus, select:focus{
            border-color: rgba(0,113,227,.35);
            box-shadow: 0 0 0 4px rgba(0,113,227,.10);
            background: rgba(255,255,255,1);
        }

        .error-message{
            font-size: 13px;
            color: #d32f2f;
            margin-top: 4px;
        }

        .form-actions{
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-start;
            margin-top: 8px;
        }

        .note{
            font-size: 12.5px;
            color: rgba(17,17,17,.55);
            line-height: 1.5;
        }

        .success-message{
            background: rgba(76, 175, 80, .10);
            border: 1px solid rgba(76, 175, 80, .35);
            color: #2e7d32;
            padding: 14px 16px;
            border-radius: 14px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .form-meta{
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            margin-top: 10px;
        }

        .pill{
            font-size: 12.5px;
            padding: 8px 12px;
            border-radius: 999px;
            border: 1px solid rgba(17,17,17,.10);
            background: rgba(255,255,255,.7);
            color: rgba(17,17,17,.72);
        }

        @media (max-width: 900px){
            .contact-grid{ grid-template-columns: 1fr; }
            .form-wrap{ padding-top: 40px; }
            .panel{ padding: 20px; }
        }
    </style>

    <div class="form-wrap">
        <div class="container">
            <div class="hero-card">
                <div class="kicker">User Registration</div>
                <h1>Get Started</h1>
                <p class="lead">
                    Join us today by providing your name and email address. We'll use this information to create your account and keep you updated.
                </p>

                <div class="form-meta">
                    <div class="pill">Quick signup</div>
                    <div class="pill">Secure</div>
                    <div class="pill">Free</div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="contact-grid">
                    <div class="panel">
                        <div class="section-title" style="margin-bottom: 16px;">
                            <h2 style="margin:0; font-size:18px;">Create your account</h2>
                            <p style="margin:0;">Just name and email</p>
                        </div>

                        @if ($errors->any())
                            <div class="error-message" style="background: rgba(211, 47, 47, .10); border: 1px solid rgba(211, 47, 47, .35); color: #d32f2f; padding: 14px 16px; border-radius: 14px; margin-bottom: 16px;">
                                <strong>Please fix the following errors:</strong>
                                <ul style="margin: 8px 0 0 20px; padding: 0;">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="success-message">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="/form/store">
                            @csrf
 
                            <div>
                                <label for="name">Full name</label>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Your name" required>
                                @error('name')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email">Email address</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@example.com" required>
                                @error('email')
                                    <p class="error-message">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-actions">
                                <button class="btn-primary" type="submit">Create account</button>
                            </div>
                        </form>

                        <p class="note" style="margin-top: 16px;">
                            ✓ Your information is secure and private
                        </p>
                    </div>
                </div>

                <div class="note" style="margin-top: 14px; text-align:center;">
                    © {{ date('Y') }} Example Project. All rights reserved.
                </div>
            </div>
        </div>
    </div>
@endsection