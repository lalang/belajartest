
<div style="display: none" id="noReg">
    <?php
        echo $model->perizinan->kode_registrasi;
    ?>
</div>
<textarea style="display: none" id="contentBAPL" cols="60" rows="10">
    <?php
        echo $model->form_bapl;
    ?>
  </textarea>
 
  <div id="download-area"></div>

  <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
  <script src="/js/FileSaver.js"></script>
  <script src="/js/html-docx.js"></script>
  
  <script>

          
      
    tinymce.init({
      selector: '#contentBAPL',
      plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen fullpage",
        "insertdatetime media table contextmenu paste"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | " +
        "alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | " +
        "link image"
    });
    window.onload = function() {
      var noreg = 'FormBAPL'+document.getElementById('noReg').innerHTML;
      alert(noreg);
//    document.getElementById('convert').addEventListener('click', function(e) {
      //e.preventDefault();
      //convertImagesToBase64();
      // for demo purposes only we are using below workaround with getDoc() and manual
      // HTML string preparation instead of simple calling the .getContent(). Becasue
      // .getContent() returns HTML string of the original document and not a modified
      // one whereas getDoc() returns realtime document - exactly what we need.
      var contentDocument = tinymce.get('contentBAPL').getDoc();
      var content = '<!DOCTYPE html>' + contentDocument.documentElement.outerHTML;
      var orientation = 'portrait';
      var converted = htmlDocx.asBlob(content, {orientation: orientation});
      saveAs(converted, noreg+'.docx');
      var link = document.createElement('a');
      link.href = URL.createObjectURL(converted);
      link.download = noreg+'.docx';
      link.appendChild(
        document.createTextNode('Click here if your download has not started automatically'));
      var downloadArea = document.getElementById('download-area');
      downloadArea.innerHTML = '';
      downloadArea.appendChild(link);
    }
//    });
//    function convertImagesToBase64 () {
//      var contentDocument = tinymce.get('contentBAPL').getDoc();
//      var regularImages = contentDocument.querySelectorAll("img");
//      var canvas = document.createElement("canvas");
//      
//      canvas.width = regularImages.width;
//    canvas.height = regularImages.width;
//    var ctx = canvas.getContext("2d");
//    ctx.drawImage(regularImages, 0, 0);
//    var dataURL = canvas.toDataURL("image/png");
//      regularImages.setAttribute('src', dataURL);
//      
//      var ctx = canvas.getContext('2d');
//      [].forEach.call(regularImages, function (imgElement) {
//        // preparing canvas for drawing
//        ctx.clearRect(0, 0, canvas.width, canvas.height);
//        canvas.width = imgElement.width;
//        canvas.height = imgElement.height;
//        ctx.drawImage(imgElement, 0, 0);
//        // by default toDataURL() produces png image, but you can also export to jpeg
//        // checkout function's documentation for more details
//        var dataURL = canvas.toDataURL();
//        imgElement.setAttribute('src', dataURL);
//      })
//      canvas.remove();
//    }
  </script>