<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteSubjectModal">
    Delete Subject
  </button>

  <!-- Modal -->
  <div class="modal fade" id="deleteSubjectModal" tabindex="-1" aria-labelledby="deleteSubjectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteSubjectModalLabel">Delete Subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['url'=>'/subjects/' . $subject->id,'method'=>'delete']) !!}
        <div class="modal-body">
          Please Confirm you want to delete this subject . <br>
          This will delete all the modules of this subject including
          their corresponding files.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
