<div class="modal fade" id="add{{ $computer->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add Report</h5>

            </div>
            <form action="{{ route('faculty.computer.update', ['id' => $computer->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="description" class="form-label fw-bold text-black">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- generate a select for status --}}
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status"
                                id="status">
                                <option value="">Select Status</option>
                                <option value="Working">Working</option>
                                <option value="Not Working">Not Working</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-maroon">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
