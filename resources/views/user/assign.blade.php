@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Assign Roles</h1>
        <form action="{{ route('roles.assign') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" id="role_id" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Assign Role</button>
        </form>

        <h2 class="mt-5">Revoke Roles</h2>
        <form action="{{ route('roles.revoke') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="user_id_revoke">User</label>
                <select name="user_id" id="user_id_revoke" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="role_id_revoke">Role</label>
                <select name="role_id" id="role_id_revoke" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-danger">Revoke Role</button>
        </form>
    </div>
@endsection
