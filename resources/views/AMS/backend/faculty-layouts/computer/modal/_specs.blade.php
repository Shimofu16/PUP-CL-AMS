<div class="modal fade" id="specs{{ $computer->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Computer Specification</h5>

            </div>
            <div class="modal-body">

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label fw-bold text-black">Computer no.</label>
                        <input type="text" class="form-control "disabled name="computer_number" id="computer_number"
                            placeholder="Computer no." value="{{ $computer->computer_number }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label fw-bold text-black">Name</label>
                        <input type="text" class="form-control "disabled name="computer_name" id="name"
                            placeholder="Name" value="{{ $computer->computer_name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label fw-bold text-black">OS</label>
                        <input type="text" class="form-control "disabled name="os" id="os"
                            placeholder="OS" value="{{ $computer->os }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label fw-bold text-black">Processor</label>
                        <input type="text" class="form-control "disabled name="processor" id="processor"
                            placeholder="Processor" value="{{ $computer->processor }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label fw-bold text-black">Memory</label>
                        <input type="text" class="form-control "disabled name="memory" id="memory"
                            placeholder="Memory" value="{{ $computer->memory }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label for="name" class="form-label fw-bold text-black">Storage</label>
                        <input type="text" class="form-control "disabled name="storage" id="storage"
                            placeholder="Storage" value="{{ $computer->storage }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
