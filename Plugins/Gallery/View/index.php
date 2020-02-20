<div class="stored-body">
	<input id="fileupload" type="file" name="files[]" data-url="ajax.php" multiple>
</div>
<script src="Resource/Gallery/js/jquery.ui.widget.js"></script>
<script src="Resource/Gallery/js/jquery.iframe-transport.js"></script>
<script src="Resource/Gallery/js/jquery.fileupload.js"></script>
<script>
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo(document.body);
            });
        }
    });
});
</script>