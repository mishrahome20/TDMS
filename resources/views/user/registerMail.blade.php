<x-guest-layout>
<div class="app font-sans min-w-screen min-h-screen bg-grey-lighter py-8 px-4">

        <div class="mail__wrapper max-w-md mx-auto">

            <div class="mail__content bg-white p-8 shadow-md">

                <div class="content__header text-center tracking-wide border-b">
                    <div class="text-red text-sm font-bold">Welcome to CybuzzSC Pvt Ltd </div>
                    <h1 class="text-3xl h-48 flex items-center justify-center">Your Login Credentials</h1>
                </div>

                <div class="content__body py-8 border-b">
                    <p>
                        <strong>Name : </strong> {{ $user->email }}<br><br>
                        <strong>Email : </strong> {{ $user->email }}<br><br>
                        <strong>Password : </strong> Password
                        <br><br>
                        <strong>User Code : </strong>{{ $user->code }}
                    </p>
                    <a href="http://127.0.0.1:8083/login?token={{ $user->token }}">
                        <button class="text-black text-sm tracking-wide bg-green-400 rounded w-full my-8 p-4 ">
                            Click here to Sign in
                        </button>
                    </a>
                </div>
                <div class="content__footer mt-8 text-center text-grey-darker">
                    <p>Note: Once logged in please reset your password.</p>
                </div>

            </div>

            <div class="text-center text-sm text-grey-darker mt-8">

            </div>
        </div>
    </div>
</x-guest-layout>
