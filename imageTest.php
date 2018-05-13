    <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
     
        <!-- Include external CSS. -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
     
        <!-- Include Editor style. -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

            <!-- CSS rules for styling the element inside the editor such as p, h1, h2, etc. -->
        <link href="../css/froala_style.min.css" rel="stylesheet" type="text/css" />
      
      </head>
     
      <body>
       

          <!-- <form action="test/postProcess.php" method="POST">  -->
             <!-- <div class="fr-view">
                Here comes the HTML edited with the Froala rich text editor.
                </div> -->
            <!-- <div id="froala-editor"  name="postContent">
                <p>TEST</p>
            </div>

            <button type="submit">submit</button>
          </form> -->

          <form action="test/postProcess.php" method="POST"> 
            <textarea name="postContent"></textarea>
            <button type="submit">submit</button>
          </form>

      <!-- <div id="froala-editor">
      <p>You have full control over the rich text editor's toolbar functionality. Simply customize what buttons are available, their order in the toolbar and also group them the way you want.</p>
    </div> -->
        <!-- Create a tag that we will use as the editable area. -->
        <!-- You can use a div tag as well. -->
        <!-- <textarea></textarea> -->
     
        <!-- Include external JS libs. -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
     
        <!-- Include Editor JS files. -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.1/js/froala_editor.pkgd.min.js"></script>
     
        <!-- Initialize the editor. -->
        <!-- <script> $(function() { $('textarea').froalaEditor() }); </script> -->
      <script> $(function() { $('textarea').froalaEditor({
          quickInsertButtons: ['image'],
            pluginsEnabled: ['quickInsert', 'image']
      }) }); </script>


      <script>
    //   $(function() {

    //     $('div#froala-editor').froalaEditor({
            
    //         quickInsertButtons: ['image'],
    //         pluginsEnabled: ['quickInsert', 'image']
    //     })
    //   });
    </script>

      <!-- <script>
      $(function() {
        // Define an icon.
        $.FroalaEditor.DefineIcon('buttonIcon', { NAME: 'star'})
     
        // Define a button.
        $.FroalaEditor.RegisterQuickInsertButton('myButton', {
          // Icon name.
          icon: 'buttonIcon',
     
          // Tooltip.
          title: 'My Button',
     
          // Callback for the button.
          callback: function () {
            // Call any editor method here.
            this.html.insert('Hello Froala!');
          },
     
          // Save changes to undo stack.
          undo: true
        })
     
        $('div#froala-editor').froalaEditor({
          quickInsertButtons: ['image'],
          pluginsEnabled: [ 'image']
        })
      });
    </script> -->

      </body>
    </html>