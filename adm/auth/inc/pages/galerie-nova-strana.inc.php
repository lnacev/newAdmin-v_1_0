              <h1 class="edit-list-title">Vložení nových fotek </h1>
              
              <div class="edit-list-wrap">

                  <form class="edit-list-form"><fieldset>
                                      <label for="categories">Výběr galerie:</label>
																			<select class="selection" id="categories" name="categories" size="1">
																			<option value="">-- Vyberte galerii --</option>
<?php require_once "./inc/config/config.inc.php";
$vysledek=mysql_query("SELECT * FROM gallery_categories");
while ($zaznam=MySQL_Fetch_Array($vysledek)): 
                                echo '<option value="'.$zaznam['id'].'">'.$zaznam['category_name'].'</option>';
endwhile;																			
?>
                                      </select>
                                  </fieldset>
                                  <div class="clear"></div><br /><br />
		<div id="queue"></div>
		<div id="upload">
		<input id="file_upload" name="file_upload" type="file" multiple="true">
		<a class="btn-red-white2" href="javascript:$('#file_upload').uploadify('upload','*')">Nahrát soubory</a>
		<br /><br />
		</div>
	</form>

	<script type="text/javascript">
		<?php $timestamp = time();?>
		$(function() {
			$('#file_upload').uploadify({
				'method'   : 'post',
				'formData'     : {
				  'categories' : $('#categories').val(),
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'auto'     : false,
				'buttonText' : 'Procházet ...',
				'swf'      : 'uploadify.swf',
				'uploader' : 'uploadify.php',
				'onUploadSuccess' : function(fileObj, response, data) {
            //alert('Soubor ' + file.name + ' byl v pořádku nahrán ' + response + ':' + data);
            //
        $.post("insert.php", { name: fileObj.name, timestamp : <?php echo $timestamp;?>, categories: $('#categories').val() }, function(info) {
						//alert(info);
				});    
            //
        } 
			});
		});
	</script>
                  
              </div>

              <div class="clear"></div> 
