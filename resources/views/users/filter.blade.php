@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">フィルター</div>
                    <div class="card-body">
                        <form action="{{ route('users_filter') }}" method="get">
                            <div class="form-group mb-3">
                                <label for="nameInput">名前</label>
                                <input type="text" class="form-control" id="nameInput" name="name" value="{{ old('name') }}">
                            </div>
                            <button class="btn btn-primary">検索</button><a class="btn" href="{{ route('users') }}" role="button">フィルター解除</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">フィルター結果（{{ $users->count() }}件）</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>名前</th>
                                <th>メールアドレス</th>
                                <th>登録日</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
