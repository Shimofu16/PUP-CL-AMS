<div class="modal fade" id="add" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Add Computer</h5>

            </div>
            <form action="{{ route('admin.computer.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('POST')

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Computer no.</label>
                            <input type="text" class="form-control @error('computer_number') is-invalid @enderror"
                                value="{{ old('computer_number') }}" name="computer_number" id="computer_number"
                                placeholder="Computer no.">
                            @error('computer_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Name</label>
                            <input type="text" class="form-control @error('computer_name') is-invalid @enderror"
                                value="{{ old('computer_name') }}" name="computer_name" id="name" placeholder="Name">
                            @error('computer_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">OS</label>
                            <input type="text" class="form-control @error('os') is-invalid @enderror"
                                value="{{ old('os') }}" name="os" id="os" placeholder="OS">
                            @error('os')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Processor</label>
                            <input type="text" class="form-control @error('processor') is-invalid @enderror"
                                value="{{ old('processor') }}" name="processor" id="processor" placeholder="Processor">
                            @error('processor')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Memory</label>
                            <input type="text" class="form-control @error('memory') is-invalid @enderror" value="{{ old('processor') }}"
                                name="memory" id="memory" placeholder="Memory">
                            @error('memory')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold text-black">Storage</label>
                            <input type="text" class="form-control @error('storage') is-invalid @enderror" value="{{ old('storage') }}"
                                name="storage" id="storage" placeholder="Storage">
                            @error('storage')
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
