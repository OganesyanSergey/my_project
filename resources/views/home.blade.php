@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ADD POST') }}</div>

                    <div class="card-body mx-auto">
                        <form action="{{ route('add_post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class = "form-group input-group-sm d-inline-flex" style = "width:200px">
                                <input
                                    type="text"
                                    class="form-control @error('text_post') is-invalid @enderror"
                                    name = "text_post"

                                @error('text_post')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                />
                            </div>
                            <div class = "form-group input-group-sm d-inline-flex ms-2" style = "width:200px">
                                <input
                                    type="file"
                                    class="form-control @error('img_post') is-invalid @enderror"
                                    name = "img_post"
                                />

                                @error('img_post')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class = "form-group input-group-sm d-inline-flex ms-2">
                                <button
                                    type = "submit"
                                    class = "btn btn-outline-secondary">
                                    POST
                                </button>
                            </div>

                            @if (session('msg_post'))
                                <div class="alert alert-success mt-2" role="alert">
                                    {{ session('msg_post') }}
                                </div>
                            @endif

                        </form>
                    </div>
                </div>
                <div>

				   <div class = "container mt-3 border border-2 rounded">
						@foreach($posts as $post)
							<div class = "post my-3 border rounded">
								<div class = "m-2">
									<div class = "post_header d-flex align-items-center">
										<div class = "user_avatar_img my-2">
											@if(!is_null($post->user->image) && file_exists(public_path('uploads/avatar/'.$post->user->image)))
												<img src="{{ 'uploads/avatar/'.$post->user->image }}" width="50" height="50" alt="" class = "rounded-circle">
                                                @else
                                                <img src="{{ asset('/uploads/person.png') }}" width="50" height="50" alt="" class = "rounded-circle">
											@endif
										</div>
										<div class = "user_name ms-2">
											<h5>{{$post->user->name}} {{$post->user->surname}}</h5>
										</div>
									</div>
									<div class = "post_text">
										<p>
											{{$post['text']}}
										</p>
									</div>
									<div class = "post_image mb-2">
                                        <img class="w-100 rounded"
                                             src="@if (!is_null($post['img']) && file_exists(public_path($post['img'])))
																{{ $post['img'] }}
																@else {{ asset('/uploads/person.png') }} @endif"
                                             alt="" width="50" height="" />
									</div>
									<div class = "post_comment">
									  <div class="container ">
										<div class="row d-flex justify-content-center">
										  <div class = "comments_rows border rounded mb-2 w-100">
											@foreach($post->comments as $comment)
												<div class = "comment_row m-2 d-flex">
													<div class="me-2">

                                                        <img class="rounded-circle"
                                                             src="@if (!is_null($comment->user->image) && file_exists(public_path('uploads/avatar/'.$comment->user->image)))
																{{ 'uploads/avatar/'.$comment->user->image }}
																@else {{ asset('/uploads/person.png') }} @endif"
                                                             alt="" width="40" height="40" />

{{--														@if(!is_null($comment->user->image) && file_exists(public_path('uploads/avatar/'.$comment->user->image)))--}}
{{--															<img src="{{ 'uploads/avatar/'.$comment->user->image }}" width="40" height="40" alt="" class = "rounded-circle">--}}
{{--														@endif--}}
													</div>
													<div class = "my-auto">
														<p class = "my-auto">
															{{ $comment['text'] }}
														</p>
													</div>
												</div>
											@endforeach
										  </div>
										  <div class="col">
											<form method="post" action="{{ route('add_comment')}}" class="form_comment">
											 @csrf
												<div class="card">
												  <div class="card-footer border-0" style="background-color: #f8f9fa;">
													<div class="d-flex flex-start w-100">
													  <img class="rounded-circle shadow-1-strong me-3"
														src="@if (Auth::user()->image == '')
																{{ asset('/uploads/person.png') }}
																@else {{ asset('/uploads/avatar/'.Auth::user()->image) }} @endif"
														alt="avatar" width="40"height="40" />
													  <div class="form-outline w-100">
														<input type="hidden" value="{{ $post['id'] }}" name="post_id"/>
														<textarea class="form-control @error('text_comment') is-invalid @enderror text_comment" id="textAreaExample" rows="4"
														  style="background: #fff;"  name = "text_comment"></textarea>
														<label class="form-label" for="textAreaExample">Comment</label>
														 @error('text_comment')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													  </div>
													</div>
													<div class="float-start">
														<p class="msg_comment">
															12
														</p>
													</div>
													<div class="float-end">
													  <button type="submit" class="btn btn-primary btn-sm add_comment">Post comment</button>
													  <button type="button" class="btn btn-outline-primary btn-sm cancel_comment">Cancel</button>
													</div>
												  </div>
												</div>
											</form>
										  </div>
										</div>
									  </div>
									</div>
								</div>
							</div>
						@endforeach
					</div>

                </div>
            </div>
        </div>
    </div>

	@push('home_page_scripts')
		<script type="module" src="{{ asset('js/home.js') }}"></script>
	@endpush

@endsection
