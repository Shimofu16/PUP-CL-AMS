<div class="modal fade" id="view{{ $schedule->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">View Scheduled Dates</h5>

            </div>
            <div class="modal-body my-3">
                <!-- Table with stripped rows -->
                <table class="table" id="schedules-table">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Request Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedule->scheduleDates as $schedule_date)
                            <tr>
                                <td>
                                    {{ date('F d, Y', strtotime($schedule_date->date)) }}
                                </td>
                                <td>
                                        {{ date('h:i A', strtotime($schedule->start_time)) }} - {{ date('h:i A', strtotime($schedule->end_time)) }}
                                </td>
                                <td>
                                    @if ($schedule_date->request !== null)
                                        @if ($schedule_date->request->status === 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($schedule_date->request->status === 'approved')
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
                                    @else
                                        
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
