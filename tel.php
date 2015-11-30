<?php
/**
 * Template Name: TEL
 *
 * @package accesspress_parallax_child
 */
get_header();
/**
 * The template for displaying all Parallax Templates.
 *
 * @package accesspress_parallax
 */
//<iframe align="center" width="100%" height="400px" src="http://127.0.0.1:8000/vendor/addressbook/addressbook" frameborder="yes" scrolling="yes" name="myIframe" id="myIframe"> </iframe>
?>
    <div class="container">
        <h1>Książka telefoniczna</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalTable">
	Odpal książkę
        </button>
        <div class="modal fade" style="z-index:123123;" id="modalTable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Modal table</h4>
                    </div>
                    <div class="modal-body">
                        <table id="table"
                               data-toggle="table"
                               data-height="299">
                            <thead>
                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="name">Item Name</th>
                                <th data-field="price">Item Price</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

<?php
get_footer();
?>
