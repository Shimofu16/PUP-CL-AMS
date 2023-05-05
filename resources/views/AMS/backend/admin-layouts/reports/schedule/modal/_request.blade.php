<div class="modal fade" id="request{{ $request->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white">Review reason</h5>
                {{-- close button --}}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $request->reason }}
            </div>
            <div class="modal-footer">
                <form
                    action="{{ route('admin.report.schedule.request.update', ['id' => $request->id, 'status' => 'rejected']) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-secondary">Reject</button>
                </form>
                <form
                    action="{{ route('admin.report.schedule.request.update', ['id' => $request->id, 'status' => 'approved']) }}"
                    method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-info text-white">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
