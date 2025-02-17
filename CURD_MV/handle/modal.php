<?php
function ModelDelete()
{
?>
    <div class="modal fade" id="Modal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Shop Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post">
                    <input type="text" name="product_id" class="product_id">
                    <div class="modal-body">
                        <h3>Do you want to Delete This?</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button name="yes_delete" type="submit" class="btn btn-success">Yes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php
}
?>