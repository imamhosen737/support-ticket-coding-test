@extends('layouts.admin')
@section('title', 'Ticket List')
@section('admin-content')
    <main class="mb-5">
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> >All Ticket
                    List</span>
            </div>
            <div class="row">
            </div>
            <div class="row mt-4">
                <div class="col-12 mt-md-0 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-head"><i class="fas fa-table me-1"></i>Ticket List</div>
                        </div>
                        <div class="card-body table-card-body p-3">
                            <table id="datatablesSimple">
                                <thead class="text-center bg-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Subject</th>
                                        <th>Description</th>
                                        <th>Priority Level</th>
                                        <th>Attachment</th>
                                        <th>Issued Date & Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($all_tickets as $key => $item)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->priority_level }}</td>
                                            <td class="text-center">
                                                @if (!empty($item->attachment))
                                                    <a href="{{ asset($item->attachment) }}" target="_blank"
                                                        title="{{ basename($item->attachment) }}">
                                                        <i class="fas fa-file" style="font-size: 15px;"></i>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {{ date('d-m-Y h:i A', strtotime($item->created_at)) }}
                                            </td>
                                            <td class="text-center">{{ $item->status == 1 ? '' : $item->status }}</td>
                                            <td class="text-center">
                                                @if ($item->status != 1)
                                                    <a href="{{ route('ticket.in-progress', $item->id) }}"
                                                        class="btn btn-edit disabled">In Progress</a>
                                                @else
                                                    <a href="{{ route('ticket.in-progress', $item->id) }}"
                                                        class="btn btn-edit">In Progress</a>
                                                @endif

                                                @if ($item->status == 'Resolved')
                                                    <a href="{{ route('ticket.resolved', ['id' => $item->id, 'customer_email' => $item->customer_email]) }}"
                                                        class="btn btn-delete disabled">Resolved</a>
                                                @else
                                                    <a href="{{ route('ticket.resolved', ['id' => $item->id, 'customer_email' => $item->customer_email]) }}"
                                                        class="btn btn-delete">Resolved</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No Data Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('admin-js')
    <script src="{{ asset('admin/js/sweetalert2.all.js') }}"></script>
    <script>
        function deleteTicket(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
