@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">

            </ol>
        </nav>

        <div class="row justify-content-center">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card justify-content-center">
                    <div class="card-body">
                        <h6 class="card-title">Blog Comment All </h6>

                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Sl </th>
                                        <th>Post Title </th>
                                        <th>User Name </th>
                                        <th>Subject </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comment as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['post']['post_title'] }}</td>
                                            <td>{{ $item['user']['name'] }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>
                                                <a href="{{ route('admin.comment.reply', $item->id) }}"
                                                    class="btn btn-warning"> Reply </a>

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
@endsection
