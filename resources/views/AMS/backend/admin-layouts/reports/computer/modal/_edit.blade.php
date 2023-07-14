<div class="modal fade" id="edit{{ $report->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit</h5>
                {{-- close button --}}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.report.computer.update',['id' => $report->id]) }}" method="post">
                @csrf
                @method('PUT')
            <div class="modal-body">    
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <label for="status" class="form-label fw-bold text-black">Status</label>
                        {{-- generate aselect for scheduled dates --}}
                        <select class="form-select" aria-label="Default select example" name="status" id="status">
                            <option value="" selected>----- Select Status -----</option>
                            <option value="Working">Working</option>
                            <option value="Undermaintenance" >Undermaintenance</option>
                        </select>
                        @error('status')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
        </form>
        </div>
    </div>
</div>
