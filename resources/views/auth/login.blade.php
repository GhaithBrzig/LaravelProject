@extends('layouts.guest')

@section('slot')
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <main  class="sign-in">
        <div class="wrapper">
            <div class="sign-in-page">
                <div class="signin-popup">
                    <div class="signin-pop">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="cmp-info">
                                    <div class="cm-logo">
                                        <img src="{{Vite::asset('resources/assets/frontoffice_asset/images/resources/cm-logo.png') }}"
                                             alt="">
                                        <p>Workwise,  is a global freelancing platform and social networking where businesses and independent professionals connect and collaborate remotely</p>
                                    </div><!--cm-logo end-->
                                    <img src="{{Vite::asset('resources/assets/frontoffice_asset/images/resources/cm-main-img.png') }}"
                                         alt="">
                                </div><!--cmp-info end-->
                            </div>
                            <div class="col-lg-6">
                                <div class="login-sec">
                                    <ul class="sign-control">
                                        <li data-tab="tab-1" class="current"><a href="#" title="">Sign in</a></li>
                                        <li data-tab="tab-2"><a href="#" title="">Sign up</a></li>
                                    </ul>
                                    <div class="sign_in_sec current" id="tab-1">

                                        <h3>Sign in</h3>
                                        <form method="POST" action="{{ route('login') }}" >
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-12 no-pdd">
                                                    <div>
                                                        <x-input-label for="email" :value="__('Email')" />
                                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <x-input-label for="password" :value="__('Password')" />

                                                    <x-text-input id="password" class="block mt-1 w-full"
                                                                  type="password"
                                                                  name="password"
                                                                  required autocomplete="current-password" />

                                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <div class="checky-sec">
                                                        <div class="fgt-sec">
                                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                            <label for="c1">
                                                                <span></span>
                                                            </label>
                                                            <small>Remember me</small>
                                                        </div><!--fgt-sec end-->
                                                        @if (Route::has('password.request'))
                                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                                {{ __('Forgot your password?') }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 no-pdd">
                                                    <x-primary-button class="ml-3">
                                                        {{ __('Log in') }}
                                                    </x-primary-button>
                                                </div>
                                            </div>
                                        </form>

                                    </div><!--sign_in_sec end-->
                                    <div class="sign_in_sec" id="tab-2">
                                        <div class="dff-tab current" id="tab-3">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <div class="row">
                                                    <div>
                                                        <x-input-label for="name" :value="__('Name')" />
                                                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                    </div>
                                                    <div>
                                                        <x-input-label for="username" :value="__('username')" />
                                                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                                                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                                                    </div>
                                                    <!-- Email Address -->
                                                    <div class="mt-4">
                                                        <x-input-label for="email" :value="__('Email')" />
                                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                    </div>
                                                    <!-- Password -->
                                                    <div class="mt-4">
                                                        <x-input-label for="password" :value="__('Password')" />

                                                        <x-text-input id="password" class="block mt-1 w-full"
                                                                      type="password"
                                                                      name="password"
                                                                      required autocomplete="new-password" />

                                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                                    </div>
                                                    <!-- Confirm Password -->
                                                    <div class="mt-4">
                                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                                                      type="password"
                                                                      name="password_confirmation" required autocomplete="new-password" />

                                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                                    </div>
                                                    <!-- User Role -->
                                                    <div class="mt-4">
                                                        <x-input-label for="userType" :value="__('Account Category')" />
                                                        <select id="userType" name="userType" class="block mt-1 w-full" required>
                                                            <option value="simple user">Simple User</option>
                                                            <option value="company">Company</option>
                                                        </select>
                                                        <x-input-error :messages="$errors->get('userType')" class="mt-2" />
                                                    </div>


                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="checky-sec st2">
                                                            <div class="fgt-sec">
                                                                <input type="checkbox" name="cc" id="c2">
                                                                <label for="c2">
                                                                    <span></span>
                                                                </label>
                                                                <small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
                                                            </div><!--fgt-sec end-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="flex items-center justify-end mt-4">
                                                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                                                {{ __('Already registered?') }}
                                                            </a>

                                                            <x-primary-button class="ml-4">
                                                                {{ __('Register') }}
                                                            </x-primary-button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!--dff-tab end-->
                                        <div class="dff-tab" id="tab-4">
                                            <form>
                                                <div class="row">
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="sn-field">
                                                            <input type="text" name="company-name" placeholder="Company Name">
                                                            <i class="fa fa-building"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="sn-field">
                                                            <input type="text" name="country" placeholder="Country">
                                                            <i class="fa fa-globe"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="sn-field">
                                                            <input type="password" name="password" placeholder="Password">
                                                            <i class="fa fa-lock"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="sn-field">
                                                            <input type="password" name="repeat-password" placeholder="Repeat Password">
                                                            <i class="fa fa-lock"></i>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <div class="checky-sec st2">
                                                            <div class="fgt-sec">
                                                                <input type="checkbox" name="cc" id="c3">
                                                                <label for="c3">
                                                                    <span></span>
                                                                </label>
                                                                <small>Yes, I understand and agree to the workwise Terms & Conditions.</small>
                                                            </div><!--fgt-sec end-->
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 no-pdd">
                                                        <button type="submit" value="submit">Get Started</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!--dff-tab end-->
                                    </div>
                                </div><!--login-sec end-->
                            </div>
                        </div>
                    </div><!--signin-pop end-->
                </div><!--signin-popup end-->
                <div class="footy-sec">
                    <div class="container">
                        <ul>
                            <li><a href="help-center.html" title="">Help Center</a></li>
                            <li><a href="about.html" title="">About</a></li>
                            <li><a href="#" title="">Privacy Policy</a></li>
                            <li><a href="#" title="">Community Guidelines</a></li>
                            <li><a href="#" title="">Cookies Policy</a></li>
                            <li><a href="#" title="">Career</a></li>
                            <li><a href="forum.html" title="">Forum</a></li>
                            <li><a href="#" title="">Language</a></li>
                            <li><a href="#" title="">Copyright Policy</a></li>
                        </ul>
                        <p> <img src="{{Vite::asset('resources/assets/frontoffice_asset/images/resources/copy-icon.png') }}"
                                 alt="">Copyright 2019</p>
                    </div>
                </div><!--footy-sec
    </main>
@endsection
