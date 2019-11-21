@extends('layouts.admin')

<!-- Main Content -->
@section('content')
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph text-success">
                    </i>
                </div>
                <div>Data Table
                    <div class="page-title-subheading">Build whatever layout you need with our Architect framework.
                    </div>
                </div>
            </div>
            <div class="page-title-actions">
                <div class="d-inline-block">
                    <a href="{{ url('user/create') }}"><button type="submit" class="btn btn-primary">Add New</button></a>
                </div>
            </div>    
        </div>
    </div>            
    <div class="row">
        <div class="col-lg-12">

            @if(Session::has('message'))
            <div class="alert alert-{{ Session::get('alert-status') }}" role="alert">
                {{ Session::get('message') }}
            </div>
            @endif

            <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title">Data table</h5>
                    <table id="table_id" class="mb-0 table">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}"><span class="badge bg-red">Edit</span></a>
                                    <a href="javascript:void(0)" class="delete"><span class="badge bg-red">Delete</span></a>
                                    <input class="delete_url" type="hidden" value="{{ route('user.destroy', $user->id) }}">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script type="text/javascript">

    $(document).ready( function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#table_id').DataTable();

        $("#table_id").on("click", ".delete", function () {
            var url = $(this).next('.delete_url').val();
            console.log(url);
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    //window.location.href = url;
                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            _method: 'DELETE'
                        },
                        url: url,
                        success: function(response) {
                            location.reload();
                        }
                    });
                } else {
                    swal("Your file is safe!");
                }
            });

        });

    });

</script>

@endsection