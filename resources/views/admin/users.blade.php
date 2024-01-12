@extends('layouts.admin_panel');

@section('admin.content')

	<div class = "row">

			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">#</th>
				  <th scope="col">Name</th>
				  <th scope="col">Surname</th>
				  <th scope="col">eMail</th>
				  <th scope="col">Age</th>
				  <th scope="col">Gender</th>
				  <th scope="col">Status</th>
                  <th scope="col">Role</th>
				  <th scope="col">Delete</th>
				</tr>
			  </thead>

				@foreach($users as $user)

					<tbody>
						<tr>
						  <th scope="row"> {{ $loop->iteration }} </th>
                            <td> {{ $user['name'] }} </td>
                            <td> {{ $user['surname'] }} </td>
                            <td> {{ $user['email'] }} </td>
                            <td> {{ $user['age'] }} </td>
                            <td> {{ $user['gender'] }} </td>

                            @foreach($user->roles as $role)
                                    @if ($role['role_id'] == 1)
                                        <td>
                                            <form action="{{ route('status_users') }}" method="POST" class="form_status">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ $user['id'] }}">
                                                <input type="hidden" name="status" value="{{$user['status']}}">
                                                <div class = "div_submit">
                                                    @if ($user['status'] == 1)
                                                        <button type="submit" class="btn btn-success">On</button>
                                                    @else
                                                        <button type="submit" class="btn btn-danger">Off</button>
                                                    @endif
                                                </div>
                                            </form>
                                        </td>
                                        <td> User </td>
                                        <td> <button type="button" class="btn btn-outline-danger btn-sm"> x </button> </td>
                                    @else
                                        <td>  </td>
                                        <td> Admin </td>
                                        <td>  </td>
                                   @endif
                            @endforeach
						</tr>
				  </tbody>
				@endforeach
			</table>

	</div>

    @push('users_admin_page_scripts')
        <script type="module" src="{{ asset('js/users_admin.js') }}"></script>
    @endpush

@endsection
