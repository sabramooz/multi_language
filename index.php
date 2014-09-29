<?php 

  include './class.multiLanguage.php'; 
  
  $staticSection = file_get_contents('./menu.html'); 

	 // multiLanguage::getLanguage();  Default language is english
	 // multiLanguage::getLanguage('es');   Set manual language
	 // multiLanguage::getLanguage(@$_POST['language']); Set language with POST method of forms
	 // multiLanguage::getLanguage(@$_GET['language']); Set language with GET method or Query string
	
  multiLanguage::getLanguage(@$_POST['language']);
			  
  $translatedMenu = multiLanguage::translateRecursive($staticSection); 
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Multilanguage Static Sections With Regular Expression">
    <meta name="author" content="pooya sabramooz">

    <title>Multilanguage Static Sections With Regular Expression</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<style>
        html {
          position: relative;
          min-height: 100%;
        }
        body {
          margin-bottom: 60px;
        }
        .footer {
          position: absolute;
          bottom: 0;
          width: 100%;
          height: 60px;
          background-color: #f5f5f5;
        }	
        body > .container {
          padding: 60px 15px 0;
        }
        .container .text-muted {
          margin: 20px 0;
        }
        .footer > .container {
          padding-right: 15px;
          padding-left: 15px;
        }
    </style>
  </head>

  <body>

    <?php echo $translatedMenu; ?>

    <div class="container">
      <div class="page-header">
        <h3>Multi language sections with xml and Regular expression</h3>
      </div>
      <p>Select a language...</p>
      
      <form method="post">
      	English : <input type="submit" class="btn-link" name="language" value="en"><br>
      	Spanish : <input type="submit" class="btn-link" name="language" value="es"><br>
        Farsi : <input type="submit" class="btn-link" name="language" value="fa"><br>
      </form>
      <br>
      <p>In addition, with this class you can change language of a page or just a section of a page.</p>
    </div>

    <div class="footer">
      <div class="container">
        <p class="text-muted"> Pooya Sabramooz &lt;pooya_alen1990@yahoo.com&gt; </p>
      </div>
    </div>
    
  </body>
</html>

		