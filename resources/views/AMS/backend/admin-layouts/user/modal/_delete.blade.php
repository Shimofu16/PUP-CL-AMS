<div class="modal fade" id="delete{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Logout</h5>
                
            </div>
            <div class="modal-body">
                asd
            </div>
            <div class="modal-footer">
                <form action="" method="POST">
                    @csrf
                    @method('delete')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>

