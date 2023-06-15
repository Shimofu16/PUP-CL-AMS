<div class="modal fade" id="logs{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">
                    @if (Route::is('admin.user.faculty.index'))
                        {{ $user->facultyMember->getFullName() }}`s
                    @endif
                    @if (Route::is('admin.user.student.index'))
                        {{ $user->student->getFullName() }}`s
                    @endif logs this week
                </h5>
            </div>
            <div class="modal-body">
                <table class="table" id="users-table">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Time In</th>
                            <th scope="col">Time Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->getLogsWithinAWeek() as $log)
                            <tr>
                                <td>{{ date('M d, Y', strtotime($log->created_at)) }}</td>
                                <td>{{ date('h:i A', strtotime($log->time_in)) }} </td>
                                <td>
                                    @if ($log->time_out != null)
                                        {{ date('h:i A', strtotime($log->time_out)) }}
                                    @else
                                        <span class="badge bg-danger">Not Logged Out</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="{{ route('admin.user.account.log.show', ['id' => $user->id]) }}" class="btn btn-maroon">View All</a>
            </div>
        </div>
    </div>
</div>
