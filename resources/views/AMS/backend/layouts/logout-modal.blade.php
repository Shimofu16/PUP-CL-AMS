<div class="modal fade" id="logout" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-maroon">
                <h5 class="modal-title text-white">Logout</h5>

            </div>
            <div class="modal-body">
                Are you sure you want to end your session?
            </div>
            <div class="modal-footer">
                <form action="{{ route('logout.delete') }}" method="post">
                    @csrf
                    @method('POST')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-maroon">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
