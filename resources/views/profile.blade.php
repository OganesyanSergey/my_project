@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="text-center mb-3"> Profile </h1>

            <div class = "col col-lg-3 col-md-4 col-sm-12 border text-center">
                <form action="{{ route('update_profile') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class = "mx-auto mt-3" style = "width:200px; height:200px;">
                        <div class="text-center">
                            <img
                                src = " @if (Auth::user()->image == '')
                                            {{ asset('/uploads/person.png') }}
                                        @else {{ asset('/uploads/avatar/'.Auth::user()->image) }} @endif "
                                class="rounded"
                                width="100%"
                                height="100%"
                                alt="Profile Picture" />
                        </div>
                    </div>
                    <div class = "form-group mx-auto mt-3 mb-3 input-group-sm" style = "width:200px">
                        <input
                            type="file"
                            class="form-control @error('image') is-invalid @enderror"
                            name="image"
                        />

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>

            </div>

            <div class = "col col-lg-9 col-md-8 col-sm-12 border text-center">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center mb-5">
                        <h1>Edit Form</h1>
                    </div>
                    <div class="panel-body">

                            <div class = "row mb-2">
                                <div class="form-group col col-lg-4 col-md-4 mx-auto position-relative">
                                    <input
                                        type="text"
                                        class="form-control  @error('name') is-invalid @enderror"
                                        name="name"
                                        placeholder="Name"
                                        value="{{ Auth::user()->name }}"
                                    />

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group col col-lg-4 col-md-4 mx-auto position-relative">
                                    <input
                                        type="text"
                                        class="form-control @error('surname') is-invalid @enderror"
                                        name="surname"
                                        placeholder="SurName"
                                        value="{{ Auth::user()->surname }}"
                                    />

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>
                            <div class = "row mb-2">
                                <div class="form-group col col-lg-4 col-md-4 mx-auto position-relative">
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        placeholder="Email"
                                        value="{{ Auth::user()->email }}"
                                    />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                                <div class="form-group col col-lg-4 col-md-4 mx-auto position-relative">
                                    <input
                                        type="number"
                                        class="form-control @error('age') is-invalid @enderror"
                                        name="age"
                                        placeholder="Age"
                                        value="{{ Auth::user()->age }}"
                                    />

                                    @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>

                            </div>

                            <div class = "row mb-2">
                                <div class="form-group col col-lg-4 col-md-4 mx-auto">
                                    <label> Male
                                        <input
                                            type="radio"
                                            name="gender"
                                            value ="male"
                                            placeholder="Male"
                                        @if (Auth::user()->gender == 'male')
                                          checked
                                        @endif
                                        />
                                    </label>
                                </div>
                                <div class="form-group col col-lg-4 col-md-4 mx-auto">
                                    <label> Female
                                        <input
                                            type="radio"
                                            name="gender"
                                            value = "female"
                                            placeholder="Female"
                                            @if (Auth::user()->gender == 'female')
                                                checked
                                            @endif
                                        />
                                    </label>
                                </div>
                            </div>
                            <div>
                                <button
                                    type = "submit"
                                    class = "btn btn-outline-primary">
                                    Change
                                </button>
                            </div>
                            @if (session('msg'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('msg') }}
                                </div>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
            <div class = "col border text-center">
                <a href = "{{ route('home') }}">
                    <button type = "button"
                            class = "btn btn-outline-primary my-2"
                            style = "width:150px;">
                        Exit
                    </button>
                </a>
            </div>

        </div>
    </div>
@endsection
