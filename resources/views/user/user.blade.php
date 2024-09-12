@extends('template.main')
@section('title', 'User')
@section('content')

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">@yield('title')</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="text-right">
                <div class="">
                  <a href="/user/create" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add
                    User</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-striped table-bordered table-hover text-center"
                style="width: 100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($user as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td> {{ $data->password }}</td>
                    <td>
                      <form class="d-inline" action="/user/{{ $data->id_user }}/edit" method="GET">
                        <button type="submit" class="btn btn-warning btn-sm mr-1" style="color: white;">
                          <i class="fa-solid fa-pen"></i> Edit
                        </button>
                      </form>
                      <form class="d-inline" action="/user/{{ $data->id_user }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm" id="btn-delete"><i
                            class="fa-solid fa-trash-can"></i> Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection