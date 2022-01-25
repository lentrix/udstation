<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModuleModal">
    Delete Module
  </button>

  <!-- Modal -->
  <div class="modal fade" id="deleteModuleModal" tabindex="-1" aria-labelledby="deleteModuleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModuleModalLabel">Delete Module</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['url'=>"/modules/$module->id", 'method'=>'delete']) !!}
        <div class="modal-body">
            Please confirm deleting this module. <br>
            All files associated with this module will also be deleted.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete Module</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
