 <div class="modal fade" id="confirm-delete"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:400px;" >
        <div class="modal-content">
            <div class="modal-header" style="background-color:#000; color:#fff;">
                Delete Confirmation
            </div>
            <div class="modal-body headDeleteinfo">
            </div>
            <div class="modal-footer">
                {{ Form::open(array('url' => '', 'class'=>'modal_delete_form')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::button( 'Delete', array('type'=>'submit' , 'class' => 'btn btn-danger')) }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>