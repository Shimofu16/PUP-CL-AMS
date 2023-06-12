<div class="modal fade" id="edit{{ $computer->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Edit Computer</h5>

            </div>
            <form action="{{ route('admin.computer.update', ['id' => $computer->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Computer no.</label>
                            <input type="text" class="form-control" name="computer_number" id="computer_number"
                                placeholder="Computer no." value="{{ $computer->computer_number }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Name</label>
                            <input type="text" class="form-control" name="computer_name" id="name"
                                placeholder="Name" value="{{ $computer->computer_name }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">OS</label>
                            <input type="text" class="form-control" name="os" id="os" placeholder="OS"
                                value="{{ $computer->os }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Processor</label>
                            <input type="text" class="form-control" name="processor" id="processor"
                                placeholder="Processor" value="{{ $computer->processor }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Memory</label>
                            <input type="text" class="form-control" name="memory" id="memory"
                                placeholder="Memory" value="{{ $computer->memory }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Storage</label>
                            <input type="text" class="form-control" name="storage" id="storage"
                                placeholder="Storage" value="{{ $computer->storage }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status"
                                id="status">
                                <option value="">Select Status</option>
                                <option value="Working" {{ $computer->status == 'Working' ? 'selected' : '' }}>Working
                                </option>
                                <option value="Not Working" {{ $computer->status == 'Not Working' ? 'selected' : '' }}>
                                    Not Working</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
