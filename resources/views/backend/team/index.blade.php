@extends('adminlte::page')

@section('title', 'Teams')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>All Team Members</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Team</li>
            </ol>
        </div>
    </div>
@stop

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="pb-3">
                        <a href="{{ route('team.create') }}" class="btn btn-primary rounded-1">+ Add
                            New</a>
                    </div>
                    <div class="card p-2">
                        <div class="card-body p-0">
                            <table id="datatable" class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">
                                            #
                                        </th>
                                        <th style="width: 15%">
                                            Name
                                        </th>
                                        <th style="width: 10%">
                                            Position
                                        </th>
                                        <th style="width: 10%">
                                            Image
                                        </th>

                                        <th style="width: 20%" class="text-center">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                <a>
                                                    {{ $team->name }}
                                                </a>
                                                <br>
                                                <small>
                                                    {{ $team->created_at->diffForHumans() }}
                                                </small>
                                            </td>
                                            <td>
                                            {{ $team->position }}
                                            </td>
                                            <td>
                                                @if ($team->image)
                                                    <img style="width:75px;"
                                                        src="{{ asset('uploads/images/team/' . $team->image) }}"
                                                        alt="">
                                                @else
                                                    <img style="width:75px;"
                                                        src="{{ asset('uploads/images/no-image.jpg') }}"
                                                        alt="">
                                                @endif
                                            </td>


                                            <td class="project-actions text-right d-flex">

                                                <div>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('team.edit', $team->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>
                                                        Edit
                                                    </a>
                                                </div>
                                                <div>
                                                    <form action="{{ route('team.destroy', $team->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                                            class="btn btn-danger btn-sm ml-2">
                                                            <i class="fas fa-trash"></i>
                                                            Delete
                                                            </a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $(".alert").delay(6000).slideUp(300);
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>

    {{-- Success and error notification and alert --}}
    <script>
        $(document).ready(function() {
        // show error message
        @if ($errors->any())
            //var errorMessage = @json($errors->any()); // Get the first validation error message
            var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5500
            });

            Toast.fire({
            icon: 'error',
            title: 'There are form validation errors. Please fix them.'
            });
        @endif

        // success message
        @if (session('success'))
            var successMessage = @json(session('success')); // Get the first sucess message
            var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5500
            });

            Toast.fire({
            icon: 'success',
            title: successMessage
            });
        @endif

        });
    </script>
@stop
