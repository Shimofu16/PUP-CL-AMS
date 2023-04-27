<div class="modal fade" id="delete{{ $student->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white">Delete</h5>

            </div>
            <div class="modal-body">
                Do you want to delete this data?
            </div>
            <div class="modal-footer">
                <form action="{{ route('faculty.student.destroy', ['id' => $student->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
