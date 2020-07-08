<?php
// Start the session
session_start();
define('TITLE', 'Uploads Page');
// Include the header:
include('templates/header.html');
// Leave the PHP section to display lots of HTML:

if (isset($_COOKIE["username"])) $user = $_COOKIE["username"];
if (isset($_SESSION["user"])) $user = $_SESSION["user"];
if (!isset($user)) {
    echo "Unauthorized access. Please <a href='login.php'>Login</a>";
    die();
}
?>

<body>
    <br>
    <div class="container">
        <div class="row">
            <h1 class="title">Upload here</h1>
        </div>
    </div>
    <?php
    if (count($_FILES["item_file"]['name']) > 0) { //check if any file uploaded
        $GLOBALS['msg'] = ""; //initiate the global message
        for ($j = 0; $j < count($_FILES["item_file"]['name']); $j++) {
            //loop the uploaded file array
            $filen = $_FILES["item_file"]['name']["$j"]; //file name
            $path = 'uploads/' . $filen; //generate the destination path
            if (move_uploaded_file($_FILES["item_file"]['tmp_name']["$j"], $path)) {
                //upload the file
                $GLOBALS['msg'] .= "File# " . ($j + 1) . " ($filen) uploaded successfully<br>";
                //Success message
            }
            else { print '<p style="color: red;">Your file could not be uploaded because: ';// Problem!
                switch ($_FILES['the_file'][$j]['error']) {// Print a message based upon the error:
                    case 1:	print 'The file exceeds the upload_max_filesize setting in php.ini';break;
                    case 2:	print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form';break;
                    case 3:	print 'The file was only partially uploaded';break;
                    case 4:	print 'No file was uploaded';break;
                    case 6: print 'The temporary folder does not exist.';break;
                    default:print 'Something unforeseen happened.';break;
                }
                print '.</p>'; // Complete the paragraph.
            } // End of move_uploaded_file() IF.
        }
    } else {
        $GLOBALS['msg'] = "No files found to upload"; //No file upload message 
    }

    ?>
    <div class="container">
        <div class="row">
            <form action="upload.php" enctype="multipart/form-data" method="post">
                <div class="form-group" id="input-div">
                    <p class="h4">Upload a files</p>
                    <input id="upload-input" type="file" class="form-control-file" name="item_file[]">
                </div>
                <div class="form-group">
                    <p><input type="submit" name="submit" value="Upload This File"></p>
                </div>
            </form>
        </div>
        <div class="row">
            <a class="btn-primary btn" id="add-btn" href="javascript:_add_more();">Add another File</a>
        </div>
    </div>
    </div>
    <script>
        function _add_more() {
            var inp = "<br/><input id=\"upload-input\" type=\"file\" class=\"form-control-file\" name=\"item_file[]\">";
            document.getElementById("input-div").innerHTML += inp;
        }
    </script>
</body>
<?php // Return to PHP.
include('templates/footer.html'); // Include the footer.
?>