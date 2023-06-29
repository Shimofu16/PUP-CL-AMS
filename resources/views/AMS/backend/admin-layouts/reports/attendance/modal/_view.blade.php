<div class="modal fade" id="view{{ $schedule->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">View Scheduled Dates at</h5>

            </div>
            <div class="modal-body my-3">
                <!-- Table with stripped rows -->
                <table class="table" id="schedules-table">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedule->scheduleDates as $schedule)
                            <tr>
                                <td>
                                    {{ date('F d, Y', strtotime($schedule->date)) }}
                                </td>
                                <td>
                                        {{ date('h:i A', strtotime($schedule->start_time)) }} - {{ date('h:i A', strtotime($schedule->start_end)) }}
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
