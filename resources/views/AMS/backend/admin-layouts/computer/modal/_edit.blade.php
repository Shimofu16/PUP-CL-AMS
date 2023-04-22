<div class="modal fade" id="edit{{ $computer->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action=" {{-- {{ route('admin.doctor.update', $doctor->id) }} --}}   " method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')

                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label for="name" class="text-dark text-black font-weight-bold">Computer no.</label>
                            <input type="text" class="form-control" name="name" id="computer_number"
                                placeholder="Computer no." value="{{ $computer->computer_number }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label for="name" class="text-dark text-black font-weight-bold">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                value="{{ $computer->computer_name }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label for="name" class="text-dark text-black font-weight-bold">OS</label>
                            <input type="text" class="form-control" name="name" id="os" placeholder="OS"
                                value="{{ $computer->os }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label for="name" class="text-dark text-black font-weight-bold">Processor</label>
                            <input type="text" class="form-control" name="name" id="processor"
                                placeholder="Processor" value="{{ $computer->processor }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label for="name" class="text-dark text-black font-weight-bold">Memory</label>
                            <input type="text" class="form-control" name="name" id="memory"
                                placeholder="Memory" value="{{ $computer->memory }}">
                        </div>
                    </div>
                    <div class="row g-3 mb-2">
                        <div class="col-md-12">
                            <label for="name" class="text-dark text-black font-weight-bold">Storage</label>
                            <input type="text" class="form-control" name="name" id="storage"
                                placeholder="Storage" value="{{ $computer->storage }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
