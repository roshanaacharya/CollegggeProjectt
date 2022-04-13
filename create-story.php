<?php
    session_start();
    if(!isset($_SESSION['login']) || !$_SESSION['login']==1){
    header('Location:login.php');
    }
    $id = $_SESSION['user_id']; 
    include('db/connect.php');
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);

    $categoryQuery ="SELECT * FROM category";
    $categoryResult=mysqli_query($conn,$categoryQuery);


?>
<!DOCTYPE html>
<html>
        <head>
            <title>Learners padd</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        </head>
      <body style="background-color:#728FCE;">
            <?php include('nav.php');?>    
            
            <div class="container">
             <div class="row justify-content-md-center">

               <div class="col-8">
                <form method="POST" action="db/create.php" enctype="multipart/form-data">

                  <div class="mb-3">
                    <label for="" class="form-label"><h2>Title</h2></label>
                    <input type="text" class="form-control" name="title">
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label"><h3>Description</h3></label>
                   <textarea id ="news" class="form-control" name="descriptions"></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Image</label> <br>
                  <input type="file" name="image">
                  </div>

                  <div class="mb-3">
                    <label for="" class="form-label">Genre</label>
                      <select class="form-control" name="genre">
                        <?php while ($row=mysqli_fetch_assoc($categoryResult)){ ?>
                              <option value="<?php echo $row['id']; ?>"> 
                              <?php echo $row['genre']; ?> </option>
                        <?php } ?>
                      </select>
                  </div>
                  <hr/>
                  <div class="mb-3">
                    <label for="" class="form-label">Author</label>
                    <input type="text" class="form-control" name="author">
                  </div>
                  <br>
                  <button type="submit" class="btn btn-dark">Save</button>
                </form>
                <hr>
               </div>
             </div>
            </div>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <script src="https://cdn.tiny.cloud/1/4rtezy9il9jyn8pmmp9az3ge72e48nqn1ep78w0kzkgqnspd/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>
         
        var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

        tinymce.init({
          selector: '#news',
          plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
          imagetools_cors_hosts: ['picsum.photos'],
          menubar: 'file edit view insert format tools table help',
          toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
          toolbar_sticky: true,
          autosave_ask_before_unload: true,
          autosave_interval: '30s',
          autosave_prefix: '{path}{query}-{id}-',
          autosave_restore_when_empty: false,
          autosave_retention: '2m',
          image_advtab: true,
          link_list: [
            { title: 'My page 1', value: 'https://www.tiny.cloud' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
          ],
          image_list: [
            { title: 'My page 1', value: 'https://www.tiny.cloud' },
            { title: 'My page 2', value: 'http://www.moxiecode.com' }
          ],
          image_class_list: [
            { title: 'None', value: '' },
            { title: 'Some class', value: 'class-name' }
          ],
          importcss_append: true,
          file_picker_callback: function (callback, value, meta) {
            /* Provide file and text for the link dialog */
            if (meta.filetype === 'file') {
              callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
            }

            /* Provide image and alt text for the image dialog */
            if (meta.filetype === 'image') {
              callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
            }

            /* Provide alternative source and posted for the media dialog */
            if (meta.filetype === 'media') {
              callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
            }
          },
          templates: [
                { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
            { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
            { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
          ],
          template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
          template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
          height: 600,
          image_caption: true,
          quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
          noneditable_noneditable_class: 'mceNonEditable',
          toolbar_mode: 'sliding',
          contextmenu: 'link image imagetools table',
          content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
        
      </script>
    </body>
</html>