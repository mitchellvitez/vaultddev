<?php 
    if (session_id() == "") {
      session_start();
    }
    if (isset($_SESSION["error"])) { ?>
    <div class="modal fade" id="error" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Error</h4>
          </div>
          <div class="modal-body">
            <p><?php echo $_SESSION["error"]; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script type="text/javascript">
        $(window).load(function(){
            $('#error').modal('show');
        });
    </script>
<?php unset($_SESSION["error"]); } ?>
