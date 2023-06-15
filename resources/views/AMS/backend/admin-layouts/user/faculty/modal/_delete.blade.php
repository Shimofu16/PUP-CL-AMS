<div class="modal fade" id="delete{{ $user->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Logout User</h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout {{ $user->getName() }}?</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.user.account.faculty.resetPassword', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
